<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Paciente extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/paciente.css'));
        }

        public function index()
        {
            $this->template->set('title', 'CONSULTA DE PACIENTES');
            $this->template->load('template','');
        }

        public function cadastroPaciente()
        {
          $this->template->set('title', 'CADASTRAR PACIENTE');
          $this->template->load('template','');
        }

        public function edicaoPaciente()
        {
          $this->template->set('title', 'EDITAR PACIENTE');
          $this->template->load('template','');
        }

    }
?>
