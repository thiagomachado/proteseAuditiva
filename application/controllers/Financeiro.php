<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Financeiro extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/financeiro.css'));
            $this->load->model('usuario_model');
            $this->load->model('nivel_model');
            $this->load->helper('url');
        }

        public function index()
        {

        }

    }
?>
