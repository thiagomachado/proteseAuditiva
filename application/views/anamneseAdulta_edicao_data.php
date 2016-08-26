<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $data_form = array('id' => 'formAnamneseAdulta');

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
            'maxlength'     => '45',
            'value'         => $anamnese->AnmAdt_EncaminhadoPor
    );
    $dataQueixaPrincipal = array(
            'name'          => 'queixaPrincipal',
            'id'            => 'queixaPrincipal',
            'size'          => '109',
            'maxlength'     => '250',
            'value'         => $anamnese->AnmAdt_PrincQueixa
    );
    $dataHistoricoQueixa = array(
            'name'          => 'historicoQueixa',
            'id'            => 'historicoQueixa',
            'rows'          => '5',
            'cols'          => '108',
            'maxlength'     => '1000',
            'value'         => $anamnese->AnmAdt_HistQueixa
    );
    $dataDorDeOuvidoS = array(
            'type'          => 'radio',
            'name'          => 'dorDeOuvido',
            'id'            => 'dorDeOuvidoS',
            'size'          => '30',
            'value'         => '1'
    );
    $dataDorDeOuvidoN = array(
            'type'          => 'radio',
            'name'          => 'dorDeOuvido',
            'id'            => 'dorDeOuvidoN',
            'size'          => '30',
            'value'         => '0'
    );

    $dataCirurgiaOtologicaS = array(
            'type'          => 'radio',
            'name'          => 'cirurgiaOtologica',
            'id'            => 'cirurgiaOtologicaS',
            'size'          => '30',
            'value'         => '1'
    );
    $dataCirurgiaOtologicaN = array(
            'type'          => 'radio',
            'name'          => 'cirurgiaOtologica',
            'id'            => 'cirurgiaOtologicaN',
            'size'          => '30',
            'value'         => '0'
    );

    $dataCirurgiaOtologicaOD = array(
            'name'          => 'cirurgiaOtologicaOD',
            'id'            => 'cirurgiaOtologicaOD',
            'checked'       => $anamnese->AnmAdt_CirurgiaOtolOD,
            'size'          => '30'
    );
    $dataCirurgiaOtologicaOE = array(

            'name'          => 'cirurgiaOtologicaOE',
            'id'            => 'cirurgiaOtologicaOE',
            'checked'       => $anamnese->AnmAdt_CirurgiaOtolOE,
            'size'          => '30'
    );

    $dataCirurgiaOtologicaDescricao = array(
            'name'          => 'cirurgiaOtologicaDescricao',
            'id'            => 'cirurgiaOtologicaDescricao',
            'size'          => '10',
            'maxlength'     => '250',
            'value'         => $anamnese->AnmAdt_CirurgiaDesc
    );


    $dataHistoricoOtiteS = array(
            'type'          => 'radio',
            'name'          => 'historicoOtite',
            'id'            => 'historicoOtiteS',
            'size'          => '30',
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
            'checked'       =>  $anamnese->AnmAdt_OtiteOD,
            'size'          => '30'
    );
    $dataHistoricoOtiteOE = array(
            'name'          => 'historicoOtiteOE',
            'id'            => 'historicoOtiteOE',
            'checked'       =>  $anamnese->AnmAdt_OtiteOE,
            'size'          => '30'
    );

    $dataHistoricoOtitePeriodo = array(
            'name'          => 'historicoOtitePeriodo',
            'id'            => 'historicoOtitePeriodo',
            'size'          => '10',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmAdt_Periodicidade
    );

    $dataPerdaAuditivaNaFamiliaS = array(
            'type'          => 'radio',
            'name'          => 'perdaAuditivaNaFamilia',
            'id'            => 'perdaAuditivaNaFamiliaS',
            'size'          => '30',
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
            'value'         => $anamnese->AnmAdt_FamiliarPerdaAud
    );

//Doenças
    $dataCaxumba = array(
            'name'          => 'caxumba',
            'id'            => 'caxumba',
            'checked'       => $anamnese->AnmAdt_Caxumba,
            'size'          => '30'
    );
    $dataMeningite = array(
            'name'          => 'meningite',
            'id'            => 'meningite',
            'checked'       => $anamnese->AnmAdt_Meningite,
            'size'          => '30'
    );
    $dataSifilis = array(
            'name'          => 'sifilis',
            'id'            => 'sifilis',
            'checked'       => $anamnese->AnmAdt_Sifilis,
            'size'          => '30'
    );
    $dataHipertensao = array(
            'name'          => 'hipertensao',
            'id'            => 'hipertensao',
            'checked'       => $anamnese->AnmAdt_Hipertensao,
            'size'          => '30'
    );
    $dataSarampo = array(
            'name'          => 'sarampo',
            'id'            => 'sarampo',
            'checked'       => $anamnese->AnmAdt_Sarampo,
            'size'          => '30'
    );
    $dataCirculatorios = array(
            'name'          => 'circulatorios',
            'id'            => 'circulatorios',
            'checked'       => $anamnese->AnmAdt_Circulatorios,
            'size'          => '30'
    );
    $dataDiabetes = array(
            'name'          => 'diabetes',
            'id'            => 'diabetes',
            'checked'       => $anamnese->AnmAdt_Diabetes,
            'size'          => '30'
    );

    $dataOutrasDoencas = array(
            'name'          => 'outrasDoencas',
            'id'            => 'outrasDoencas',
            'size'          => '60',
            'maxlength'     => '175',
            'value'         => $anamnese->AnmAdt_Doenca
    );


    $dataUsoMedicacaoS = array(
            'type'          => 'radio',
            'name'          => 'usoMedicacao',
            'id'            => 'usoMedicacaoS',
            'size'          => '30',
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
            'size'          => '55',
            'maxlength'     => '75',
            'value'         => $anamnese->AnmAdt_Medicacao
    );

    $dataRuidoOcupacionalS = array(
            'type'          => 'radio',
            'name'          => 'ruidoOcupacional',
            'id'            => 'ruidoOcupacionalS',
            'size'          => '30',
            'value'         => '1'

    );

    $dataRuidoOcupacionalN = array(
            'type'          => 'radio',
            'name'          => 'ruidoOcupacional',
            'id'            => 'ruidoOcupacionalN',
            'size'          => '30',
            'value'         => '0'

    );

    $dataRuidoOcupacionalDesc = array(
            'name'          => 'ruidoOcupacionalDesc',
            'id'            => 'ruidoOcupacionalDesc',
            'size'          => '40',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmAdt_RuidosOcup
    );

    $dataRuidoOcupacionalTempo = array(
            'name'          => 'ruidoOcupacionalTempo',
            'id'            => 'ruidoOcupacionalTempo',
            'size'          => '14',
            'maxlength'     => '15',
            'value'         => $anamnese->AnmAdt_TempoRuidosOcup
    );

    $dataTempoPerdaAudicao = array(
            'name'          => 'tempoPerdaAudicao',
            'id'            => 'tempoPerdaAudicao',
            'size'          => '70',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmAdt_TempoDificulAud
    );


    $dataCompreendeFalaNaoEntende = array(
            'type'          => 'radio',
            'name'          => 'compreendeFala',
            'id'            => 'compreendeFalaNaoEntende',
            'size'          => '30',
            'value'         => '0'

    );

    $dataCompreendeFalaDificuldadeOuvir = array(
            'type'          => 'radio',
            'name'          => 'compreendeFala',
            'id'            => 'compreendeFalaDificuldadeOuvir',
            'size'          => '30',
            'value'         => '1'

    );

    $dataCompreendeFalaPorPistasVisuais = array(
            'type'          => 'radio',
            'name'          => 'compreendeFala',
            'id'            => 'compreendeFalaPorPistasVisuais',
            'size'          => '30',
            'value'         => '2'

    );
    $dataCompreendeFalaEntendeTudo = array(
            'type'          => 'radio',
            'name'          => 'compreendeFala',
            'id'            => 'compreendeFalaEntendeTudo',
            'size'          => '30',
            'value'         => '3'

    );

    $dataZumbidoS = array(
            'type'          => 'radio',
            'name'          => 'zumbido',
            'id'            => 'zumbidoS',
            'size'          => '30',
            'value'         => '1'

    );

    $dataZumbidoN = array(
            'type'          => 'radio',
            'name'          => 'zumbido',
            'id'            => 'zumbidoN',
            'size'          => '30',
            'value'         => '0'
    );

    $dataZumbidoTipoIntermitente = array(
            'type'          => 'radio',
            'name'          => 'zumbidoTipo',
            'id'            => 'zumbidoTipoIntermitente',
            'size'          => '30',
            'value'         => 'intermitente'

    );

    $dataZumbidoTipoContinuo = array(
            'type'          => 'radio',
            'name'          => 'zumbidoTipo',
            'id'            => 'zumbidoTipoContinuo',
            'size'          => '30',
            'value'         => 'continuo'

    );

    $dataZumbidoOD = array(
            'name'          => 'zumbidoOD',
            'id'            => 'zumbidoOD',
            'checked'       =>  $anamnese->AnmAdt_ZumbOD,
            'size'          => '30'
    );
    $dataZumbidoOE = array(
            'name'          => 'zumbidoOE',
            'id'            => 'zumbidoOE',
            'checked'       =>  $anamnese->AnmAdt_ZumbOE,
            'size'          => '30'
    );

    $dataTempoZumbido = array(
            'name'          => 'tempoZumbido',
            'id'            => 'tempoZumbido',
            'size'          => '40',
            'maxlength'     => '25',
            'value'         => $anamnese->AnmAdt_ZumbTempo
    );

    $dataVertigemS = array(
            'type'          => 'radio',
            'name'          => 'vertigem',
            'id'            => 'vertigemS',
            'size'          => '30',
            'value'         => '1'

    );

    $dataVertigemN = array(
            'type'          => 'radio',
            'name'          => 'vertigem',
            'id'            => 'vertigemN',
            'size'          => '30',
            'value'         => '0'

    );

    $dataTempoVertigem = array(
            'name'          => 'tempoVertigem',
            'id'            => 'tempoVertigem',
            'size'          => '40',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmAdt_TempoVertigem
    );

    $dataIncomodoS = array(
            'type'          => 'radio',
            'name'          => 'incomodo',
            'id'            => 'incomodoS',
            'size'          => '30',
            'value'         => '1'

    );

    $dataIncomodoN = array(
            'type'          => 'radio',
            'name'          => 'incomodo',
            'id'            => 'incomodoN',
            'size'          => '30',
            'value'         => '0'

    );

    $dataDescIncomodo = array(
            'name'          => 'descIncomodo',
            'id'            => 'descIncomodo',
            'size'          => '40',
            'maxlength'     => '45',
            'value'         => $anamnese->AnmAdt_SonsIntensos
    );

    $dataObs = array(
            'name'          => 'obs',
            'id'            => 'obs',
            'rows'          => '5',
            'cols'          => '108',
            'maxlength'     => '250',
            'value'         => $anamnese->AnmAdt_Obs
    );

    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Editar',
            'id'            => 'editarAnamneseAdulta',
            'class'         => 'botao submit'
    );

//Logica de seleção dos campos radio e checkbox

    //Campo dor de ouvido
    if($anamnese->AnmAdt_DorOuvido == 0)
    {
      $dataDorDeOuvidoN['checked'] = '';
    }
    if($anamnese->AnmAdt_DorOuvido == 1)
    {
      $dataDorDeOuvidoS['checked'] = '';
    }

    //Campo Cirurgia Otologica
    if($anamnese->AnmAdt_CirurgiaOtologica == 0)
    {
      $dataCirurgiaOtologicaN['checked'] = '';
    }
    if($anamnese->AnmAdt_CirurgiaOtologica == 1)
    {
      $dataCirurgiaOtologicaS['checked'] = '';
    }

    //Historico de Otite
    if($anamnese->AnmAdt_HistOtite == 0)
    {
      $dataHistoricoOtiteN['checked'] = '';
    }
    if($anamnese->AnmAdt_HistOtite == 1)
    {
      $dataHistoricoOtiteS['checked'] = '';
    }

    //Perda Auditiva na familia
    if($anamnese->AnmAdt_PerdaAudNaFamilia == 1)
    {
      $dataPerdaAuditivaNaFamiliaS['checked'] = '';
    }
    if($anamnese->AnmAdt_PerdaAudNaFamilia == 0)
    {
      $dataPerdaAuditivaNaFamiliaN['checked'] = '';
    }

    //Uso de medicacao

    if($anamnese->AnmAdt_UsoMedicacao == 1)
    {
      $dataUsoMedicacaoS['checked'] = '';
    }
    if($anamnese->AnmAdt_UsoMedicacao == 0)
    {
      $dataUsoMedicacaoN['checked'] = '';
    }

    //Ruido Ocupacional

    if($anamnese->AnmAdt_SeRuidosOcup == 1)
    {
      $dataRuidoOcupacionalS['checked'] = '';
    }
    if($anamnese->AnmAdt_SeRuidosOcup == 0)
    {
      $dataRuidoOcupacionalN['checked'] = '';
    }

    //Compreensão da fala

    if($anamnese->AnmAdt_CompreenderFala == 0)
    {
      $dataCompreendeFalaNaoEntende['checked'] = '';
    }
    if($anamnese->AnmAdt_CompreenderFala == 1)
    {
      $dataCompreendeFalaDificuldadeOuvir['checked'] = '';
    }
    if($anamnese->AnmAdt_CompreenderFala == 2)
    {
      $dataCompreendeFalaPorPistasVisuais['checked'] = '';
    }
    if($anamnese->AnmAdt_CompreenderFala == 3)
    {
      $dataCompreendeFalaEntendeTudo['checked'] = '';
    }

    //zumbido
    if($anamnese->AnmAdt_Zumbido == 1)
    {
      $dataZumbidoS['checked'] = '';
    }
    if($anamnese->AnmAdt_Zumbido == 0)
    {
      $dataZumbidoN['checked'] = '';
    }

    if($anamnese->AnmAdt_ZumbTipo == 'intermitente')
    {
      $dataZumbidoTipoIntermitente['checked'] = '';
    }
    if($anamnese->AnmAdt_ZumbTipo == 'continuo')
    {
      $dataZumbidoTipoContinuo['checked'] = '';
    }


    //Vertigem

    if($anamnese->AnmAdt_Vertigem == 1)
    {
      $dataVertigemS['checked'] = '';
    }
    if($anamnese->AnmAdt_Vertigem == 0)
    {
      $dataVertigemN['checked'] = '';
    }

    //Incomodo a sons intensos
    if($anamnese->AnmAdt_IncomSonsIntensos == 1)
    {
      $dataIncomodoS['checked'] = '';
    }
    if($anamnese->AnmAdt_IncomSonsIntensos == 0)
    {
      $dataIncomodoN['checked'] = '';
    }
?>
