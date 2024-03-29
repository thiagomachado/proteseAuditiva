<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Caracterizacao_paciente_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function cadastrarCaracterizacaoPaciente($caracterizacao)
        {
          $this->db->insert('tbl_caracterizacao_paciente', $caracterizacao);
          return $this->db->insert_id();
        }

        public function editarCaracterizacaoPaciente($caracterizacao,$numero)
        {
          $this->db->update('tbl_caracterizacao_paciente',$caracterizacao, array('Caract_Numero' => $numero));
        }

        public function recuperarCaracterizacaoPacientePorCPF($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $query = $this->db->get('tbl_caracterizacao_paciente');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $caracterizacao = [];
          }
          else
          {
            $caracterizacao = $array;
          }

          return $caracterizacao;
        }

        public function recuperarCaracterizacaoPacientePorNumero($numero)
        {
            $this->db->where('Caract_Numero', $numero);
            $query = $this->db->get('tbl_caracterizacao_paciente');
            $array = $query->result();
            if(sizeof($array)==0)
            {
                $caracterizacao = [];
            }
            else
            {
                $caracterizacao = $array[0];
            }

            return $caracterizacao;
        }
    }
?>
