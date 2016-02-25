<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Uf_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $query = $this->db->get('tbl_uf');
            return $query->result();
        }
    }
?>
