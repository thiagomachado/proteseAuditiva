<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formAndamentoPaciente'
    );


    $dataNomePaciente = array(
            'name'          => 'nomePaciente',
            'id'            => 'nomePaciente',
            'size'          => '65',
            'disabled'      => '',
            'readonly'      => '',
            'maxlength'     => '100',
            'value'         => $paciente->Pc_Nome
    );

    $dataCPF = array(
            'name'          => 'cpfHidden',
            'type'          => 'hidden',
            'id'            => 'cpfHidden',
            'value'         => $paciente->Pc_CPF
    );

    $dataCNS = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '25',
            'disabled'      => '',
            'readonly'      => '',
            'value'         => $paciente->Pc_CartaoSus
    );

    $dataQuantidade = array(
            'name'          => 'quantidade[]',
            'id'            => 'quantidade',
            'required'      => '',
            'size'          => '10',
            'maxlength'     => '11'
    );

    $dataObs = array(
            'name'          => 'obs',
            'id'            => 'obs',
            'rows'          => '5',
            'cols'          => '104',
            'value'         => $andamento->Andamento_obs,
            'maxlength'     => '250'
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

    $dataClasse = array();

    foreach ($classes as $classe)
    {
        $dataClasse[$classe->classe_id] = $classe->classe_nome;
    }
  ?>
