<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $dataNomePaciente = array(
            'name'          => 'nomePaciente',
            'id'            => 'nomePaciente',
            'size'          => '62'
    );
    $dataCartaoSus = array(
            'name'          => 'cartaoSUS',
            'id'            => 'cartaoSUS',
            'size'          => '30'
    );
    $dataProntuario = array(
            'name'          => 'nProntuario',
            'id'            => 'nProntuario',
            'size'          => '30'
    );
    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Consultar',
            'id'            => 'btnConsultarPaciente',
            'class'         => 'botao'
    );
  ?>
