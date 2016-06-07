<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Procedimento extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/implante.css'));
            $this->load->model('procedimento_model');
        }

        public function index()
        {
            $procedimentos  = $this->procedimento_model->recuperarProcedimentos();
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaProcedimentos.js"></script>';
            $this->template->set('title', 'CONTROLE DE PROCEDIMENTOS');
            $this->template->set('script', $jsConsulta );
            $this->template->load('template','procedimento_consulta', $procedimentos);
        }

        public function cadastro()
        {
          $this->template->set('title', 'CADASTRO DE PROCEDIMENTO');
          $this->template->load('template','procedimento_cadastro');
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataProcedimento = array(
            'Proc_Nome'           => $Proc_Nome,
            'Proc_Codigo'         => $Proc_Codigo,
            'Proc_Valor'          => $Proc_Valor
          );

          $id_inserido = $this->procedimento_model->cadastrar($dataProcedimento);
          echo json_encode($id_inserido);
        }

        public function edicao($id)
        {
          $procedimento = $this->procedimento_model->recuperarProcedimentoPorId($id);
          $data["procedimento"] = $procedimento;
          $this->template->set('title', 'EDIÇÃO DE PROCEDIMENTO');
          $this->template->load('template','procedimento_edicao',$data);
        }

        public function editar()
        {
          extract($_POST);
          $dataProcedimento = array(
            'Proc_Nome'           => $Proc_Nome,
            'Proc_Codigo'         => $Proc_Codigo,
            'Proc_Valor'          => $Proc_Valor
          );

          $id_inserido = $this->procedimento_model->editar($Proc_Id,$dataProcedimento);
          echo json_encode($id_inserido);
        }

    }
?>
