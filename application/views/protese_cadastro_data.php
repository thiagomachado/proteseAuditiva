<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formProtese'
    );

    $dataNomeItem = array(
            'name'          => 'nomeItem',
            'id'            => 'nomeItem',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '62'

    );

    $dataCodigo = array(
            'name'          => 'codigo',
            'id'            => 'codigo',
            'required'      => '',
            'type'          => 'number',
            'maxlength'     => '11',
            'required'      => '',
            'size'          => '22'
    );

    $dataFabricante = array(
            'name'          => 'fabricante',
            'id'            => 'fabricante',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '22'
    );
//    $dataClasse = array(
//            'name'          => 'classe',
//            'id'            => 'classe',
//            'required'      => '',
//            'maxlength'     => '45',
//            'size'          => '22'
//    );

    $dataValor = array(
            'name'          => 'valor',
            'id'            => 'valor',
            'type'          => 'tel',
            'required'      => '',
            'pattern'       => '\d+(\.\d{2})?',
            'placeholder'   => 'Ultilize . ao inves de ,',
            'size'          => '17'
    );

    $dataDataEntrada = array(
            'type'          => 'date',
            'name'          => 'dataEntrada',
            'id'            => 'dataEntrada',
            'required'      => ''
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Cadastrar',
            'id'            => 'btnCadastrarImplante',
            'class'         => 'botao'
    );

    $dataClasse = array();

    foreach ($classes as $classe)
    {
        $dataClasse[$classe->classe_id] = $classe->classe_nome;
    }
  ?>
