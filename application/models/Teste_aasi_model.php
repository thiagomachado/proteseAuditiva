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
    }
?>
