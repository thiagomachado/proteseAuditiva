<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Implante extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/implante.css'));
            $this->load->model('implante_model');
        }

        public function index()
        {
            $implantes  = $this->implante_model->recuperarImplantes();
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaImplantes.js"></script>';
            $this->template->set('title', 'ESTOQUE DE IMPLANTES');
            $this->template->set('script', $jsConsulta );
            $this->template->load('template','implante_consulta', $implantes);
        }

        public function cadastro()
        {
          $this->template->set('title', 'CADASTRO DE IMPLANTES');
          $this->template->load('template','implante_cadastro');
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataImplante = array(
            'Impl_Desc'    => $Impl_Desc,
            'Impl_Fabr'    => $Impl_Fabr,
            'Impl_Clss'    => $Impl_Clss,
            'Impl_Valor'   => $Impl_Valor,
            'Pc_CPF'       =>  "",
            'Impl_DataEnt' =>  $Impl_DataEnt
          );

          $id_inserido = $this->implante_model->cadastrar($dataImplante);
          echo json_encode($id_inserido);
        }

        public function edicao($codigo)
        {
          $implante = $this->implante_model->recuperarImplantePorCodigo($codigo);
          $data["implante"] = $implante;
          $this->template->set('title', 'EDIÇÃO DE IMPLANTE');
          $this->template->load('template','implante_edicao',$data);
        }

        public function editar()
        {
          extract($_POST);
          $dataImplante = array(
            'Impl_Desc'    => $Impl_Desc,
            'Impl_Fabr'    => $Impl_Fabr,
            'Impl_Clss'    => $Impl_Clss,
            'Impl_Valor'   => $Impl_Valor,
            'Impl_DataEnt' =>  $Impl_DataEnt
          );

          $id_inserido = $this->implante_model->editar($Impl_Cod,$dataImplante);
          echo json_encode($id_inserido);
        }

    }
?>