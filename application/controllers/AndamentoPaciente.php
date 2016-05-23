<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class AndamentoPaciente extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/andamentoPaciente.css'));
            $this->load->model('solicitacao_model');
            $this->load->model('item_solicitacao_model');
            $this->load->model('andamento_paciente_model');
            $this->load->model('consulta_model');
            $this->load->model('paciente_model');
            $this->load->model('procedimento_model');
            $this->load->library('m_pdf');
        }

        public function selecionarPaciente()
        {
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaAndamentoPaciente.js"></script>';
            $listaPacientes                  = $this->consultarPacientesComSolicitacao();
            $listaPacientes['formAction']    = 'andamentoPaciente' ;
            $listaPacientes['cadastro']      = "cadastroSolicitacao";
            $listaPacientes['textoCadastro'] = "Solicitacao";

            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'SELECIONE O PACIENTE');
            $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function edicaoAndamentoPaciente($cpf)
        {
            $paciente                = $this->paciente_model->recuperarPacientePorCPF($cpf);
            $itensSolicitacao        = $this->item_solicitacao_model->recuperarItensPorPaciente($cpf);
            $procedimentos           = $this->procedimento_model->recuperarProcedimentos();
            $andamento               = $this->andamento_paciente_model->recuperarAndamentoPacientePorCPF($cpf);
            $consultas               = $this->consulta_model->recuperarConsultasPorCPF($cpf);
            // $solicitacao             = $this->solicitacao_model->recuperarSolicitacaoPorId($idSolicitacao);

            $data["itens"]           = $itensSolicitacao;
            $data["paciente"]        = $paciente;
            $data["procedimentos"]   = $procedimentos["procedimentos"];
            $data["andamento"]       = $andamento;
            $data["consultas"]       = $consultas;


            $this->template->set('title', 'ANDAMENTO DE PACIENTES');
            $this->template->load('template','andamentoPaciente_edicao',$data);

        }

        public function editar()
        {
          extract($_POST);
          //editando os campos do andamento (o andamento é cadastrado junto com a solicitação)
          $dataAndamento = array(
            'Andamento_protese' => $Andamento_protese,
            'Andamento_implante'=> $Andamento_implante,
            'Andamento_obs'     => $Andamento_obs
          );

          $editouAndamento = $this->andamento_paciente_model->editarAndamento($dataAndamento, $Pc_CPF);
          $resposta = array(
            'andamento'  => $editouAndamento,
            'dataAndamento' => $dataAndamento,
            'cpf' => $Pc_CPF
          );

          //editando os itens das solicitações
          $quantidadeItens = sizeof($itens);

          for($i = 0; $i < $quantidadeItens; $i++)
          {
            $Isolic_id = $itens[$i];

            $dataItemSolicitacao = array(
              'Isolic_descricao'  => $descricoes[$i],
              'Isolic_confirmado' => $confirmados[$i]
            );
            if($this->item_solicitacao_model->editarItemSolicitacao($dataItemSolicitacao, $Isolic_id))
            {
              $resposta[$Isolic_id] = true;
            }
            else
            {
              $resposta[$Isolic_id] = false;
            }
          }

          //Editando as consultas
          $quantidadeConsultasEdicao = sizeof($consultaEdicaoIds);

          for ($i=0; $i < $quantidadeConsultasEdicao ; $i++)
          {
            $consulta_id  = $consultaEdicaoIds[$i];
            $dataConsultaEdicao = array(
              'Consulta_data'      => $consultaEdicaoDatas[$i],
              'Consulta_descricao' => $consultaEdicaoDescricoes[$i]
            );

            $this->consulta_model->editarConsulta($dataConsultaEdicao,$consulta_id);

          }

          //cadastrando as novas consultas
          $quantidadeConsultas = sizeof($consultaDescricoes);

          for ($i=0; $i < $quantidadeConsultas; $i++)
          {
            if(!($consultaDatas[$i]=="") and !($consultaDescricoes[$i]=="") )
            {

              $dataConsulta = array(
                'Pc_CPF'             => $Pc_CPF,
                'Consulta_data'      => $consultaDatas[$i],
                'Consulta_descricao' => $consultaDescricoes[$i]
              );
              $idConsulta = $this->consulta_model->cadastrarConsulta($dataConsulta);
              $resposta["consulta"] = $idConsulta;
            }


          }

          //enviando json com os resultados (somente para debug)
          echo json_encode($resposta);
        }

        private function consultarPacientes()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes    = $this->paciente_model->recuperarPacientePorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);
          //salva os pacientes em um vetor, para poder passar os dados para view
          $listaPacientes["pacientes"] = $pacientes;
          return $listaPacientes;
        }

        private function consultarPacientesComSolicitacao()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes    = $this->paciente_model->recuperarPacienteComSolicitacaoPorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);
          $listaPacientes["pacientes"] = $pacientes;
          return $listaPacientes;

        }

    }
?>
