<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Endereco_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $query = $this->db->get('tbl_endereco');
            return $query->result();
        }

        function cadastrarEndereco($dataEndereco)
        {
          $this->db->insert('tbl_endereco', $dataEndereco);
        }

        function recuperarEnderecoPorCPF($cpf)
        {
          //retorna o objeto endereço
            $this->db->where('Pc_CPF', $cpf);
            $query = $this->db->get('tbl_endereco');
            $array = $query->result();
            $endereco = $array[0];
            return $endereco;
        }

        function editarEnderecoPorCPF($cpf,$dataEndereco)
        {
          $this->db->update('tbl_endereco',$dataEndereco, array('Pc_CPF' => $cpf));                      
        }
    }
?>
