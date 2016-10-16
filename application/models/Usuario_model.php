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

        function recuperarUsuarioPorNomeEmailNivel($nome,$email,$nivel)
        {

            $query = $this->db->query("select u.Us_CPF, u.Us_Nome, u.Us_email, n.Nvl_Desc from bd_projpa.tbl_usuarios u
inner join bd_projpa.tblnivel n on n.Nvl_Cod = u.Us_Nivel
where u.Us_Nome like '".$nome."%' and u.Us_email like '".$email."%' and n.Nvl_Cod like '".$nivel."%'");

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

            $query = $this->db->query("select u.* from bd_projpa.tbl_usuarios u
where u.Us_Nivel = 2 or u.Us_Nivel = 6")->result();

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

        public function excluirUsuario($cpf)
        {
            $this->db->delete('tbl_usuarios', array('Us_CPF' => $cpf));
        }
    }
?>
