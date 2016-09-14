<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formImplante'
    );

    $dataId = array(
            'name'          => 'id',
            'id'            => 'id',
            'type'          => 'hidden',
            'value'         => $implante->Impl_Id
    );

    $dataCodigo = array(
            'name'          => 'codigo',
            'id'            => 'codigo',
            'required'      => '',
            'type'          => 'number',
            'maxlength'     => '11',
            'size'          => '22',
            'required'      => '',
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

    $dataClasse = array();

    foreach ($classes as $classe)
    {
        $dataClasse[$classe->classe_id] = $classe->classe_nome;
    }

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
