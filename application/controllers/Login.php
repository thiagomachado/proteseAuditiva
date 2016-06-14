<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('title', 'FONOAUDIOLOGIA');
            $this->template->set('css', link_tag('assets/css/login_form.css'));
        }

        public function index()
        {
          $this->template->load('template','login_form');
        }

        public function logar()
        {
            $this->load->model('usuario_model');
            $nomeUsuario = $this->input->post('nomeUsuario');
            $senha       = sha1($this->input->post('senha'));
            if($this->usuario_model->verificarUsuario($nomeUsuario, $senha))
            {
                $usuario = $this->usuario_model->recuperarDadosUsuario($nomeUsuario);
                $this->session->set_userdata("logado", 1);
                $this->session->set_userdata("usuario", $usuario);
                redirect(base_url());

            }
            else
            {
                $data['mensagem'] = 'Usuário ou senha incorretos!';
                $this->template->load('template', 'login_form', $data);
            }
        }

        public function logout()
        {
            $this->session->unset_userdata("logado");
            $this->session->unset_userdata("usuario");
            redirect(base_url());
        }
    }

?>
