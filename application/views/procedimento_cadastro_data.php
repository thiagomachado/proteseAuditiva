<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formProcedimento'
    );

    $dataNome = array(
            'name'          => 'nome',
            'id'            => 'nome',
            'required'      => '',
            'maxlength'     => '150',
            'size'          => '58'

    );
    $dataCodigo = array(
            'name'          => 'codigo',
            'id'            => 'codigo',
            'required'      => '',
            'maxlength'     => '22',
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

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Cadastrar',
            'id'            => 'btnCadastrarImplante',
            'class'         => 'botao'
    );
  ?>
