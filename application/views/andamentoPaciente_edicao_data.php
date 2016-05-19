<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formAndamentoPaciente'
    );


    $dataNomePaciente = array(
            'name'          => 'nomePaciente',
            'id'            => 'nomePaciente',
            'size'          => '72',
            'readonly'      => '',
            'maxlength'     => '100',
            'value'         => $paciente->Pc_Nome
    );

    $dataCNS = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '30',
            'readonly'      => '',
            'value'         => $paciente->Pc_CartaoSus
    );

    $dataProcedimentos = array();

    foreach ($procedimentos as $procedimento)
    {
      $dataProcedimentos[$procedimento->Proc_Id] = $procedimento->Proc_Codigo .' - '.$procedimento->Proc_Nome ;
    }


    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Atualizar',
            'id'            => 'btnCadastrarSolicitacao',
            'class'         => 'botao'
    );
  ?>
