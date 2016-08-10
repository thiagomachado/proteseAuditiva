<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once('email/class.phpmailer.php');
    require_once('email/class.smtp.php');
    class Login extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('title', 'FONOAUDIOLOGIA');
            $this->template->set('css', link_tag('assets/css/login_form.css'));
            $this->load->model('usuario_model');
        }

        public function index()
        {
            $this->template->load('template','login_form');
        }

        public function logar()
        {
            $nomeUsuario = $this->input->post('nomeUsuario');
            $senha       = sha1($this->input->post('senha'));
            if($this->usuario_model->verificarUsuario($nomeUsuario, $senha))
            {
                $usuario = $this->usuario_model->recuperarDadosUsuario($nomeUsuario);
                $this->session->set_userdata("logado", 1);
                $this->session->set_userdata("usuario", $usuario);
                redirect(base_url());

            }
            else
            {
                $data['mensagem'] = 'Usuário ou senha incorretos!';
                $this->template->load('template', 'login_form', $data);
            }
        }

        public function logout()
        {
            $this->session->unset_userdata("logado");
            $this->session->unset_userdata("usuario");
            redirect(base_url());
        }

        public function recuperarSenha()
        {
            extract($_POST);
            //$login vem pelo POST da request http
            $usuario = $this->usuario_model->recuperarDadosUsuario($login);
            $senha   = $this->gerarNovaSenha();
            $this->enviarEmail($usuario->Us_email, $senha);
            
            $usuario->Us_Senha = sha1($senha);
            $this->usuario_model->editar($usuario->Us_CPF, $usuario);
            echo json_encode($usuario->Us_email);

        }
        
        public function enviarEmail($email, $senha) 
        {
            $mail = new PHPMailer(); // instancia a classe PHPMailer

            $mail->IsSMTP();

            //configuração do gmail
            $mail->Port = '465'; //porta usada pelo gmail.
            $mail->Host = 'smtp.gmail.com'; 
            $mail->IsHTML(true); 
            $mail->Mailer = 'smtp'; 
            $mail->SMTPSecure = 'ssl';

            //configuração do usuário do gmail
            $mail->SMTPAuth = true; 
            $mail->Username = 'bdproteseauditiva@gmail.com'; // usuario gmail.   
            $mail->Password = 'HUfonoBD'; // senha do email.

            $mail->SingleTo = true; 

            // configuração do email a ver enviado.
            $mail->From = "bdproteseauditiva@gmail.com"; 
            $mail->FromName = "Banco de Dados Fonoaudiologia"; 

            $mail->addAddress($email); // email do destinatario.

            $mail->Subject = "Senha do Banco de Dados Fonoaudilogia"; 
            $mail->Body = "Sua senha foi alterada para:".$senha;

            if(!$mail->Send())
                echo "Erro ao enviar Email:" . $mail->ErrorInfo; 
        }
        
        public function gerarNovaSenha() 
        {
            $caracteres = "0123456789abcdefghijklmnopqrstuvwxyz+-#@$&*";
            $senha = substr(str_shuffle($caracteres),0,7);
            
            return $senha;
        }
    }

?>
