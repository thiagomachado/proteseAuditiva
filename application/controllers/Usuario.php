<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Usuario extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/usuario.css'));
            $this->load->model('usuario_model');
            $this->load->model('nivel_model');
            $this->load->helper('url');
        }

        public function cadastroUsuario()
        {
          $data["niveis"] = $this->nivel_model->get_all();
          $this->template->set('title', 'CADASTRAR USUÁRIO');
          $this->template->load('template','usuario_cadastro', $data);
        }

        public function edicaoUsuario($cpf)
        {

          $this->template->set('title', 'MEUS DADOS');
          $this->template->load('template','paciente_edicao', $data);
        }


        public function cadastrar()
        {
          extract($_POST);
          $dataUsuario = array(
            'Us_CPF'    =>  $Us_CPF,
            'Us_Nome'   =>  strtoupper($Us_Nome),
            'Us_DtNasc' =>  $Us_DtNasc,
            'Us_CRFA'   =>  $Us_CRFA,
            'Us_Cargo'  =>  $Us_Cargo,
            'Us_Nivel'  =>  $Us_Nivel,
            'Us_Login'  =>  $Us_Login,
            'Us_Senha'  =>  sha1($Us_Senha),
            'Us_email'  =>  $Us_email
          );

          $usuarioInserido = $this->usuario_model->cadastrar($dataUsuario);
          echo json_encode($usuarioInserido);
        }

        public function editar()
        {
          extract($_POST);
          $dataPaciente = array(
            'Pc_CPF'          => $Pc_CPF,
            'Pc_Nome'         =>strtoupper($Pc_Nome),
            'Pc_CartaoSus'    => $Pc_CartaoSus,
            'Pc_NumProntuario'=> $Pc_NumProntuario,
            'Pc_DtNascimento' => $Pc_DtNascimento,
            'Pc_Sexo'         => $Pc_Sexo,
            'Pc_Etnia'        => $Pc_Etnia,
            'Pc_NomeMae'      => strtoupper($Pc_NomeMae),
            'Pc_NomePai'      => strtoupper($Pc_NomePai),
            'Pc_GrauEscolar'  => $Pc_GrauEscolar,
            'Pc_SeTrabalha'   => $Pc_SeTrabalha,
            'Pc_Profissao'    => $Pc_Profissao,
            'Pc_TipoAnamn'    => $Pc_TipoAnamn
          );

          $editarPaciente = $this->paciente_model->editarPacientePorCPF($cpf, $dataPaciente);
          $this->endereco_model->editarEnderecoPorCPF($cpf, $dataEndereco);
          $this->telefone_model->editarTelefonePorCPF($cpf, $dataTelefone);

          echo json_encode(true);
        }

    }
?>
