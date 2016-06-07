<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Consulta_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarConsulta($consulta)
        {
          $this->db->insert('tbl_consulta', $consulta);
          return $this->db->insert_id();
        }

        public function editarConsulta($consulta,$id)
        {
          $this->db->update('tbl_consulta',$consulta, array('Consulta_id' => $id));
        }

        public function recuperarConsultasPorCPF($cpf)
        {
          $this->db->order_by("Consulta_data", "asc");
          $this->db->where('Pc_CPF', $cpf);
          $query = $this->db->get('tbl_consulta');
          $consultas = $query->result();

          return $consultas;
        }

        public function recuperarConsultaPorId($id)
        {
          $this->db->where('Consulta_id', $id);
          $query = $this->db->get('tbl_consulta');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $consulta = [];
          }
          else
          {
            $consulta = $array[0];
          }

          return $consulta;
        }

        public function excluirConsultaPorId($id)
        {
            $tabelas = array('tbl_consulta');
            $where = array('Consulta_id' => $id);
            $this->db->delete($tabelas, $where);
        }
    }
?>
