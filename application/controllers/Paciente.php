<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Paciente extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/paciente.css'));
            $this->template->set('script', '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consulta.js"></script>');
            $this->load->model('paciente_model');


        }

        public function index()
        {
            $this->template->set('title', 'CONSULTA DE PACIENTES');
            $listaPacientes = $this->consultar();
            $this->template->load('template','paciente_consulta',$listaPacientes);

        }

        public function cadastroPaciente()
        {
          $this->template->set('title', 'CADASTRAR PACIENTE');
          $this->template->load('template','');
        }

        public function edicaoPaciente($cpf)
        {
          $paciente = $this->paciente_model->consultarPacientePorCPF($cpf);
          $this->template->set('title', 'EDITAR PACIENTE');
          $this->template->load('template','paciente_edicao', $paciente);
        }

        private function consultar()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes = $this->paciente_model->consultarPacientePorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);

          //salva os pacientes em um vetor, para poder passar os dados para view
          $listaPacientes["pacientes"] = $pacientes;
          return $listaPacientes;
        }

    }
?>
