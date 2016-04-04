<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Teste_caracterizacao_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarTesteCaracterizacao($testeCaracterizacao)
        {
          $this->db->insert('tbl_teste_caracterizacao_paciente', $testeCaracterizacao);
        }

        public function recuperarTesteCaracterizacao($numCaracterizacao)
        {
          $this->db->where('Caract_Numero', $numCaracterizacao);
          $query = $this->db->get('tbl_teste_caracterizacao_paciente');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $testeCaracterizacao = [];
          }
          else
          {
            $testeCaracterizacao = $array[0];
          }

          return $testeCaracterizacao;

        }
    }
?>
