<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Classe_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $query = $this->db->get('tbl_classe');
            return $query->result();
        }

    }
?>
