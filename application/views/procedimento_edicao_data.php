<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formProcedimento'
    );

    $dataId = array(
            'name'          => 'id',
            'id'            => 'id',
            'type'          => 'hidden',
            'value'         => $procedimento->Proc_Id
    );

    $dataNome = array(
            'name'          => 'nome',
            'id'            => 'nome',
            'required'      => '',
            'maxlength'     => '150',
            'size'          => '62',
            'value'         => $procedimento->Proc_Nome

    );
    $dataCodigo = array(
            'name'          => 'codigo',
            'id'            => 'codigo',
            'required'      => '',
            'maxlength'     => '22',
            'size'          => '22',
            'value'         => $procedimento->Proc_Codigo,
    );

    $dataValor = array(
            'name'          => 'valor',
            'id'            => 'valor',
            'type'          => 'tel',
            'required'      => '',
            'pattern'       => '\d+(\.\d{2})?',
            'placeholder'   => 'Ultilize . ao inves de ,',
            'size'          => '15',
            'value'         => $procedimento->Proc_Valor,
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Editar',
            'id'            => 'btnCadastrarImplante',
            'class'         => 'botao'
    );
  ?>
