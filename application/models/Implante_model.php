<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Implante_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function recuperarImplantes()
        {
          $this->db->order_by("Impl_DataEnt", "desc"); 
          $query                       = $this->db->get('tbl_implantes');
          $listaImplantes["implantes"] = $query->result();

          return $listaImplantes;
        }

        public function recuperarImplantePorCodigo($codigo)
        {
          $this->db->where('Impl_Cod', $codigo);
          $query = $this->db->get('tbl_implantes');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $implante = [];
          }
          else
          {
            $implante = $array[0];
          }

          return $implante;
        }

        public function editar($codigo, $implante)
        {
          $this->db->update('tbl_implantes',$implante, array('Impl_Cod' => $codigo));
        }


        public function cadastrar($implante)
        {
          $this->db->insert('tbl_implantes', $implante);
          $insert_id = $this->db->insert_id();

          return  $insert_id;
        }


    }
?>
