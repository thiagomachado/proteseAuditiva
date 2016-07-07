<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formSolicitacao'
    );


    $dataNomePaciente = array(
            'name'          => 'nomePaciente',
            'id'            => 'nomePaciente',
            'size'          => '62',
            'readonly'      => '',
            'maxlength'     => '100',
            'value'         => $paciente->Pc_Nome
    );

    $dataCPF = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'size'          => '15',
            'readonly'      => '',
            'pattern'       => '\d{11}',
            'maxlength'     => '11',
            'title'         => 'Digite apenas números no CPF',
            'value'         => $paciente->Pc_CPF
    );

    $dataProntuario = array(
            'name'          => 'nProntuario',
            'id'            => 'nProntuario',
            'size'          => '8',
            'readonly'      => '',
            'maxlength'     => '20',
            'value'         => $paciente->Pc_NumProntuario
    );

    $dataDataNascimento = array(
            'type'          => 'date',
            'name'          => 'dataNascimento',
            'id'            => 'dataNascimento',
            'readonly'      => '',
            'value'         => $paciente->Pc_DtNascimento
    );

    $dataQuantidade = array(
            'name'          => 'quantidade[]',
            'id'            => 'quantidade',
            'required'      => '',
            'size'          => '10',
            'maxlength'     => '11'
    );

    $dataQuantidadePrincipal = array(
            'name'          => 'quantidadePrincipal',
            'id'            => 'quantidadePrincipal',
            'required'      => '',
            'size'          => '10',
            'maxlength'     => '11'
    );

    $dataDiagnostico = array(
            'name'          => 'diagnostico',
            'id'            => 'diagnostico',
            'required'      => '',
            'size'          => '60',
            'maxlength'     => '150'
    );

    $dataCid10Principal = array(
            'name'          => 'cid10Principal',
            'id'            => 'cid10Principal',
            'size'          => '10',
            'maxlength'     => '30'
    );

    $dataCid10Sec = array(
            'name'          => 'cid10Sec',
            'id'            => 'cid10Sec',
            'size'          => '10',
            'maxlength'     => '30'
    );

    $dataCid10Causas = array(
            'name'          => 'cid10Causas',
            'id'            => 'cid10Causas',
            'size'          => '20',
            'maxlength'     => '30'
    );

    $dataObs = array(
            'name'          => 'obs',
            'id'            => 'obs',
            'rows'          => '5',
            'cols'          => '108',
            'maxlength'     => '250'
    );

    $dataProcedimentos = array();

    foreach ($procSecundarios as $procedimento)
    {
      $dataProcSecundarios[$procedimento->Proc_Id] = $procedimento->Proc_Codigo .' - '.$procedimento->Proc_Nome ;
    }
    foreach ($procPincipais as $procedimento)
    {
      $dataProcPrincipais[$procedimento->Proc_Id] = $procedimento->Proc_Codigo .' - '.$procedimento->Proc_Nome ;
    }

    foreach ($profissionais as $profissional)
    {
      $dataProfissional[$profissional->Us_CPF] = $profissional->Us_Nome;
    }

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Solicitar',
            'id'            => 'btnCadastrarSolicitacao',
            'class'         => 'botao'
    );
  ?>
