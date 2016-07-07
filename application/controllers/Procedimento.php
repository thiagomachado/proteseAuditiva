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
            $dados["procedimentos"]  = $this->procedimento_model->recuperarProcedimentos();
            $tiposProcedimento       = $this->procedimento_model->recuperarTiposProcedimento();
            $jsConsulta              = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaProcedimentos.js"></script>';

            foreach ($tiposProcedimento as $tipo)
            {
              $tipos[$tipo->Tp_Id] = $tipo->Tp_Nome;
            }

            $dados["tipos"] = $tipos;

            $this->template->set('title', 'CONTROLE DE PROCEDIMENTOS');
            $this->template->set('script', $jsConsulta );
            $this->template->load('template','procedimento_consulta', $dados);
        }

        public function cadastro()
        {
          $tiposProcedimento = $this->procedimento_model->recuperarTiposProcedimento();
          foreach ($tiposProcedimento as $tipo)
          {
            $tipos[$tipo->Tp_Id] = $tipo->Tp_Nome;
          }

          $dados["tipos"] = $tipos;
          $this->template->set('title', 'CADASTRO DE PROCEDIMENTO');
          $this->template->load('template','procedimento_cadastro',$dados);
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataProcedimento = array(
            'Proc_Nome'           => $this->normalizarTexto($Proc_Nome),
            'Proc_Codigo'         => $Proc_Codigo,
            'Tp_Id'               => $Tp_Id,
            'Proc_Valor'          => $Proc_Valor
          );

          $id_inserido = $this->procedimento_model->cadastrar($dataProcedimento);
          echo json_encode($id_inserido);
        }

        public function edicao($id)
        {
          $tiposProcedimento = $this->procedimento_model->recuperarTiposProcedimento();
          foreach ($tiposProcedimento as $tipo)
          {
            $tipos[$tipo->Tp_Id] = $tipo->Tp_Nome;
          }

          $data["tipos"] = $tipos;
          $procedimento = $this->procedimento_model->recuperarProcedimentoPorId($id);
          $data["procedimento"] = $procedimento;
          $this->template->set('title', 'EDIÇÃO DE PROCEDIMENTO');
          $this->template->load('template','procedimento_edicao',$data);
        }

        public function editar()
        {
          extract($_POST);
          $dataProcedimento = array(
            'Tp_Id'               => $Tp_Id,
            'Proc_Nome'           => $this->normalizarTexto($Proc_Nome),
            'Proc_Codigo'         => $Proc_Codigo,
            'Proc_Valor'          => $Proc_Valor
          );

          $id_inserido = $this->procedimento_model->editar($Proc_Id,$dataProcedimento);
          echo json_encode($id_inserido);
        }

    }
?>
