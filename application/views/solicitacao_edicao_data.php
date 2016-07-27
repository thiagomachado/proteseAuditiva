<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    $data_form = array(
        'id' => 'formSolicitacao'
    );

    $dataIdSolicitacao = array(
            'name'          => 'idSolicitacao',
            'type'          => 'hidden',
            'id'            => 'idSolicitacao',
            'value'         => $solicitacao->Solic_id,
            'required'      => '',
            'size'          => '10',
            'maxlength'     => '11'
    );

    $dataQuantidadePrincipal = array(
            'name'          => 'quantidadePrincipal',
            'id'            => 'quantidadePrincipal',
            'type'          => 'number',
            'required'      => '',
            'size'          => '10',
            'value'         => $solicitacao->Proc_Quantidade,
            'maxlength'     => '11'
    );

    $dataQuantidade = array(
            'name'          => 'quantidade[]',
            'id'            => 'quantidade',
            'type'          => 'number',
            'required'      => '',
            'size'          => '10',
            'maxlength'     => '11'
    );

    $dataIdItem = array(
            'name'          => 'idItem[]',
            'type'          => 'hidden',
            'id'            => 'idItem',
            'required'      => '',
            'size'          => '10',
            'maxlength'     => '11'
    );


    $dataDiagnostico = array(
            'name'          => 'diagnostico',
            'id'            => 'diagnostico',
            'required'      => '',
            'size'          => '60',
            'value'         => $solicitacao->Solic_descricao,
            'maxlength'     => '150'
    );

    $dataCid10Principal = array(
            'name'          => 'cid10Principal',
            'id'            => 'cid10Principal',
            'size'          => '10',
            'value'         => $solicitacao->Solic_cid10principal,
            'maxlength'     => '30'
    );

    $dataCid10Sec = array(
            'name'          => 'cid10Sec',
            'id'            => 'cid10Sec',
            'size'          => '10',
            'value'         => $solicitacao->Solic_cid10sec,
            'maxlength'     => '30'
    );

    $dataCid10Causas = array(
            'name'          => 'cid10Causas',
            'id'            => 'cid10Causas',
            'size'          => '18',
            'value'         => $solicitacao->Solic_cid10causas,
            'maxlength'     => '30'
    );

    $dataObs = array(
            'name'          => 'obs',
            'id'            => 'obs',
            'rows'          => '5',
            'cols'          => '108',
            'value'         => $solicitacao->Solic_obs,
            'maxlength'     => '250'
    );

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
            'value'         => 'Editar',
            'id'            => 'btnCadastrarSolicitacao',
            'class'         => 'botao'
    );
  ?>
