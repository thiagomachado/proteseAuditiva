<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Paciente_model extends CI_Model
  {

      public function __construct()
      {
          // Call the CI_Model constructor
          parent::__construct();
      }

      public function recuperarPacientePorNomeNprontuarioCartaoSUS($nome, $nprontuario, $sus)
      {
        $this->db->like('Pc_Nome', $nome);
        $this->db->like('Pc_NumProntuario', $nprontuario);
        $this->db->like('Pc_CartaoSus', $sus);
        $this->db->order_by("Pc_nome", "asc");
        $query = $this->db->get('tbl_paciente');
        return $query->result();
      }

      public function recuperarPacienteSemCaracterizacaoPorNomeNprontuarioCartaoSUS($nome, $nprontuario, $sus)
      {
        $this->db->like('Pc_Nome', $nome);
        $this->db->like('Pc_NumProntuario', $nprontuario);
        $this->db->like('Pc_CartaoSus', $sus);
        $this->db->where('not exists(select 1 from tbl_caracterizacao_paciente cp where cp.Pc_CPF = tbl_paciente.Pc_CPF )', null, false);
        $this->db->order_by("Pc_nome", "asc");
        $query = $this->db->get('tbl_paciente');
        return $query->result();
      }

      public function recuperarPacienteComCaracterizacaoPorNomeNprontuarioCartaoSUS($nome, $nprontuario, $sus)
      {
        $this->db->like('Pc_Nome', $nome);
        $this->db->like('Pc_NumProntuario', $nprontuario);
        $this->db->like('Pc_CartaoSus', $sus);
        $this->db->where('exists(select 1 from tbl_caracterizacao_paciente cp where cp.Pc_CPF = tbl_paciente.Pc_CPF )', null, false);
        $this->db->order_by("Pc_nome", "asc");
        $query = $this->db->get('tbl_paciente');
        return $query->result();
      }

      public function recuperarPacienteComSolicitacaoPorNomeNprontuarioCartaoSUS($nome, $nprontuario, $sus)
      {
        $this->db->like('Pc_Nome', $nome);
        $this->db->like('Pc_NumProntuario', $nprontuario);
        $this->db->like('Pc_CartaoSus', $sus);
        $this->db->where('exists(select 1 from tbl_solicitacao s where s.Pc_CPF = tbl_paciente.Pc_CPF )', null, false);
        $this->db->order_by("Pc_nome", "asc");
        $query = $this->db->get('tbl_paciente');
        return $query->result();
      }

      public function recuperarPacienteComAndamentoPorNomeNprontuarioCartaoSUS($nome, $nprontuario, $sus)
      {
          $this->db->like('Pc_Nome', $nome);
          $this->db->like('Pc_NumProntuario', $nprontuario);
          $this->db->like('Pc_CartaoSus', $sus);
          $this->db->where('exists(select 1 from tbl_andamento_paciente ap where ap.Pc_CPF = tbl_paciente.Pc_CPF )', null, false);
          $this->db->order_by("Pc_nome", "asc");
          $query = $this->db->get('tbl_paciente');
          return $query->result();
      }

      public function recuperarPacientePorCPF($cpf)
      {
        $this->db->where('Pc_CPF', $cpf);
        $query = $this->db->get('tbl_paciente');
        $array = $query->result();
        if(sizeof($array)==0)
        {
          $paciente = [];
        }
        else
        {
          $paciente = $array[0];
        }

        return $paciente;
      }

      function get_all()
      {
          $this->db->order_by("Pc_nome", "asc");
          $query = $this->db->get('tbl_paciente');
          return $query->result();
      }

      public function cadastrarPaciente($dataPaciente)
      {
        $this->db->insert('tbl_paciente',$dataPaciente);

        return $this->recuperarPacientePorCPF($dataPaciente['Pc_CPF']);

      }

      public function editarPacientePorCPF($cpf, $dataPaciente)
      {
        $this->db->update('tbl_paciente',$dataPaciente, array('Pc_CPF' => $cpf));
      }

      public function excluirPacientePorCPF($cpf)
      {
          $tabelas = array('tbl_paciente', 'tbl_endereco', 'tbl_telefone', 'tbl_proteses_pacientes');
          $where = array('Pc_CPF' => $cpf);
          $this->db->delete($tabelas, $where);
      }
  }
?>
