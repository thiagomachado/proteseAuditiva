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

        public function index()
        {
            $data['usuarios'] = $this->consultar();
            $niveis = $this->nivel_model->get_all();
            $mapNiveis = array();
            foreach ($niveis as $nivel)
            {
                $mapNiveis[$nivel->Nvl_Cod] = $nivel->Nvl_Desc;
            }
            $data['niveis']= $mapNiveis;
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaUsuario.js"></script>';
            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'CONTROLE DE USUÁRIOS');
            $this->template->load('template','usuario_consulta', $data);


        }

        public function cadastroUsuario()
        {
            $data["niveis"] = $this->nivel_model->get_all();
            $this->template->set('title', 'CADASTRAR USUÁRIO');
            $this->template->load('template','usuario_cadastro', $data);
        }

        public function meusDados()
        {
            $data["usuario"]= $this->usuario_model->recuperarDadosUsuarioPorCPF($this->session->userdata("usuario")->Us_CPF);
            $data["niveis"] = $this->nivel_model->get_all();
            $data["tipoEdicao"] = "meusdados";
            $data["botaoCancelar"] = "menu";
            $data["botaoConcluir"] = "menu";
            $data["podeExcluir"]   = false;
            $data["textoConcluir"] = "Seus dados foram alterados.";
            $this->template->set('title', 'MEUS DADOS');
            $this->template->load('template','usuario_edicao', $data);
        }

        public function edicaoUsuario($cpf)
        {
            $data["usuario"]= $this->usuario_model->recuperarDadosUsuarioPorCPF($cpf);
            $data["niveis"] = $this->nivel_model->get_all();
            $data["tipoEdicao"] = "edicao";
            $data["botaoCancelar"] = "usuarios";
            $data["botaoConcluir"] = "usuarios";
            $data["textoConcluir"] = "Os dados foram alterados.";
            $data["podeExcluir"]   = true;
            $this->template->set('title', 'EDIÇÃO DE USUÁRIO');
            $this->template->load('template','usuario_edicao', $data);
        }



        public function cadastrar()
        {
            extract($_POST);
            $dataUsuario = array(
            'Us_CPF'       =>  $Us_CPF,
            'Us_Nome'      =>  $this->normalizarTexto($Us_Nome),
            'Us_DtNasc'    =>  $Us_DtNasc,
            'Us_CRFA'      =>  $Us_CRFA,
            'Us_Cargo'     =>  $Us_Cargo,
            'Us_CartaoSUS' => $Us_CartaoSUS,
            'Us_Nivel'     =>  $Us_Nivel,
            'Us_Login'     =>  $Us_Login,
            'Us_Senha'     =>  sha1($Us_Senha),
            'Us_email'     =>  $Us_email
            );

            $usuarioInserido = $this->usuario_model->cadastrar($dataUsuario);
            echo json_encode($usuarioInserido);
        }

        public function editar()
        {
            extract($_POST);
            $dataUsuario = array(
            'Us_CPF'    =>  $Us_CPF,
            'Us_Nome'   =>  $this->normalizarTexto($Us_Nome),
            'Us_DtNasc' =>  $Us_DtNasc,
            'Us_CRFA'   =>  $Us_CRFA,
            'Us_Cargo'  =>  $Us_Cargo,
            'Us_CartaoSUS' => $Us_CartaoSUS,
            'Us_Login'  =>  $Us_Login,
            'Us_Senha'  =>  sha1($Us_Senha),
            'Us_email'  =>  $Us_email
            );

            $this->usuario_model->editar($cpf,$dataUsuario);
            $usuarioEditado = $this->usuario_model->recuperarDadosUsuarioPorCPF($Us_CPF);
            if($tipoEdicao == "meusdados")
            {
                $this->session->set_userdata("usuario", $usuarioEditado);
            }

            echo json_encode($usuarioEditado);
        }

        public function consultar()
        {
            $usuarioNome   = $this->input->post('usuarioNome');
            $usuarioEmail  = $this->input->post('usuarioEmail');
            $nivel         = $this->input->post('nivel');
            $usuarios      = $this->usuario_model->recuperarUsuarioPorNomeEmailNivel($usuarioNome,$usuarioEmail,$nivel);

            return $usuarios;
        }
    }
?>
