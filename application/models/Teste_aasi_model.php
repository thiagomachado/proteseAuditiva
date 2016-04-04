<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Teste_aasi_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarTesteAASI($testeAASI)
        {
          $this->db->insert('tbl_testeaasi', $testeAASI);
        }

        public function recuperarTesteAASI($numCaracterizacao)
        {
          $this->db->where('NumPront', $numCaracterizacao);
          $query = $this->db->get('tbl_testeaasi');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $testeAASI = [];
          }
          else
          {
            $testeAASI = $array[0];
          }

          return $testeAASI;

        }
    }
?>
