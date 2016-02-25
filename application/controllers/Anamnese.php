<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Anamnese extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/anamnese.css'));
            $this->load->model('paciente_model');
            $this->load->model('anamnese_model');
            $this->load->helper('url');
        }

        public function index()
        {
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consulta.js"></script>';
            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'CONSULTA DE PACIENTES');
            $listaPacientes = $this->consultar();
            $this->template->load('template','paciente_consulta',$listaPacientes);

        }

        public function cadastroAnamnese()
        {
          $this->template->set('title', 'CADASTRAR PACIENTE');
          $this->template->load('template','paciente_cadastro',$data);
        }

        public function edicaoAnamnese($cpf)
        {
          $this->template->set('title', 'EDITAR PACIENTE');
          $this->template->load('template','paciente_edicao', $data);
        }

        public function cadastrar()
        {
        }

        public function editar()
        {
        }

        public function excluir($cpf)
        {
        }

        private function consultar()
        {
        }

    }
?>
