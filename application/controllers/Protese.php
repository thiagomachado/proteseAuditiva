<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Protese extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/implante.css'));
            $this->load->model('protese_model');
            $this->load->model('paciente_model');
            $this->load->model('classe_model');
        }

        public function index()
        {
            $data["proteses"] = $this->consultar();
            $data["classes"] = $this->classe_model->get_all();
            $jsConsulta = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaProteses.js"></script>';
            $this->template->set('title', 'ESTOQUE DE PRÓTESES');
            $this->template->set('script', $jsConsulta );
            $this->template->load('template','protese_consulta', $data);
        }

        public function cadastro()
        {
            $data["classes"] = $this->classe_model->get_all();
            $this->template->set('title', 'CADASTRO DE PRÓTESE');
            $this->template->load('template','protese_cadastro',$data);
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataProtese = array(
            'Prot_Cod'            => $Prot_Cod,
            'Prot_Nome'           => $this->normalizarTexto($Prot_Nome),
            'Prot_Fabricante'     => $this->normalizarTexto($Prot_Fabricante),
            'classe_id'           => $classe_id,
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
          if($protese->Pc_CPF != '')
          {
              $data["paciente"] = $this->paciente_model->recuperarPacientePorCPF($protese->Pc_CPF);                  
          }
          
          $data["protese"] = $protese;
          $data["classes"] = $this->classe_model->get_all();
          $this->template->set('title', 'EDIÇÃO DE PRÓTESE');
          $this->template->load('template','protese_edicao',$data);
        }

        public function editar()
        {
          extract($_POST);
          $dataProtese = array(
            'Prot_Cod'            => $Prot_Cod,
            'Prot_Nome'           => $this->normalizarTexto($Prot_Nome),
            'Prot_Fabricante'     => $this->normalizarTexto($Prot_Fabricante),
            'classe_id'           => $classe_id,
            'Prot_Valor'          => $Prot_Valor,
            'Prot_DataEntrada'    => $Prot_DataEntrada
          );
          if(isset($Pc_CPF))
          {
              $dataProtese['Pc_CPF'] = $Pc_CPF;
          }

          $id_inserido = $this->protese_model->editar($Prot_Id,$dataProtese);
          echo json_encode($id_inserido);
        }


        public function consultar()
        {
            $nome            = $this->input->post('nomeProtese');
            $classe          = $this->input->post('classe');
            $disponibilidade = $this->input->post('disponibilidade');

            $proteses  = $this->protese_model->recuperarProtesesPorNomeClasseDisponibilidade($nome,$classe,$disponibilidade);

            return $proteses;
        }
 

    }
?>
