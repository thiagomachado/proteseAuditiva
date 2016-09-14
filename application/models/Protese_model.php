<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Protese_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function recuperarProteses()
        {
          $this->db->order_by("Prot_DataEntrada", "asc");
          $query                      = $this->db->get('tbl_proteses');
          $listaProteses["proteses"]  = $query->result();

          return $listaProteses;
        }

        public function recuperarProtesesPorNomeClasseDisponibilidade($nome,$classe,$disponibilidade)
        {
            $this->db->like('Prot_Nome', $nome);
            $this->db->like('classe_id', $classe);
            if($disponibilidade == 0)
            {
                $this->db->where('Pc_CPF', '');
            }
            elseif($disponibilidade == 1)
            {
                $this->db->where('Pc_CPF !=', '');
            }
            $query  = $this->db->get('tbl_proteses');
            $proteses= $query->result();

            return $proteses;
        }

        public function recuperarProtesesSemPacientes()
        {
          $this->db->where('Pc_CPF', '');
          $this->db->order_by("Prot_Nome", "asc");
          $query    = $this->db->get('tbl_proteses');
          $proteses = $query->result();

          return $proteses;
        }

        public function recuperarProtesesPorPacientes($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $this->db->order_by("Prot_DataSaida", "asc");
          $query    = $this->db->get('tbl_proteses');
          $proteses = $query->result();

          return $proteses;
        }

        public function recuperarProtesePorCodigo($codigo)
        {
          $this->db->where('Prot_Cod', $codigo);
          $query = $this->db->get('tbl_proteses');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $protese = [];
          }
          else
          {
            $protese = $array[0];
          }

          return $protese;
        }

        public function recuperarProtesePorId($id)
        {
          $this->db->where('Prot_Id', $id);
          $query = $this->db->get('tbl_proteses');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $protese = [];
          }
          else
          {
            $protese = $array[0];
          }

          return $protese;
        }

        public function recuperarProtesePorClasseId($classe)
        {
            $this->db->where('classe_id', $classe);
            $this->db->order_by("Prot_Nome", "asc");
            $query    = $this->db->get('tbl_proteses');
            $proteses = $query->result();

            return $proteses;
        }

        public function editar($id, $protese)
        {
          $this->db->update('tbl_proteses',$protese, array('Prot_Id' => $id));
        }


        public function cadastrar($protese)
        {
          $this->db->insert('tbl_proteses', $protese);
          $insert_id = $this->db->insert_id();

          return  $insert_id;
        }


    }
?>
