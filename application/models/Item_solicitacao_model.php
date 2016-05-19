<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Item_solicitacao_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarItemSolicitacao($itemSolicitacao)
        {
          $this->db->insert('tbl_item_solicitacao', $itemSolicitacao);
          return $this->db->insert_id();
        }

        public function editarItemSolicitacao($itenSolicitacao,$id)
        {
          $this->db->update('tbl_item_solicitacao',$itenSolicitacao, array('Isolic_id' => $id));
        }

        public function recuperarItensPorSolicitacao($idSolicitacao)
        {
          $this->db->where('Solic_id', $idSolicitacao);
          $query = $this->db->get('tbl_item_solicitacao');
          $itens = $query->result();

          return $itens;
        }

        public function recuperarItensPorPaciente($cpf)
        {
          $this->db->select('*');
          $this->db->from('tbl_item_solicitacao');
          $this->db->join('tbl_solicitacao','tbl_item_solicitacao.Solic_id = tbl_solicitacao.Solic_id');
          $this->db->join('tbl_paciente','tbl_solicitacao.Pc_CPF = tbl_paciente.Pc_CPF');
          $this->db->where('tbl_paciente.Pc_CPF', $cpf);
          $this->db->order_by("tbl_solicitacao.Solic_data", "asc");
          $query = $this->db->get();

          return $query->result();
        }
    }
?>
