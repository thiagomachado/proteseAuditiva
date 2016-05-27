<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Solicitacao extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/solicitacao.css'));
            $this->load->model('solicitacao_model');
            $this->load->model('item_solicitacao_model');
            $this->load->model('paciente_model');
            $this->load->model('procedimento_model');
            $this->load->model('andamento_paciente_model');
            $this->load->library('m_pdf');
        }

        public function selecionarPaciente()
        {
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaCadastroSolicitacao.js"></script>';
            $listaPacientes                  = $this->consultarPacientes();
            $listaPacientes['formAction']    = 'cadastroSolicitacao' ;
            $listaPacientes['cadastro']      = "cadastroPaciente";
            $listaPacientes['textoCadastro'] = "Novo Paciente";

            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'SELECIONE O PACIENTE');
            $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function cadastroSolicitacao($cpf)
        {
            $paciente                = $this->paciente_model->recuperarPacientePorCPF($cpf);
            $procedimentos           = $this->procedimento_model->recuperarProcedimentos();
            $dados['paciente']       = $paciente;
            $dados['procedimentos']  = $procedimentos['procedimentos'];

            $this->template->set('title', 'CADASTRO DE SOLICITAÇÃO');
            $this->template->load('template','solicitacao_cadastro',$dados);


        }

        public function consultaSolicitacao()
        {
          $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaSolicitacao.js"></script>';
          $listaPacientes                  = $this->consultarPacientesComSolicitacao();
          $listaPacientes['formAction']    = 'consultaSolicitacao' ;
          $listaPacientes['cadastro']      = "cadastroSolicitacao";
          $listaPacientes['textoCadastro'] = "Solicitação";

          $this->template->set('script', $jsConsulta );
          $this->template->set('title', 'CONSULTA DE SOLICITAÇÃO');
          $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function consultaSolicitacaoPorPaciente($cpf)
        {
          $jsConsulta           = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaSolicitacaoPaciente.js"></script>';
          $solicitacoes         = $this->solicitacao_model->recuperarSolicitacoesPorCPF($cpf);
          $paciente             = $this->paciente_model->recuperarPacientePorCPF($cpf);
          $data["paciente"]     = $paciente;
          $data["solicitacoes"] = $solicitacoes;

          $this->template->set('script', $jsConsulta );
          $this->template->set('title', 'SOLICITAÇÕES DO PACIENTE');
          $this->template->load('template','consulta_solicitacao',$data);
        }

        public function edicaoSolicitacao($idSolicitacao)
        {
            $solicitacao             = $this->solicitacao_model->recuperarSolicitacaoPorId($idSolicitacao);
            $itensSolicitacao        = $this->item_solicitacao_model->recuperarItensPorSolicitacao($idSolicitacao);
            $procedimentos           = $this->procedimento_model->recuperarProcedimentos();
            $paciente                = $this->paciente_model->recuperarPacientePorCPF($solicitacao->Pc_CPF);
            $data["itens"]           = $itensSolicitacao;
            $data["paciente"]        = $paciente;
            $data["solicitacao"]     = $solicitacao;
            $data["procedimentos"]   = $procedimentos["procedimentos"];

            $this->template->set('title', 'EDIÇÃO DE SOLICITACÃO');
            $this->template->load('template','solicitacao_edicao',$data);

        }

        public function cadastrar()
        {
          extract($_POST);
          $dataSolicitacao = array(
            'Pc_CPF'              => $Pc_CPF,
            'Solic_data'          => date("Y-m-d"),
            'Solic_descricao'     => $Solic_descricao,
            'Solic_cid10principal'=> $Solic_cid10principal,
            'Solic_cid10sec'      => $Solic_cid10sec,
            'Solic_cid10causas'   => $Solic_cid10causas,
            'Solic_obs'           => $Solic_obs
          );

          $idSolicitacao = $this->solicitacao_model->cadastrarSolicitacao($dataSolicitacao);

          $quantidadeItens = sizeof($procedimentos);

          for($i = 0; $i < $quantidadeItens; $i++)
          {
            $dataItemSolicitacao = array(
              'Solic_id'          => $idSolicitacao,
              'Isolic_item_id'    => $procedimentos[$i],
              'Isolic_quantidade' => $quantidades[$i],
              'Isolic_confirmado' => 0
            );
            $this->item_solicitacao_model->cadastrarItemSolicitacao($dataItemSolicitacao);
          }

          //cadastro andamento do paciente (somente se ja não tiver cadastrado antes)
          $andamentoCadastradoAnteriormente = $this->andamento_paciente_model->recuperarAndamentoPacientePorCPF($Pc_CPF);
          if(sizeof($andamentoCadastradoAnteriormente) == 0) //verifica se ja foi cadastrado andamento para esse paciente
          {
            $dataAndamento = array(
              'Pc_CPF' => $Pc_CPF
            );

            $this->andamento_paciente_model->cadastrarAndamentoPaciente($dataAndamento);
          }

          echo json_encode($idSolicitacao);
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

        public function editarSolicitacao()
        {
          extract($_POST);

          $dataSolicitacao = array(
            'Solic_descricao'      => $Solic_descricao,
            'Solic_cid10principal' => $Solic_cid10principal,
            'Solic_cid10sec'       => $Solic_cid10sec,
            'Solic_cid10causas'    =>$Solic_cid10causas,
            'Solic_obs'            => $Solic_obs
          );
           $this->solicitacao_model->editarSolicitacao($dataSolicitacao, $Solic_id);

          $quantidadeItens = sizeof($procedimentos);

          for($i = 0; $i < $quantidadeItens; $i++)
          {
            $dataItemSolicitacao = array(
              'Isolic_item_id'    => $procedimentos[$i],
              'Isolic_quantidade' => $quantidades[$i]
            );
            $this->item_solicitacao_model->editarItemSolicitacao($dataItemSolicitacao,$idItens[$i]);
          }
          $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

          echo json_encode($arr);
          return json_encode($arr);
        }

        public function emitirLaudoPDF($idSolicitacao)
        {
          $solicitacao      = $this->solicitacao_model->recuperarSolicitacaoPorId($idSolicitacao);
          $itensSolicitacao = $this->item_solicitacao_model->recuperarItensPorSolicitacao($idSolicitacao);
          $paciente         = $this->paciente_model->recuperarPacientePorCPF($solicitacao->Pc_CPF);
          $procedimentos    = $this->procedimento_model->recuperarProcedimentos();

          $dados['solicitacao']      = $solicitacao;
          $dados['itensSolicitacao'] = $itensSolicitacao;
          $dados['paciente']         = $paciente;
          $dados['procedimentos']    = $procedimentos["procedimentos"];

          //load the view and saved it into $html variable
          $html=$this->load->view('solicitacao_laudo', $dados, true);


          //this the the PDF filename that user will get to download
          $pdfFilePath = trim($paciente->Pc_Nome).".pdf";

          //generate the PDF from the given html
          $this->m_pdf->pdf->WriteHTML($html);

          //download it.
          $this->m_pdf->pdf->Output($pdfFilePath, "D");
        }
    }
?>