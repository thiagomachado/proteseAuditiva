<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Protese extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/implante.css'));
            $this->load->model('protese_model');
        }

        public function index()
        {
            $proteses  = $this->protese_model->recuperarProteses();
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaProteses.js"></script>';
            $this->template->set('title', 'ESTOQUE DE PRÓTESES');
            $this->template->set('script', $jsConsulta );
            $this->template->load('template','protese_consulta', $proteses);
        }

        public function cadastro()
        {
          $this->template->set('title', 'CADASTRO DE PRÓTESE');
          $this->template->load('template','protese_cadastro');
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataProtese = array(
            'Prot_Cod'            => $Prot_Cod,
            'Prot_Nome'           => $Prot_Nome,
            'Prot_Fabricante'     => $Prot_Fabricante,
            'Prot_Classe'         => $Prot_Classe,
            'Prot_Valor'          => $Prot_Valor,
            'Pc_CPF'              =>  "",
            'Prot_DataEntrada'    => $Prot_DataEntrada
          );

          $id_inserido = $this->protese_model->cadastrar($dataProtese);
          echo json_encode($id_inserido);
        }

        public function edicao($id)
        {
          $protese = $this->protese_model->recuperarProtesePorId($id);
          $data["protese"] = $protese;
          $this->template->set('title', 'EDIÇÃO DE PRÓTESE');
          $this->template->load('template','protese_edicao',$data);
        }

        public function editar()
        {
          extract($_POST);
          $dataProtese = array(
            'Prot_Cod'            => $Prot_Cod,
            'Prot_Nome'           => $Prot_Nome,
            'Prot_Fabricante'     => $Prot_Fabricante,
            'Prot_Classe'         => $Prot_Classe,
            'Prot_Valor'          => $Prot_Valor,
            'Prot_DataEntrada'    => $Prot_DataEntrada
          );

          $id_inserido = $this->protese_model->editar($Prot_Id,$dataProtese);
          echo json_encode($id_inserido);
        }

    }
?>
