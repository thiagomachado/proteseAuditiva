<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Andamento_paciente_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarAndamentoPaciente($andamento)
        {
          $this->db->insert('tbl_andamento_paciente', $andamento);
          return $this->db->insert_id();
        }

        public function editarAndamento($andamento,$cpf)
        {
          return $this->db->update('tbl_andamento_paciente',$andamento, array('Pc_CPF' => $cpf));          
        }


        public function recuperarAndamentoPacientePorCPF($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $query = $this->db->get('tbl_andamento_paciente');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $andamento = [];
          }
          else
          {
            $andamento = $array[0];
          }

          return $andamento;
        }
    }
?>
