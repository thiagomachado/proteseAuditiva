<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $data_form = array('id' => 'formAnamneseInfantil');

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
    $dataEncaminhado = array(
            'name'          => 'encaminhado',
            'id'            => 'encaminhado',
            'size'          => '45',
            'required'      => '',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_EncaminhaPor
    );
    $dataQueixaPrincipal = array(
            'name'          => 'queixaPrincipal',
            'id'            => 'queixaPrincipal',
            'size'          => '109',
            'required'      => '',
            'maxlength'     => '250',
            'value'         => $anamnese->AnmInf_PrincQueixa
    );
    $dataHistoricoQueixa = array(
            'name'          => 'historicoQueixa',
            'id'            => 'historicoQueixa',
            'rows'          => '5',
            'cols'          => '108',
            'required'      => '',
            'maxlength'     => '1000',
            'value'         => $anamnese->AnmInf_HistQueixa
    );

    $dataAlteracoesGravidezS = array(
            'type'          => 'radio',
            'name'          => 'alteracoesGravidez',
            'id'            => 'alteracoesGravidezS',
            'size'          => '30',
            'required'      => '',
            'value'         => '1'

    );

    $dataAlteracoesGravidezN = array(
            'type'          => 'radio',
            'name'          => 'alteracoesGravidez',
            'id'            => 'alteracoesGravidezN',
            'size'          => '30',
            'value'         => '0'
    );

    $dataDescricaoAlteracao = array(
            'name'          => 'descricaoAlteracao',
            'id'            => 'descricaoAlteracao',
            'size'          => '20',
            'required'      => '',
            'maxlength'     => '250',
            'value'         => $anamnese->AnmInf_DescAlteracao
    );

    //Doenças
    $dataRubeola = array(
            'name'          => 'rubeola',
            'id'            => 'rubeola',
            'checked'       => $anamnese->AnmInf_Rubeola,
            'size'          => '30'
    );
    $dataToxoplasmose = array(
            'name'          => 'toxoplasmose',
            'id'            => 'toxoplasmose',
            'checked'       => $anamnese->AnmInf_Toxoplasmose,
            'size'          => '30'
    );
    $dataSifilis = array(
            'name'          => 'sifilis',
            'id'            => 'sifilis',
            'checked'       => $anamnese->AnmInf_Sifilis,
            'size'          => '30'
    );
    $dataCitomegalovirose = array(
            'name'          => 'citomegalovirose',
            'id'            => 'citomegalovirose',
            'checked'       => $anamnese->AnmInf_Citomegalovirose,
            'size'          => '30'
    );
    $dataHerpes = array(
            'name'          => 'herpes',
            'id'            => 'herpes',
            'checked'       => $anamnese->AnmInf_Herpes,
            'size'          => '30'
    );
    $dataDrogas = array(
            'name'          => 'drogas',
            'id'            => 'drogas',
            'checked'       => $anamnese->AnmInf_Drogas,
            'size'          => '30'
    );
    $dataAlcool = array(
            'name'          => 'alcool',
            'id'            => 'alcool',
            'checked'       => $anamnese->AnmInf_Alcool,
            'size'          => '30'
    );

    $dataTipoParto = array(
            'normal'              => 'Normal',
            'forceps'             => 'Fórceps ou vácuo',
            'cesarea'             => 'Cesáreo',
            'natural'             => 'Natural',
            'humanizado'          => 'Humanizado'
    );

    $dataCaxumba = array(
            'name'          => 'caxumba',
            'id'            => 'caxumba',
            'checked'       => $anamnese->AnmInf_Caxumba,
            'size'          => '30'
    );

    $dataMeningite = array(
            'name'          => 'meningite',
            'id'            => 'meningite',
            'checked'       => $anamnese->AnmInf_Meningite,
            'size'          => '30'
    );

    $dataEncefalite = array(
            'name'          => 'encefalite',
            'id'            => 'encefalite',
            'checked'       => $anamnese->AnmInf_Encefalite,
            'size'          => '30'
    );

    $dataTraumaAcustico = array(
            'name'          => 'traumaAcustico',
            'id'            => 'traumaAcustico',
            'checked'       => $anamnese->AnmInf_TraumaAcustico,
            'size'          => '30'
    );

    $dataSarampo = array(
            'name'          => 'sarampo',
            'id'            => 'sarampo',
            'checked'       => $anamnese->AnmInf_Sarampo,
            'size'          => '30'
    );

    $dataOutrasDoencas = array(
            'name'          => 'outrasDoencas',
            'id'            => 'outrasDoencas',
            'size'          => '25',
            'maxlength'     => '175',
            'value'         => $anamnese->AnmInf_Doenca
    );


    $dataHistoricoOtiteS = array(
            'type'          => 'radio',
            'name'          => 'historicoOtite',
            'id'            => 'historicoOtiteS',
            'size'          => '30',
            'required'      => '',
            'value'         => '1'
    );

    $dataHistoricoOtiteN = array(
            'type'          => 'radio',
            'name'          => 'historicoOtite',
            'id'            => 'historicoOtiteN',
            'size'          => '30',
            'value'         => '1'
    );

    $dataHistoricoOtiteOD = array(
            'name'          => 'historicoOtiteOD',
            'id'            => 'historicoOtiteOD',
            'checked'       =>  $anamnese->AnmInf_OtiteOD,
            'size'          => '30'
    );
    $dataHistoricoOtiteOE = array(
            'name'          => 'historicoOtiteOE',
            'id'            => 'historicoOtiteOE',
            'checked'       =>  $anamnese->AnmInf_OtiteOE,
            'size'          => '30'
    );

    $dataHistoricoOtitePeriodo = array(
            'name'          => 'historicoOtitePeriodo',
            'id'            => 'historicoOtitePeriodo',
            'size'          => '12',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_Periodicidade
    );

    $dataPerdaAuditivaNaFamiliaS = array(
            'type'          => 'radio',
            'name'          => 'perdaAuditivaNaFamilia',
            'id'            => 'perdaAuditivaNaFamiliaS',
            'size'          => '30',
            'required'      => '',
            'value'         => '1'

    );

    $dataPerdaAuditivaNaFamiliaN = array(
            'type'          => 'radio',
            'name'          => 'perdaAuditivaNaFamilia',
            'id'            => 'perdaAuditivaNaFamiliaN',
            'size'          => '30',
            'value'         => '0'

    );

    $dataPerdaAuditivaParentesco = array(
            'name'          => 'perdaAuditivaParentesco',
            'id'            => 'perdaAuditivaParentesco',
            'size'          => '10',
            'maxlength'     => '25',
            'value'         => $anamnese->AnmInf_Familiar
    );

    $dataUsoMedicacaoS = array(
            'type'          => 'radio',
            'name'          => 'usoMedicacao',
            'id'            => 'usoMedicacaoS',
            'size'          => '30',
            'required'      => '',
            'value'         => '1'

    );

    $dataUsoMedicacaoN = array(
            'type'          => 'radio',
            'name'          => 'usoMedicacao',
            'id'            => 'usoMedicacaoN',
            'size'          => '30',
            'value'         => '0'

    );

    $dataMedicacao = array(
            'name'          => 'medicacao',
            'id'            => 'medicacao',
            'size'          => '25',
            'maxlength'     => '75',
            'value'         => $anamnese->AnmInf_Medicacao
    );

    $dataPaisConsaguinidadeS = array(
            'type'          => 'radio',
            'name'          => 'consaguinidade',
            'id'            => 'consaguinidadeS',
            'size'          => '30',
            'required'      => '',
            'value'         => '1'

    );

    $dataPaisConsaguinidadeN = array(
            'type'          => 'radio',
            'name'          => 'consaguinidade',
            'id'            => 'consaguinidadeN',
            'size'          => '30',
            'value'         => '0'

    );

    $dataTempoDificuldadeAuditiva = array(
            'name'          => 'tempoDificuldadeAuditiva',
            'id'            => 'tempoDificuldadeAuditiva',
            'required'      => '',
            'size'          => '60',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_TempoDifculAud
    );

    $dataIdadeConfirmacao = array(
            'name'          => 'idadeConfirmacao',
            'id'            => 'idadeConfirmacao',
            'size'          => '25',
            'maxlength'     => '3',
            'value'         => $anamnese->AnmInf_IdadeConf
    );

    $dataComoConfirmou = array(
            'name'          => 'comoConfirmou',
            'id'            => 'comoConfirmou',
            'size'          => '46',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_ComoConf
    );

    $dataIdadeIntervencao = array(
            'name'          => 'idadeIntervencao',
            'id'            => 'idadeIntervencao',
            'size'          => '25',
            'maxlength'     => '3',
            'value'         => $anamnese->AnmInf_IdadeInterv
    );

    $dataQualIntervencao = array(
            'name'          => 'qualIntervencao',
            'id'            => 'qualIntervencao',
            'size'          => '46',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_QualInterv
    );

    $dataReageTrovao = array(
            'name'          => 'reageTrovao',
            'id'            => 'reageTrovao',
            'checked'       => $anamnese->AnmInf_ReageTrovao,
            'size'          => '30'
    );

    $dataReageAviao = array(
            'name'          => 'reageAviao',
            'id'            => 'reageAviao',
            'checked'       => $anamnese->AnmInf_ReageAviao,
            'size'          => '30'
    );

    $dataReagePorta = array(
            'name'          => 'reagePorta',
            'id'            => 'reagePorta',
            'checked'       => $anamnese->AnmInf_ReagePorta,
            'size'          => '30'
    );

    $dataReageBuzina = array(
            'name'          => 'reageBuzina',
            'id'            => 'reageBuzina',
            'checked'       => $anamnese->AnmInf_ReageBuzina,
            'size'          => '30'
    );

    $dataReageCachorro = array(
            'name'          => 'reageCachorro',
            'id'            => 'reageCachorro',
            'checked'       => $anamnese->AnmInf_ReageCachorro,
            'size'          => '30'
    );

    $dataReageVoz = array(
            'name'          => 'reageVoz',
            'id'            => 'reageVoz',
            'checked'       => $anamnese->AnmInf_ReageVoz,
            'size'          => '30'
    );

    $dataReacaoVoz = array(
            'normal'            => 'Intensidade normal',
            'media'             => 'Intensidade média',
            'alta'              => 'Intensidade alta',
            'incosistente'      => 'Reações Inconsistentes',
            'naoReage'          => 'Não reage'
    );

    $dataComoReage = array(
            'chora'            => 'Chora',
            'sorri'            => 'Sorri',
            'cessaAtividade'   => 'Cessa Atividade',
            'fonteSonora'      => 'Procura fonte sonora',
            'vocaliza'         => 'Vocaliza'
    );

    $dataDesenvolvimentoLinguagem = array(
            'name'          => 'desenvolvimentoLinguagem',
            'id'            => 'desenvolvimentoLinguagem',
            'size'          => '85',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_DesenvolvLing
    );

    $dataComunicacaoPredominante = array(
            'name'          => 'comunicacaoPredominante',
            'id'            => 'comunicacaoPredominante',
            'size'          => '85',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_ComunicProdom
    );

    $dataDesenvolvimentoMotor = array(
            'name'          => 'desenvolvimentoMotor',
            'id'            => 'desenvolvimentoMotor',
            'size'          => '85',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmInf_DesenvolvMotor
    );

    $dataObs = array(
            'name'          => 'obs',
            'id'            => 'obs',
            'rows'          => '5',
            'cols'          => '108',
            'maxlength'     => '250',
            'value'         => $anamnese->AnmInf_Obs
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Editar',
            'id'            => 'editarAnamneseInfantil',
            'class'         => 'botao submit'
    );

    //Logica de seleção dos campos radio e checkbox

        //Campo Alterações na gestação
        if($anamnese->AnmInf_GestAlteracao == 0)
        {
          $dataAlteracoesGravidezN['checked'] = '';
        }
        if($anamnese->AnmInf_GestAlteracao == 1)
        {
          $dataAlteracoesGravidezS['checked'] = '';
        }

        //Historico de Otite
        if($anamnese->AnmInf_HistOtite == 0)
        {
          $dataHistoricoOtiteN['checked'] = '';
        }
        if($anamnese->AnmInf_HistOtite == 1)
        {
          $dataHistoricoOtiteS['checked'] = '';
        }

        //Perda Auditiva na familia
        if($anamnese->AnmInf_PerdaAudNaFamilia == 1)
        {
          $dataPerdaAuditivaNaFamiliaS['checked'] = '';
        }
        if($anamnese->AnmInf_PerdaAudNaFamilia == 0)
        {
          $dataPerdaAuditivaNaFamiliaN['checked'] = '';
        }

        //Uso de medicacao

        if($anamnese->AnmInf_UsoMedicacao == 1)
        {
          $dataUsoMedicacaoS['checked'] = '';
        }
        if($anamnese->AnmInf_UsoMedicacao == 0)
        {
          $dataUsoMedicacaoN['checked'] = '';
        }

        //Pais com consaguinidade

        if($anamnese->AnmInf_PaisConsag == 1)
        {
          $dataPaisConsaguinidadeS['checked'] = '';
        }
        if($anamnese->AnmInf_PaisConsag == 0)
        {
          $dataPaisConsaguinidadeN['checked'] = '';
        }

?>
