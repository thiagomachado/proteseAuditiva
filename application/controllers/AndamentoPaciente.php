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
            // $solicitacao             = $this->solicitacao_model->recuperarSolicitacaoPorId($idSolicitacao);

            $data["itens"]           = $itensSolicitacao;
            $data["paciente"]        = $paciente;
            $data["procedimentos"]   = $procedimentos["procedimentos"];
            // $data["solicitacao"]     = $solicitacao;


            $this->template->set('title', 'ANDAMENTO DE PACIENTES');
            $this->template->load('template','andamentoPaciente_edicao',$data);

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
