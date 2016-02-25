<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Municipio_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $query = $this->db->get('tbl_municipios');
            return $query->result();
        }

        function recuperarMunicipiosPorUf($uf)
        {
          $this->db->where('Mun_UF', $uf);
          $query = $this->db->get('tbl_municipios');
          return $query->result();
        }
    }
?>
