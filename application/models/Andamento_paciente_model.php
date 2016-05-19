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

        public function editarSolicitacao($solicitacao,$id)
        {
          $this->db->update('tbl_solicitacao',$solicitacao, array('Solic_id' => $id));
        }

        public function recuperarSolicitacoesPorCPF($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $query = $this->db->get('tbl_solicitacao');
          $solicitacao = $query->result();

          return $solicitacao;
        }

        public function recuperarSolicitacaoPorId($id)
        {
          $this->db->where('Solic_id', $id);
          $query = $this->db->get('tbl_solicitacao');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $solicitacao = [];
          }
          else
          {
            $solicitacao = $array[0];
          }

          return $solicitacao;
        }
    }
?>
