<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Anamnese_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function recuperarAnmaneseAdultaPorCPF($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $query          = $this->db->get('tbl_anamneseadt');
          $array          = $query->result();
          if(sizeof($array)==0)
          {
            $anamneseAdulta = [];
          }
          else
          {
            $anamneseAdulta = $array[0];
          }

          return $anamneseAdulta;
        }

        public function recuperarAnmaneseInfantilPorCPF($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $query            = $this->db->get('tbl_anamneseinf');
          $array            = $query->result();
          if(sizeof($array)==0)
          {
            $anamneseInfantil = [];
          }
          else
          {
            $anamneseInfantil = $array[0];
          }
          return $anamneseInfantil;
        }

        public function editarAnamneseAdultaPorCPF($cpf, $anamnese)
        {
          $this->db->update('tbl_anamneseadt',$anamnese, array('Pc_CPF' => $cpf));
        }

        public function editarAnamneseInfantilPorCPF($cpf, $anamnese)
        {
          $this->db->update('tbl_anamneseinf',$anamnese, array('Pc_CPF' => $cpf));
        }

        public function cadastrarAnamneseAdulta($anamnese)
        {
          $this->db->insert('tbl_anamneseadt', $anamnese);
        }

        public function cadastrarAnamneseInfantil($anamnese)
        {
          $this->db->insert('tbl_anamneseinf', $anamnese);
        }

    }
?>
