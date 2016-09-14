<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Implante extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/implante.css'));
            $this->load->model('implante_model');
            $this->load->model('classe_model');
        }

        public function index()
        {
            $data["implantes"]  = $this->consultar();
            $data["classes"] = $this->classe_model->get_all();
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaImplantes.js"></script>';
            $this->template->set('title', 'ESTOQUE DE IMPLANTES');
            $this->template->set('script', $jsConsulta );
            $this->template->load('template','implante_consulta', $data);
        }

        public function cadastro()
        {
            $data["classes"] = $this->classe_model->get_all();
            $this->template->set('title', 'CADASTRO DE IMPLANTES');
            $this->template->load('template','implante_cadastro', $data);
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataImplante = array(
            'Impl_Cod'     => $Impl_Cod,
            'Impl_Desc'    => $this->normalizarTexto($Impl_Desc),
            'Impl_Fabr'    => $this->normalizarTexto($Impl_Fabr),
            'classe_id'    => $classe_id,
            'Impl_Valor'   => $Impl_Valor,
            'Pc_CPF'       =>  "",
            'Impl_DataEnt' =>  $Impl_DataEnt
          );

          $id_inserido = $this->implante_model->cadastrar($dataImplante);
          echo json_encode($id_inserido);
        }

        public function edicao($id)
        {
            $implante = $this->implante_model->recuperarImplantePorId($id);
            $data["implante"] = $implante;
            $data["classes"] = $this->classe_model->get_all();
            $this->template->set('title', 'EDIÇÃO DE IMPLANTE');
            $this->template->load('template','implante_edicao',$data);
        }

        public function editar()
        {
          extract($_POST);
          $dataImplante = array(
            'Impl_Cod'     => $Impl_Cod,
            'Impl_Desc'    => $this->normalizarTexto($Impl_Desc),
            'Impl_Fabr'    => $this->normalizarTexto($Impl_Fabr),
            'classe_id'    => $classe_id,
            'Impl_Valor'   => $Impl_Valor,
            'Impl_DataEnt' =>  $Impl_DataEnt
          );

          $id_inserido = $this->implante_model->editar($Impl_Id,$dataImplante);
          echo json_encode($id_inserido);
        }

        public function consultar()
        {
            $nome            = $this->input->post('nomeImplante');
            $classe          = $this->input->post('classe');
            $disponibilidade = $this->input->post('disponibilidade');

            $implantes  = $this->implante_model->recuperarImplantesPorNomeClasseDisponibilidade($nome,$classe,$disponibilidade);

            return $implantes;
        }
    }
?>
