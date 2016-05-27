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

    $dataCPF = array(
            'name'          => 'cpfHidden',
            'type'          => 'hidden',
            'id'            => 'cpfHidden',
            'value'         => $paciente->Pc_CPF
    );

    $dataCNS = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '30',
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


    $dataConsultaData = array(
            'name'  => 'consultaData[]',
            'id'    => 'consultaData',
            'type'  => 'date'
    );

    $dataConsultaDescricao = array(
            'name'       => 'consultaDescricao[]',
            'id'         => 'consultaDescricao',
            'maxlength'  => '200',
            'size'       => 85
    );

    $dataConsultaEdicaoData = array(
            'name'  => 'consultaEdicaoData[]',
            'id'    => 'consultaEdicaoData',
            'type'  => 'date'
    );

    $dataConsultaEdicaoDescricao = array(
            'name'       => 'consultaEdicaoDescricao[]',
            'id'         => 'consultaEdicaoDescricao',
            'maxlength'  => '200',
            'size'       => 85
    );

    $dataConsultaEdicaoId = array(
            'name'       => 'consultaEdicaoId[]',
            'id'         => 'consultaEdicaoId',
            'type'       => 'hidden'
    );

    $dataImplante = array(
            'name'          => 'implante',
            'id'            => 'implante',
            'size'          => '39',
            'maxlength'     => '100',
            'value'         => $andamento->Andamento_implante
    );
    $dataProtese = array(
            'name'          => 'protese',
            'id'            => 'protese',
            'size'          => '39',
            'maxlength'     => '100',
            'value'         => $andamento->Andamento_protese
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


    $dataProteses = array('0' => '');

    foreach ($proteses as $protese)
    {
      $dataProteses[$protese->Prot_Cod] = $protese->Prot_Nome;
    }

    $dataImplantes = array('0' => '');

    foreach ($implantes as $implante)
    {
      $dataImplantes[$implante->Impl_Cod] = $implante->Impl_Desc;
    }

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Atualizar',
            'id'            => 'btnCadastrarSolicitacao',
            'class'         => 'botao'
    );
  ?>
