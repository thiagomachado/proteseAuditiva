<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formProtese'
    );

    $dataId = array(
            'name'          => 'id',
            'id'            => 'id',
            'type'          => 'hidden',
            'value'         => $protese->Prot_Id
    );

    $dataCodigo = array(
            'name'          => 'codigo',
            'id'            => 'codigo',
            'required'      => '',
            'type'          => 'number',
            'maxlength'     => '11',
            'size'          => '22',
            'required'      => '',
            'value'         => $protese->Prot_Cod
    );

    $dataNomeItem = array(
            'name'          => 'nomeItem',
            'id'            => 'nomeItem',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '62',
            'value'         => $protese->Prot_Nome

    );
    $dataFabricante = array(
            'name'          => 'fabricante',
            'id'            => 'fabricante',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '22',
            'value'         => $protese->Prot_Fabricante
    );
    $dataClasse = array(
            'name'          => 'classe',
            'id'            => 'classe',
            'required'      => '',
            'maxlength'     => '45',
            'size'          => '22',
            'value'         => $protese->Prot_Classe
    );

    $dataValor = array(
            'name'          => 'valor',
            'id'            => 'valor',
            'type'          => 'tel',
            'required'      => '',
            'pattern'       => '\d+(\.\d{2})?',
            'placeholder'   => 'Ultilize . ao inves de ,',
            'size'          => '15',
            'value'         => $protese->Prot_Valor
    );

    $dataDataEntrada = array(
            'type'          => 'date',
            'name'          => 'dataEntrada',
            'id'            => 'dataEntrada',
            'required'      => '',
            'value'         => $protese->Prot_DataEntrada
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Editar',
            'id'            => 'btnCadastrarImplante',
            'class'         => 'botao'
    );
  ?>
