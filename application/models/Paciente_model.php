<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Paciente_model extends CI_Model
  {

      public function __construct()
      {
          // Call the CI_Model constructor
          parent::__construct();
      }

      public function consultarPacientePorNomeNprontuarioCartaoSUS($nome, $nprontuario, $sus)
      {
        $this->db->like('Pc_Nome', $nome);
        $this->db->like('Pc_NumProntuario', $nprontuario);
        $this->db->like('Pc_CartaoSus', $sus);
        $this->db->order_by("Pc_nome", "asc");
        $query = $this->db->get('tbl_paciente');
        return $query->result();
      }

      public function consultarPacientePorCPF($cpf)
      {
        $this->db->where('Pc_CPF', $cpf);
        $query = $this->db->get('tbl_paciente');
        $array = $query->result();
        $paciente = $array[0];
        return $paciente;
      }

      function get_all()
      {
          $this->db->order_by("Pc_nome", "asc");
          $query = $this->db->get('tbl_paciente');
          return $query->result();
      }
  }
?>
