<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class CaracterizacaoPaciente extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/caracterizacaoPaciente.css'));
            $this->load->model('paciente_model');
            $this->load->model('usuario_model');
            $this->load->model('caracterizacao_paciente_model');
            $this->load->model('teste_caracterizacao_model');
            $this->load->model('teste_aasi_model');
            $this->load->helper('url');
        }

        public function selecionarPaciente()
        {
            $jsConsulta                   = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaPacienteCaracterizacao.js"></script>';
            $listaPacientes               = $this->consultarPacientes();
            $listaPacientes['formAction'] = 'cadastroCaracterizacaoPaciente' ;

            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'SELECIONE O PACIENTE');
            $this->template->load('template','paciente_consulta',$listaPacientes);

        }

        public function cadastroCaracterizacao($cpf)
        {
            $paciente                = $this->paciente_model->recuperarPacientePorCPF($cpf);
            $profissionais           = $this->usuario_model->recuperarProfissionais();
            $dados['paciente']       = $paciente;
            $dados['profissionais']  = $profissionais;

            $this->template->set('title', 'CARACTERIZAÇÃO DO PACIENTE');
            $this->template->load('template','caracterizacaoPaciente_cadastro',$dados);

        }

        public function cadastrar()
        {
          //extrair dados
          extract($_POST);
          //cadastrar a carcterização
          $caracterizacaoPaciente = array(
              'PC_CPF'                  => $cpf,
              'Caract_Cpf_Profissional' => $Caract_Cpf_Profissional,
              'Caract_Data'             => date('Y-m-d'),
              'Caract_TipoPerda'        => $Caract_TipoPerda,
              'Caract_GrauPerda'        => $Caract_GrauPerda,
              'Caract_Config'           => $Caract_Config,
              'Caract_Duracao'          => $Caract_Duracao,
              'Caract_Progress'         => $Caract_Progress,
              'Caract_Recrut'           => $Caract_Recrut,
              'Caract_Zumbido'          => $Caract_Zumbido,
              'Caract_ExamesCompl'      => $Caract_ExamesCompl,
              'Caract_AASI'             => $Caract_AASI,
              'Caract_ImplCoclear'      => $Caract_ImplCoclear,
              'Caract_HistPerdaAud'     => $Caract_HistPerdaAud,
              'Caract_AASIModelo'       => $Caract_AASIModelo,
              'Caract_AASIOrelha'       => $Caract_AASIOrelha,
              'Caract_Obs'              => $Caract_Obs
              );

          $numCaracterizacao = $this->caracterizacao_paciente_model->cadastrarCaracterizacaoPaciente($caracterizacaoPaciente);


          //cadastrar o teste da caracterizacao
          $testeCaracterizacao = array(
            'Caract_Numero' => $numCaracterizacao,
            'OD_VA_250'     => $OD_VA_250,
            'OD_VA_500'     => $OD_VA_500,
            'OD_VA_1k'      => $OD_VA_1k,
            'OD_VA_2k'      => $OD_VA_2k,
            'OD_VA_3k'      => $OD_VA_3k,
            'OD_VA_4k'      => $OD_VA_4k,
            'OD_VA_6k'      => $OD_VA_6k,
            'OD_VA_8k'      => $OD_VA_8k,
            'OD_VO_500'     => $OD_VO_500,
            'OD_VO_1k'      => $OD_VO_1k,
            'OD_VO_2k'      => $OD_VO_2k,
            'OD_VO_3k'      => $OD_VO_3k,
            'OD_VO_4k'      => $OD_VO_4k,
            'OE_VA_250'     => $OE_VA_250,
            'OE_VA_500'     => $OE_VA_500,
            'OE_VA_1k'      => $OE_VA_1k,
            'OE_VA_2k'      => $OE_VA_2k,
            'OE_VA_3k'      => $OE_VA_3k,
            'OE_VA_4k'      => $OE_VA_4k,
            'OE_VA_6k'      => $OE_VA_6k,
            'OE_VA_8k'      => $OE_VA_8k,
            'OE_VO_500'     => $OE_VO_500,
            'OE_VO_1k'      => $OE_VO_1k,
            'OE_VO_2k'      => $OE_VO_2k,
            'OE_VO_3k'      => $OE_VO_3k,
            'OE_VO_4k'      => $OE_VO_4k
          );
          $this->teste_caracterizacao_model->cadastrarTesteCaracterizacao($testeCaracterizacao);

          //cadastrar o teste de AASI
            $testeAASI = array(
            'sem250'        => $sem250,
            'sem500'        => $sem500,
            'sem1k'         => $sem1k,
            'sem2k'         => $sem2k,
            'sem3k'         => $sem3k,
            'sem4k'         => $sem4k,
            'sem6k'         => $sem6k,
            'sem8k'         => $sem8k,
            'sempercfala'   => $sempercfala,
            'od250'         => $od250,
            'od500'         => $od500,
            'od1k'          => $od1k,
            'od2k'          => $od2k,
            'od3k'          => $od3k,
            'od4k'          => $od4k,
            'od6k'          => $od6k,
            'od8k'          => $od8k,
            'odpercfala'    => $odpercfala,
            'oe250'         => $oe250,
            'oe500'         => $oe500,
            'oe1k'          => $oe1k,
            'oe2k'          => $oe2k,
            'oe3k'          => $oe3k,
            'oe4k'          => $oe4k,
            'oe6k'          => $oe6k,
            'oe8k'          => $oe8k,
            'oepercfala'    => $oepercfala
          );

          $this->teste_aasi_model->cadastrarTesteAASI($testeAASI);
          echo json_encode($numCaracterizacao);
        }

        public function editar()
        {
          extract($_POST);

        }

        public function excluir($cpf)
        {
          $this->paciente_model->excluirPacientePorCPF($cpf);
          redirect('/paciente', 'refresh');

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

    }
?>
