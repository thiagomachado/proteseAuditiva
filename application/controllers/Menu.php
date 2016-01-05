<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/menu.css'));
        }

        public function index()
        {
            $this->template->set('title', 'MENU INICIAL');
            $this->template->load('template','menu_inicial');
        }

        public function menuAtendimento()
        {
          $this->template->set('title', 'ATENDIMENTO');
          $this->template->load('template','menu_atendimento');
        }

        public function menuSistema()
        {
          $this->template->set('title', 'SISTEMA');
          $this->template->load('template','menu_sistema');
        }

    }
?>
