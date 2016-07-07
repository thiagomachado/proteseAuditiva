<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Solicitacao_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarSolicitacao($solicitacao)
        {
          $this->db->insert('tbl_solicitacao', $solicitacao);
          return $this->db->insert_id();
        }

        public function editarSolicitacao($solicitacao,$id)
        {
          $this->db->update('tbl_solicitacao',$solicitacao, array('Solic_id' => $id));
          return $this->db->last_query();;
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
