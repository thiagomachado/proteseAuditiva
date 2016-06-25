<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Cor_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $query = $this->db->get('tbl_cor');
            return $query->result();
        }

        function recuperarCorPorCodigo($codigo)
        {
            $this->db->where('Cor_Codigo', $codigo);
            $query = $this->db->get('tbl_cor');
            $array = $query->result();
            $cor   = $array[0];
            return $cor;
        }
    }
?>
