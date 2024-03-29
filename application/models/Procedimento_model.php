<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Procedimento_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function recuperarProcedimentos()
        {
          $this->db->order_by("Proc_Nome", "asc");
          $query                                = $this->db->get('tbl_procedimentos');
          $listaProcedimentos["procedimentos"]  = $query->result();

          return $listaProcedimentos;
        }

        public function recuperarProcedimentosPrincipais()
        {
          $this->db->order_by("Proc_Nome", "asc");
          $this->db->where("Tp_id",1);
          $query         = $this->db->get('tbl_procedimentos');
          $procedimentos = $query->result();

          return $procedimentos;
        }

        public function recuperarProcedimentosSecundarios()
        {
          $this->db->order_by("Proc_Nome", "asc");
          $this->db->where("Tp_id",2);
          $query          = $this->db->get('tbl_procedimentos');
          $procedimentos  = $query->result();

          return $procedimentos;
        }

        public function recuperarTiposProcedimento()
        {
          $this->db->order_by("Tp_Nome", "asc");
          $query = $this->db->get('tbl_tipo_procedimento');
          $tiposProcedimento  = $query->result();

          return $tiposProcedimento;
        }

        public function recuperarProcedimentoPorId($id)
        {
          $this->db->where('Proc_Id', $id);
          $query = $this->db->get('tbl_procedimentos');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $procedimento = [];
          }
          else
          {
            $procedimento = $array[0];
          }

          return $procedimento;
        }

        public function editar($id, $procedimento)
        {
          $this->db->update('tbl_procedimentos',$procedimento, array('Proc_Id' => $id));
        }


        public function cadastrar($procedimento)
        {
          $this->db->insert('tbl_procedimentos', $procedimento);
          $insert_id = $this->db->insert_id();

          return  $insert_id;
        }


    }
?>
