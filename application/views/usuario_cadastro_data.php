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
            'maxlength'     => '45'
    );

    $dataCPF = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '17',
            'required'      => '',
            'pattern'       => '\d{11}',
            'maxlength'     => '11',
            'title'         => 'Digite apenas números no CPF'
    );

    $dataDataNascimento = array(
            'type'          => 'date',
            'name'          => 'dataNascimento',
            'id'            => 'dataNascimento',
            'required'      => ''
    );


    $dataCRFA = array(
            'name'          => 'crfa',
            'id'            => 'crfa',
            'size'          => '20',
            'maxlength'     => '45'
    );

    $dataCartaoSUS = array(
            'name'          => 'cartaoSUS',
            'id'            => 'cartaoSUS',
            'size'          => '20',
            'maxlength'     => '45'
    );

    $dataCargo = array(
            'name'          => 'cargo',
            'id'            => 'cargo',
            'size'          => '40',
            'required'      => '',
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
            'maxlength'     => '10'
    );

    $dataEmail = array(
            'name'          => 'email',
            'id'            => 'email',
            'size'          => '58',
            'required'      => '',
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
            'value'         => 'Cadastrar',
            'id'            => 'cadastrarPaciente',
            'class'         => 'botao submit'
    );
?>
