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
          $query   = $this->db->get_where('tbl_usuarios', array('Us_Login' => $usuarioLogin))->result();
          $usuario = $query[0];

          return $usuario;
        }

        public function recuperarDadosUsuarioPorCPF($cpf)
        {
          $usuario = $this->db->get_where('tbl_usuarios', array('Us_CPF' => $cpf))->result();
          $usuario = $usuario[0];
          return $usuario;
        }

        public function recuperarProfissionais()
        {
          $query = $this->db->get_where('tbl_usuarios', array('Us_Nivel' => 2))->result();
          if(sizeof($query) == 0)
          {
            $profissionais = [];
          }
          else
          {
            $profissionais = $query;
          }

          return $profissionais;
        }

        public function cadastrar($usuarioDados)
        {
            if($this->db->insert('tbl_usuarios', $usuarioDados))
            {
                return true;
            }

            return false;
        }

        public function editar($cpf,$usuario)
        {
          $this->db->update('tbl_usuarios', $usuario, array('Us_CPF' => $cpf));
          return true;
        }
    }
?>
