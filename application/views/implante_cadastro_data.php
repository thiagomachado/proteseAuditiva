<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formImplante'
    );

    $dataNomeItem = array(
            'name'          => 'nomeItem',
            'id'            => 'nomeItem',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '62'

    );
    $dataFabricante = array(
            'name'          => 'fabricante',
            'id'            => 'fabricante',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '22'
    );
    $dataClasse = array(
            'name'          => 'classe',
            'id'            => 'classe',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '22'
    );

    $dataValor = array(
            'name'          => 'valor',
            'id'            => 'valor',
            'type'          => 'tel',
            'required'      => '',
            'pattern'       => '\d+(\.\d{2})?',
            'placeholder'   => 'Ultilize . ao inves de ,',
            'size'          => '15'
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
  ?>
