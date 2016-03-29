<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class CaracterizacaoPaciente extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/caracterizacaoPaciente.css'));
            $this->load->model('paciente_model');

            $this->load->helper('url');
        }

        public function selecionarPaciente()
        {
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaPacienteCaracterizacao.js"></script>';
            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'SELECIONE O PACIENTE');
            $listaPacientes = $this->consultarPacientes();
            $listaPacientes['formAction'] = 'cadastroCaracterizacaoPaciente' ;
            $this->template->load('template','paciente_consulta',$listaPacientes);

        }

        public function index($cpf)
        {
            $paciente = $this->consultarPacientes();

            $this->template->set('title', 'CADASTRO CARACTERIZAÇÃO DO PACIENTE');
            $this->template->load('template','paciente_consulta',$listaPacientes);

        }

        public function cadastroPaciente()
        {

        }

        public function edicaoPaciente($cpf)
        {

        }

        public function cadastrar()
        {

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
