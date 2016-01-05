<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class MY_Controller extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      //Verifica se a sessão do usuario está ativa
      $logado = $this->session->userdata("logado");

      if ($logado != 1)
      {
        redirect('/login', 'location', 302);
      }
    }
  }

?>
