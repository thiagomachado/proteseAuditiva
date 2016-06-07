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
            'maxlength'     => '45'
    );
    $dataQueixaPrincipal = array(
            'name'          => 'queixaPrincipal',
            'id'            => 'queixaPrincipal',
            'size'          => '109',
            'required'      => '',
            'maxlength'     => '250'
    );
    $dataHistoricoQueixa = array(
            'name'          => 'historicoQueixa',
            'id'            => 'historicoQueixa',
            'rows'          => '5',
            'cols'          => '108',
            'required'      => '',
            'maxlength'     => '1000'
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
            'maxlength'     => '250'
    );

    //Doenças
    $dataRubeola = array(
            'name'          => 'rubeola',
            'id'            => 'rubeola',
            'size'          => '30'
    );
    $dataToxoplasmose = array(
            'name'          => 'toxoplasmose',
            'id'            => 'toxoplasmose',
            'size'          => '30'
    );
    $dataSifilis = array(
            'name'          => 'sifilis',
            'id'            => 'sifilis',
            'size'          => '30'
    );
    $dataCitomegalovirose = array(
            'name'          => 'citomegalovirose',
            'id'            => 'citomegalovirose',
            'size'          => '30'
    );
    $dataHerpes = array(
            'name'          => 'herpes',
            'id'            => 'herpes',
            'size'          => '30'
    );
    $dataDrogas = array(
            'name'          => 'drogas',
            'id'            => 'drogas',
            'size'          => '30'
    );
    $dataAlcool = array(
            'name'          => 'alcool',
            'id'            => 'alcool',
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
            'size'          => '30'
    );

    $dataMeningite = array(
            'name'          => 'meningite',
            'id'            => 'meningite',
            'size'          => '30'
    );

    $dataEncefalite = array(
            'name'          => 'encefalite',
            'id'            => 'encefalite',
            'size'          => '30'
    );

    $dataTraumaAcustico = array(
            'name'          => 'traumaAcustico',
            'id'            => 'traumaAcustico',
            'size'          => '30'
    );

    $dataSarampo = array(
            'name'          => 'sarampo',
            'id'            => 'sarampo',
            'size'          => '30'
    );

    $dataOutrasDoencas = array(
            'name'          => 'outrasDoencas',
            'id'            => 'outrasDoencas',
            'size'          => '25',
            'maxlength'     => '175'
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
            'size'          => '30'
    );
    $dataHistoricoOtiteOE = array(
            'name'          => 'historicoOtiteOE',
            'id'            => 'historicoOtiteOE',
            'size'          => '30'
    );

    $dataHistoricoOtitePeriodo = array(
            'name'          => 'historicoOtitePeriodo',
            'id'            => 'historicoOtitePeriodo',
            'size'          => '12',
            'maxlength'     => '45'
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
            'maxlength'     => '25'
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
            'maxlength'     => '75'
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
            'maxlength'     => '45'
    );

    $dataIdadeConfirmacao = array(
            'name'          => 'idadeConfirmacao',
            'id'            => 'idadeConfirmacao',
            'size'          => '25',
            'maxlength'     => '3'
    );

    $dataComoConfirmou = array(
            'name'          => 'comoConfirmou',
            'id'            => 'comoConfirmou',
            'size'          => '46',
            'maxlength'     => '45'
    );

    $dataIdadeIntervencao = array(
            'name'          => 'idadeIntervencao',
            'id'            => 'idadeIntervencao',
            'size'          => '25',
            'maxlength'     => '3'
    );

    $dataQualIntervencao = array(
            'name'          => 'qualIntervencao',
            'id'            => 'qualIntervencao',
            'size'          => '46',
            'maxlength'     => '45'
    );

    $dataReageTrovao = array(
            'name'          => 'reageTrovao',
            'id'            => 'reageTrovao',
            'size'          => '30'
    );

    $dataReageAviao = array(
            'name'          => 'reageAviao',
            'id'            => 'reageAviao',
            'size'          => '30'
    );

    $dataReagePorta = array(
            'name'          => 'reagePorta',
            'id'            => 'reagePorta',
            'size'          => '30'
    );

    $dataReageBuzina = array(
            'name'          => 'reageBuzina',
            'id'            => 'reageBuzina',
            'size'          => '30'
    );

    $dataReageCachorro = array(
            'name'          => 'reageCachorro',
            'id'            => 'reageCachorro',
            'size'          => '30'
    );

    $dataReageVoz = array(
            'name'          => 'reageVoz',
            'id'            => 'reageVoz',
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
            'maxlength'     => '45'
    );

    $dataComunicacaoPredominante = array(
            'name'          => 'comunicacaoPredominante',
            'id'            => 'comunicacaoPredominante',
            'size'          => '85',
            'maxlength'     => '45'
    );

    $dataDesenvolvimentoMotor = array(
            'name'          => 'desenvolvimentoMotor',
            'id'            => 'desenvolvimentoMotor',
            'size'          => '85',
            'maxlength'     => '45'
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
            'id'            => 'editarAnamneseInfantil',
            'class'         => 'botao submit'
    );

?>
