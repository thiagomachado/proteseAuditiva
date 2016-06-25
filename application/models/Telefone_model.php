<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Telefone
    {
      var $Tel_Tel1 = '';
      var $Tel_Tel2 = '';
    }
    class Telefone_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $query = $this->db->get('tbl_telefone');
            return $query->result();
        }

        function cadastrarTelefone($dataTelefone)
        {
          $this->db->insert('tbl_telefone', $dataTelefone);
        }

        function recuperarTelefonePorCPF($cpf)
        {
          //retorna o objeto telefone
            $this->db->where('Pc_CPF', $cpf);
            $query = $this->db->get('tbl_telefone');
            $array = $query->result();
            if(sizeof($array)==0)
            {

                $telefone = new Telefone();
                return $telefone;
            }
            $telefone = $array[0];
            return $telefone;
        }

        function editarTelefonePorCPF($cpf, $dataTelefone)
        {
          $this->db->update('tbl_telefone',$dataTelefone, array('Pc_CPF' => $cpf));
        }
    }
?>
