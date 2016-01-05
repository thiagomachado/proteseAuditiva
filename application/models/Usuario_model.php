<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Usuario_model extends CI_Model
    {

        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

        function get_all()
        {
            $this->db->order_by("nomeUsuario", "asc");
            $query = $this->db->get('tbl_usuarios');
            return $query->result();
        }

        function verificarUsuario($usuario, $senha)
        {
          $query = $this->db->get_where('tbl_usuarios', array('Us_Login' => $usuario, 'Us_Senha' => $senha));

          if($query -> num_rows() == 1)
          {
              return true;
          }

          return false;

        }

        function recuperarDadosUsuario($usuarioLogin)
        {
          $query = $this->db->get_where('tbl_usuarios', array('Us_Login' => $usuarioLogin))->result();
          foreach ($query as $usuario)
          {
            $dadosUsuario["cpf"] = $usuario->Us_CPF;
            $dadosUsuario["nome"] = $usuario->Us_Nome;
            $dadosUsuario["nivel"] = $usuario->Us_Nivel;
            $dadosUsuario["cargo"] = $usuario->Us_Cargo;

            return $dadosUsuario;
          }
        }

        function insert_entry($usuarioDados)
        {
            if($this->db->insert('tbl_usuarios', $usuarioDados))
            {
                return true;
            }

            return false;
        }
    }
?>
