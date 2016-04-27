<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Protese_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function recuperarProteses()
        {
          $this->db->order_by("Prot_DataEntrada", "desc");
          $query                      = $this->db->get('tbl_proteses');
          $listaProteses["proteses"]  = $query->result();

          return $listaProteses;
        }

        public function recuperarProtesePorCodigo($codigo)
        {
          $this->db->where('Prot_Cod', $codigo);
          $query = $this->db->get('tbl_proteses');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $protese = [];
          }
          else
          {
            $protese = $array[0];
          }

          return $protese;
        }

        public function editar($codigo, $protese)
        {
          $this->db->update('tbl_proteses',$protese, array('Prot_Cod' => $codigo));
        }


        public function cadastrar($protese)
        {
          $this->db->insert('tbl_proteses', $protese);
          $insert_id = $this->db->insert_id();

          return  $insert_id;
        }


    }
?>
