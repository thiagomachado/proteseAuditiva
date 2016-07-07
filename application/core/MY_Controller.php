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

    public function normalizarTexto($string)
    {
      $string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
      return strtoupper($string);
    }
  }

?>
