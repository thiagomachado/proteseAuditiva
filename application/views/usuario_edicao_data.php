<?php
    defined('BASEPATH') OR exit('No direct script access allowed');


    $data_form = array(
        'id' => 'formUsuario'
    );
    //Dados Pessoais do Paciente
    $dataNome = array(
            'name'          => 'nomeUsuario',
            'id'            => 'nomeUsuario',
            'size'          => '62',
            'required'      => '',
            'value'         => $this->session->userdata("usuario")->Us_Nome,
            'maxlength'     => '45'
    );

    $dataCPF = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '17',
            'required'      => '',
            'pattern'       => '\d{11}',
            'maxlength'     => '11',
            'value'         => $this->session->userdata("usuario")->Us_CPF,
            'title'         => 'Digite apenas números no CPF'
    );

    $dataCPFHidden = array(
            'name'          => 'cpfHidden',
            'id'            => 'cpfHidden',
            'type'          => 'hidden',
            'value'         => $this->session->userdata("usuario")->Us_CPF
    );


    $dataDataNascimento = array(
            'type'          => 'date',
            'name'          => 'dataNascimento',
            'id'            => 'dataNascimento',
            'value'         => $this->session->userdata("usuario")->Us_DtNasc,
            'required'      => ''
    );


    $dataCRFA = array(
            'name'          => 'crfa',
            'id'            => 'crfa',
            'size'          => '30',
            'value'         => $this->session->userdata("usuario")->Us_CRFA,
            'maxlength'     => '45'
    );

    $dataCargo = array(
            'name'          => 'cargo',
            'id'            => 'cargo',
            'size'          => '40',
            'required'      => '',
            'value'         => $this->session->userdata("usuario")->Us_Cargo,
            'maxlength'     => '45'
    );

    $dataNiveis = array();
    foreach ($niveis as $nivel)
    {
      $dataNiveis[$nivel->Nvl_Cod] = $nivel->Nvl_Desc;
    }

    $dataLogin = array(
            'name'          => 'login',
            'id'            => 'login',
            'size'          => '40',
            'required'      => '',
            'value'         => $this->session->userdata("usuario")->Us_Login,
            'maxlength'     => '10'
    );

    $dataEmail = array(
            'name'          => 'email',
            'id'            => 'email',
            'size'          => '58',
            'required'      => '',
            'value'         => $this->session->userdata("usuario")->Us_email,
            'maxlength'     => '100'
    );

    $dataSenha = array(
            'type'          => 'password',
            'name'          => 'senha',
            'id'            => 'senha',
            'required'      => '',
            'size'          => '49',
            'maxlength'     => '40'
    );

    $dataReSenha = array(
            'type'          => 'password',
            'name'          => 're_senha',
            'id'            => 're_senha',
            'required'      => '',
            'size'          => '49',
            'maxlength'     => '40'
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Editar',
            'id'            => 'cadastrarPaciente',
            'class'         => 'botao submit'
    );
?>
