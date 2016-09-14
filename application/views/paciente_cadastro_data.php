<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $data_form = array(
        'id' => 'formPaciente'
    );
    //Dados Pessoais do Paciente
    $dataNomePaciente = array(
            'name'          => 'nomePaciente',
            'id'            => 'nomePaciente',
            'size'          => '62',
            'required'      => '',
            'maxlength'     => '100'
    );
    $dataCartaoSus = array(
            'name'          => 'cartaoSUS',
            'id'            => 'cartaoSUS',
            'size'          => '16',
            'required'      => '',
            'maxlength'     => '20'
    );
    $dataProntuario = array(
            'name'          => 'nProntuario',
            'id'            => 'nProntuario',
            'size'          => '8',
            'required'      => '',
            'maxlength'     => '20'
    );
    $dataCPF = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '17',
            'required'      => '',
            'pattern'       => '\d{11}',
            'maxlength'     => '11',
            'placeholder'   => 'Próprio ou Responsável',
            'title'         => 'Digite apenas números no CPF'
    );
    $dataDataNascimento = array(
            'type'          => 'date',
            'name'          => 'dataNascimento',
            'id'            => 'dataNascimento',
            'required'      => '',
            'onchange'      => 'calcularIdade()'
    );
    $dataIdade = array(
            'name'          => 'idade',
            'id'            => 'idade',
            'size'          => '10',
            'readonly'      => ''
    );
    $dataSexoM = array(
            'type'          => 'radio',
            'name'          => 'sexo',
            'id'            => 'sexoM',
            'size'          => '30',
            'required'      => '',
            'value'         => 'm'
    );
    $dataSexoF = array(
            'type'          => 'radio',
            'name'          => 'sexo',
            'id'            => 'sexoF',
            'size'          => '30',
            'value'         => 'f'
    );
    $dataEtnia = array(
            '1'             => 'Amarelo',
            '2'             => 'Branco',
            '3'             => 'Negro',
            '4'             => 'Pardo',
            '5'             => 'Indigina'
    );
    $dataNomeMaePaciente = array(
            'name'          => 'nomeMaePaciente',
            'id'            => 'nomeMaePaciente',
            'size'          => '40',
            'required'      => '',
            'maxlength'     => '100'
    );
    $dataNomePaiPaciente = array(
            'name'          => 'nomePaiPaciente',
            'id'            => 'nomePaiPaciente',
            'size'          => '40',
            'maxlength'     => '100'
    );
    $dataEscolaridade = array(
            '1'             => 'Ensino Fundamental (Incompleto)',
            '2'             => 'Ensino Fundamental (Completo)',
            '3'             => 'Ensino Médio (Incompleto)',
            '4'             => 'Ensino Médio (Completo)',
            '5'             => 'Ensino Superior (Incompleto)',
            '6'             => 'Ensino Superior (Completo)'
    );
    $dataTrabalhaS = array(
            'type'          => 'radio',
            'name'          => 'trabalha',
            'id'            => 'trabalhaS',
            'size'          => '30',
            'required'      => '',
            'value'         => '1'
    );
    $dataTrabalhaN = array(
            'type'          => 'radio',
            'name'          => 'trabalha',
            'id'            => 'trabalhaN',
            'size'          => '30',
            'value'         => '0'
    );
    $dataProfissao = array(
            'name'          => 'profissao',
            'id'            => 'profissao',
            'size'          => '30',
            'maxlength'     => '45'
    );

    $dataAnamnese = array(
            'adulta'        => 'Adulta',
            'infantil'      => 'Infantil'
    );


    //Endereço do Paciente
    $dataLogradouro = array(
            'name'          => 'logradouro',
            'id'            => 'logradouro',
            'size'          => '100',
            'required'      => '',
            'placeholder'   => 'Rua/Número/Bairro'
    );
    $dataEstado = array();

    foreach ($estados as $estado)
    {
      $dataEstado[$estado->UF_Cod] = $estado->UF_Cod;
    }


    $dataMunicipio = array();
    foreach ($municipios as $municipio)
    {
        $dataMunicipio[$municipio->Mun_Cod] = $municipio->Mun_Nome;
    }

    $dataCodIBGE = array(
            'name'     => 'codIBGE',
            'id'       => 'codIBGE',
            'size'     => '15',
            'readonly' => ''

    );

    $dataCEP = array(
            'name'      => 'cep',
            'id'        => 'cep',
            'required'  => '',
            'size'      => '15',
            'maxlength' => '8'

    );

    //Telefone do Paciente
    $dataTelefone1 = array(
            'name'      => 'telefone1',
            'id'        => 'telefone1',
            'size'      => '15',
            'maxlength' => '14'
    );
    $dataTelefone2 = array(
            'name'      => 'telefone2',
            'id'        => 'telefone2',
            'size'      => '15',
            'maxlength' => '14'
    );


    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Cadastrar',
            'id'            => 'cadastrarPaciente',
            'class'         => 'botao submit'
    );
?>
