<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $data_form = array('id' => 'formCaracterizacaoPaciente');

    $dataCPFHidden = array(
            'name'          => 'cpfHidden',
            'type'          => 'hidden',
            'id'            => 'cpfHidden',
            'value'         => $paciente->Pc_CPF
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

    $dataOD_VA_250 = array(
            'name'          => 'oD_VA_250',
            'id'            => 'oD_VA_250',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOD_VA_500 = array(
            'name'          => 'oD_VA_500',
            'id'            => 'oD_VA_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOD_VA_1k = array(
            'name'          => 'oD_VA_1k',
            'id'            => 'oD_VA_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VA_2k = array(
            'name'          => 'oD_VA_2k',
            'id'            => 'oD_VA_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VA_3k = array(
            'name'          => 'oD_VA_3k',
            'id'            => 'oD_VA_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VA_4k = array(
            'name'          => 'oD_VA_4k',
            'id'            => 'oD_VA_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VA_6k = array(
            'name'          => 'oD_VA_6k',
            'id'            => 'oD_VA_6k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VA_8k = array(
            'name'          => 'oD_VA_8k',
            'id'            => 'oD_VA_8k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOD_VO_500 = array(
            'name'          => 'oD_VO_500',
            'id'            => 'oD_VO_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOD_VO_1k = array(
            'name'          => 'oD_VO_1k',
            'id'            => 'oD_VO_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VO_2k = array(
            'name'          => 'oD_VO_2k',
            'id'            => 'oD_VO_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VO_3k = array(
            'name'          => 'oD_VO_3k',
            'id'            => 'oD_VO_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOD_VO_4k = array(
            'name'          => 'oD_VO_4k',
            'id'            => 'oD_VO_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOE_VA_250 = array(
            'name'          => 'oE_VA_250',
            'id'            => 'oE_VA_250',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOE_VA_500 = array(
            'name'          => 'oE_VA_500',
            'id'            => 'oE_VA_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOE_VA_1k = array(
            'name'          => 'oE_VA_1k',
            'id'            => 'oE_VA_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VA_2k = array(
            'name'          => 'oE_VA_2k',
            'id'            => 'oE_VA_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VA_3k = array(
            'name'          => 'oE_VA_3k',
            'id'            => 'oE_VA_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VA_4k = array(
            'name'          => 'oE_VA_4k',
            'id'            => 'oE_VA_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VA_6k = array(
            'name'          => 'oE_VA_6k',
            'id'            => 'oE_VA_6k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VA_8k = array(
            'name'          => 'oE_VA_8k',
            'id'            => 'oE_VA_8k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOE_VO_500 = array(
            'name'          => 'oE_VO_500',
            'id'            => 'oE_VO_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataOE_VO_1k = array(
            'name'          => 'oE_VO_1k',
            'id'            => 'oE_VO_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VO_2k = array(
            'name'          => 'oE_VO_2k',
            'id'            => 'oE_VO_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VO_3k = array(
            'name'          => 'oE_VO_3k',
            'id'            => 'oE_VO_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );
    $dataOE_VO_4k = array(
            'name'          => 'oE_VO_4k',
            'id'            => 'oE_VO_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '20'
    );

    $dataTipoPerdaAuditiva = array(
            'name'          => 'tipoPerdaAuditiva',
            'id'            => 'tipoPerdaAuditiva',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataDuracao = array(
            'name'          => 'duracao',
            'id'            => 'duracao',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataZumbido = array(
            'name'          => 'zumbido',
            'id'            => 'zumbido',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataGrauPerda = array(
            'name'          => 'grauPerda',
            'id'            => 'grauPerda',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataProgressao = array(
            'name'          => 'progressao',
            'id'            => 'progressao',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataConfiguracao = array(
            'name'          => 'configuracao',
            'id'            => 'tipoPerdaAuditiva',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataRecrutamento = array(
            'name'          => 'recrutamento',
            'id'            => 'recrutamento',
            'size'          => '22',
            'maxlength'     => '25'
    );

    $dataExamesComplementares = array(
            'name'          => 'examesComplementares',
            'id'            => 'examesComplementares',
            'rows'          => '5',
            'cols'          => '108',
            'maxlength'     => '250'
    );

    $dataOpcoesDropdown = array(
            'sim'            => 'Sim',
            'nao'            => 'Não',
            'jaPossui'       => 'Já Possui'
    );

    $dataHistoricoPerda = array(
            'name'          => 'historicoPerda',
            'id'            => 'historicoPerda',
            'rows'          => '7',
            'cols'          => '108',
            'required'      => '',
            'maxlength'     => '1000'
    );

    $dataModeloAASI = array(
            'name'          => 'modeloAASI',
            'id'            => 'modeloAASI',
            'size'          => '35',
            'maxlength'     => '45'
    );

    $dataOrelhaAASI = array(
            'name'          => 'orelhaAASI',
            'id'            => 'orelhaAASI',
            'size'          => '35',
            'maxlength'     => '45'
    );

    $dataSem_AASI_250 = array(
            'name'          => 'sem_AASI_250',
            'id'            => 'sem_AASI_250',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataSem_AASI_500 = array(
            'name'          => 'sem_AASI_500',
            'id'            => 'sem_AASI_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataSem_AASI_1k = array(
            'name'          => 'sem_AASI_1k',
            'id'            => 'sem_AASI_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataSem_AASI_2k = array(
            'name'          => 'sem_AASI_2k',
            'id'            => 'sem_AASI_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataSem_AASI_3k = array(
            'name'          => 'sem_AASI_3k',
            'id'            => 'sem_AASI_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataSem_AASI_4k = array(
            'name'          => 'sem_AASI_4k',
            'id'            => 'sem_AASI_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataSem_AASI_6k = array(
            'name'          => 'sem_AASI_6k',
            'id'            => 'sem_AASI_6k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataSem_AASI_8k = array(
            'name'          => 'sem_AASI_8k',
            'id'            => 'sem_AASI_8k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataSem_AASI_PercepcaoFala = array(
            'name'          => 'sem_AASSI_percepcaoFala',
            'id'            => 'sem_AASSI_percepcaoFala',
            'size'          => '10',
            'maxlength'     => '25'
    );


    $dataOD_AASI_250 = array(
            'name'          => 'oD_AASI_250',
            'id'            => 'oD_AASI_250',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataOD_AASI_500 = array(
            'name'          => 'oD_AASI_500',
            'id'            => 'oD_AASI_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataOD_AASI_1k = array(
            'name'          => 'oD_AASI_1k',
            'id'            => 'oD_AASI_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOD_AASI_2k = array(
            'name'          => 'oD_AASI_2k',
            'id'            => 'oD_AASI_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOD_AASI_3k = array(
            'name'          => 'oD_AASI_3k',
            'id'            => 'oD_AASI_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOD_AASI_4k = array(
            'name'          => 'oD_AASI_4k',
            'id'            => 'oD_AASI_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOD_AASI_6k = array(
            'name'          => 'oD_AASI_6k',
            'id'            => 'oD_AASI_6k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOD_AASI_8k = array(
            'name'          => 'oD_AASI_8k',
            'id'            => 'oD_AASI_8k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataOD_AASI_PercepcaoFala = array(
            'name'          => 'oD_AASSI_percepcaoFala',
            'id'            => 'oD_AASSI_percepcaoFala',
            'size'          => '10',
            'maxlength'     => '25'
    );


    $dataOE_AASI_250 = array(
            'name'          => 'oE_AASI_250',
            'id'            => 'oE_AASI_250',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataOE_AASI_500 = array(
            'name'          => 'oE_AASI_500',
            'id'            => 'oE_AASI_500',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataOE_AASI_1k = array(
            'name'          => 'oE_AASI_1k',
            'id'            => 'oE_AASI_1k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOE_AASI_2k = array(
            'name'          => 'oE_AASI_2k',
            'id'            => 'oE_AASI_2k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOE_AASI_3k = array(
            'name'          => 'oE_AASI_3k',
            'id'            => 'oE_AASI_3k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOE_AASI_4k = array(
            'name'          => 'oE_AASI_4k',
            'id'            => 'oE_AASI_4k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOE_AASI_6k = array(
            'name'          => 'oE_AASI_6k',
            'id'            => 'oE_AASI_6k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );
    $dataOE_AASI_8k = array(
            'name'          => 'oE_AASI_8k',
            'id'            => 'oE_AASI_8k',
            'type'          => 'number',
            'size'          => '8',
            'maxlength'     => '11'
    );

    $dataOE_AASI_PercepcaoFala = array(
            'name'          => 'oE_AASSI_percepcaoFala',
            'id'            => 'oE_AASSI_percepcaoFala',
            'size'          => '10',
            'maxlength'     => '25'
    );



    $dataObs = array(
            'name'          => 'obs',
            'id'            => 'obs',
            'rows'          => '5',
            'cols'          => '108',
            'maxlength'     => '250'
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Cadastrar',
            'id'            => 'cadastrarCaracterizacaoPaciente',
            'class'         => 'botao submit'
    );

    foreach ($profissionais as $profissional)
    {
      $dataProfissional[$profissional->Us_CPF] = $profissional->Us_Nome;
    }
?>
