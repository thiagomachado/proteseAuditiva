<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Implante_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function recuperarImplantes()
        {
          $this->db->order_by("Impl_DataEnt", "desc");
          $query                       = $this->db->get('tbl_implantes');
          $listaImplantes["implantes"] = $query->result();

          return $listaImplantes;
        }

        public function recuperarImplantesPorNomeClasseDisponibilidade($nome,$classe,$disponibilidade)
        {
            $this->db->like('Impl_Desc', $nome);
            $this->db->like('classe_id', $classe);
            if($disponibilidade == 0)
            {
                $this->db->where('Pc_CPF', '');
            }
            elseif($disponibilidade == 1)
            {
                $this->db->where('Pc_CPF !=', '');
            }
            $query  = $this->db->get('tbl_implantes');

            $listaImplantes = $query->result();

            return $listaImplantes;
        }

        public function recuperarImplantesSemPacientes()
        {
          $this->db->where('Pc_CPF', '');
          $this->db->order_by("Impl_Desc", "asc");
          $query     = $this->db->get('tbl_implantes');
          $implantes = $query->result();

          return $implantes;
        }

        public function recuperarImplantePorCodigo($codigo)
        {
          $this->db->where('Impl_Cod', $codigo);
          $query = $this->db->get('tbl_implantes');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $implante = [];
          }
          else
          {
            $implante = $array[0];
          }

          return $implante;
        }

        public function recuperarImplantePorId($id)
        {
          $this->db->where('Impl_Id', $id);
          $query = $this->db->get('tbl_implantes');
          $array = $query->result();
          if(sizeof($array)==0)
          {
            $implante = [];
          }
          else
          {
            $implante = $array[0];
          }

          return $implante;
        }

        public function recuperarImplantesPorPacientes($cpf)
        {
          $this->db->where('Pc_CPF', $cpf);
          $this->db->order_by("Impl_DataSaida", "asc");
          $query    = $this->db->get('tbl_implantes');
          $implantes = $query->result();

          return $implantes;
        }

        public function recuperarImplantesPorClasseId($classe)
        {
            $this->db->where('classe_id', $classe);
            $this->db->order_by("Impl_Desc", "asc");
            $query    = $this->db->get('tbl_implantes');
            $implantes = $query->result();

            return $implantes;
        }

        public function editar($id, $implante)
        {
          $this->db->update('tbl_implantes',$implante, array('Impl_Id' => $id));
        }

        public function cadastrar($implante)
        {
          $this->db->insert('tbl_implantes', $implante);
          $insert_id = $this->db->insert_id();

          return  $insert_id;
        }


    }
?>
