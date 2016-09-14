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
            $this->load->model('paciente_model');
            $this->load->model('procedimento_model');
            $this->load->model('protese_model');
            $this->load->model('implante_model');
            $this->load->model('classe_model');
            $this->load->model('caracterizacao_paciente_model');

        }

        public function selecionarPaciente()
        {
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript"
            src="'.base_url().'assets/js/consultaAndamentoPaciente.js"></script>';
            $listaPacientes                  = $this->consultarPacientesComAndamento();
            $listaPacientes['formAction']    = 'andamentoPaciente' ;
            $listaPacientes['cadastro']      = "cadastroSolicitacao";
            $listaPacientes['textoCadastro'] = "Solicitacao";

            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'SELECIONE O PACIENTE');
            $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function edicaoAndamentoPaciente($cpf)
        {

            $dados["solicitacoes"]     = $this->solicitacao_model->recuperarSolicitacoesPorCPF($cpf);
            $dados["itens"]            = $this->item_solicitacao_model->recuperarItensPorPaciente($cpf);
            $dados["paciente"]         = $this->paciente_model->recuperarPacientePorCPF($cpf);
            $dados["procedimentos"]    = $this->procedimento_model->recuperarProcedimentos()["procedimentos"];
            $dados["andamento"]        = $this->andamento_paciente_model->recuperarAndamentoPacientePorCPF($cpf);
            $dados["protesesPaciente"] = $this->protese_model->recuperarProtesesPorPacientes($cpf);
            $dados["implantesPaciente"]= $this->implante_model->recuperarImplantesPorPacientes($cpf);
            $dados["classes"]          = $this->classe_model->get_all();
            $dados["caracterizacoes"]  = $this->caracterizacao_paciente_model->recuperarCaracterizacaoPacientePorCPF($cpf);

            $this->template->set('title', 'ANDAMENTO DE PACIENTES');
            $this->template->load('template','andamentoPaciente_edicao',$dados  );

        }

        //só possui função de edição pois um andamento em branco é criado durante a Solicitacao

        public function editar()
        {
          extract($_POST);
          //editando os campos do andamento (o andamento é cadastrado junto com a solicitação)
          $dataAndamento = array(
            'Andamento_obs'     => $Andamento_obs
          );

          $editouAndamento = $this->andamento_paciente_model->editarAndamento($dataAndamento, $Pc_CPF);
          $resposta = array(
            'andamento'  => $editouAndamento,
            'dataAndamento' => $dataAndamento,
            'cpf' => $Pc_CPF
          );

          //editando as solicitações
            if(isset($solicitacoes))
            {
                $quantiadeSolicitacoes = sizeof($solicitacoes);
                for ($i = 0; $i < $quantiadeSolicitacoes; $i++)
                {
                    $Solic_Id = $solicitacoes[$i];
                    $solicitacao = array(
                        'Proc_Confirmado' =>$confirmadosPrincipais[$i],
                        'Proc_Descricao'  => $descricoesPrincipais[$i]
                    );

                    $this->solicitacao_model->editarSolicitacao($solicitacao,$Solic_Id);
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

        private function consultarPacientesComAndamento()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes    = $this->paciente_model->recuperarPacienteComAndamentoPorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);
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
