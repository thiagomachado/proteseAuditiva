<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formImplante'
    );

    $dataCodigo = array(
            'name'          => 'codigo',
            'id'            => 'codigo',
            'type'          => 'hidden',
            'value'         => $implante->Impl_Cod
    );

    $dataNomeItem = array(
            'name'          => 'nomeItem',
            'id'            => 'nomeItem',
            'required'      => '',
            'maxlength'     => '45',
            'value'         => $implante->Impl_Desc,
            'size'          => '62'

    );
    $dataFabricante = array(
            'name'          => 'fabricante',
            'id'            => 'fabricante',
            'required'      => '',
            'maxlength'     => '45',
            'value'         => $implante->Impl_Fabr,
            'size'          => '22'
    );
    $dataClasse = array(
            'name'          => 'classe',
            'id'            => 'classe',
            'required'      => '',
            'maxlength'     => '45',
            'value'         => $implante->Impl_Clss,
            'size'          => '22'
    );

    $dataValor = array(
            'name'          => 'valor',
            'id'            => 'valor',
            'type'          => 'tel',
            'required'      => '',
            'pattern'       => '\d+(\.\d{2})?',
            'placeholder'   => 'Ultilize . ao inves de ,',
            'value'         => $implante->Impl_Valor,
            'size'          => '15'
    );

    $dataDataEntrada = array(
            'type'          => 'date',
            'name'          => 'dataEntrada',
            'id'            => 'dataEntrada',
            'value'         => $implante->Impl_DataEnt,
            'required'      => ''
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Editar',
            'id'            => 'btnEditarImplante',
            'class'         => 'botao'
    );
  ?>
