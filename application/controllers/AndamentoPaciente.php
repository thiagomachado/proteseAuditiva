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
            $this->load->model('protese_model');
            $this->load->model('implante_model');

        }

        public function selecionarPaciente()
        {
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript"
            src="'.base_url().'assets/js/consultaAndamentoPaciente.js"></script>';
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

            $data["itens"]            = $this->item_solicitacao_model->recuperarItensPorPaciente($cpf);
            $data["paciente"]         = $this->paciente_model->recuperarPacientePorCPF($cpf);
            $data["procedimentos"]    = $this->procedimento_model->recuperarProcedimentos()["procedimentos"];
            $data["andamento"]        = $this->andamento_paciente_model->recuperarAndamentoPacientePorCPF($cpf);
            $data["consultas"]        = $this->consulta_model->recuperarConsultasPorCPF($cpf);
            $data["proteses"]         = $this->protese_model->recuperarProtesesSemPacientes();
            $data["protesesPaciente"] = $this->protese_model->recuperarProtesesPorPacientes($cpf);
            $data["implantes"]        = $this->implante_model->recuperarImplantesSemPacientes();
            $data["implantesPaciente"]= $this->implante_model->recuperarImplantesPorPacientes($cpf);

            $this->template->set('title', 'ANDAMENTO DE PACIENTES');
            $this->template->load('template','andamentoPaciente_edicao',$data);

        }

        //só possui função de edição pois um andamento em branco é criado durante a Solicitacao

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

          //Editando o paciente no implante e/ou protese
          if($Andamento_protese <> "0")
          {
            $dataProtese = array('Pc_CPF' =>$Pc_CPF, 'Prot_DataSaida'=> date('Y-m-d'));

            $this->protese_model->editar($Andamento_protese,$dataProtese);
          }

          if($Andamento_implante <> "0")
          {
            $dataImplante = array('Pc_CPF' =>$Pc_CPF, 'Impl_DataSaida'=> date('Y-m-d'));

            $this->implante_model->editar($Andamento_implante,$dataImplante);
          }

          //Editando o paciente no implante e/ou protese
          if($Andamento_protese <> 0)
          {
            $dataProtese = array('Pc_CPF' =>$Pc_CPF);

            $this->protese_model->editar($Andamento_protese,$dataProtese);
          }

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
          if(isset($consultaEdicaoIds))
          {
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

        public function excluirConsulta($id)
        {
          $consulta = $this->consulta_model->recuperarConsultaPorId($id);
          $cpf = $consulta->Pc_CPF;
          $this->consulta_model->excluirConsultaPorId($id);
          $link = "index.php/andamentoPaciente/"+$cpf;
          redirect("/andamentoPaciente/$cpf", 'refresh');
        }

    }
?>
