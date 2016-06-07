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
    $dataDorDeOuvidoS = array(
            'type'          => 'radio',
            'name'          => 'dorDeOuvido',
            'id'            => 'dorDeOuvidoS',
            'size'          => '30',
            'required'      => '',
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
            'required'      => '',
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
            'size'          => '30'
    );
    $dataCirurgiaOtologicaOE = array(

            'name'          => 'cirurgiaOtologicaOE',
            'id'            => 'cirurgiaOtologicaOE',
            'size'          => '30'
    );

    $dataCirurgiaOtologicaDescricao = array(
            'name'          => 'cirurgiaOtologicaDescricao',
            'id'            => 'cirurgiaOtologicaDescricao',
            'size'          => '10',
            'maxlength'     => '250'
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
            'size'          => '10',
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

//Doenças
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
    $dataSifilis = array(
            'name'          => 'sifilis',
            'id'            => 'sifilis',
            'size'          => '30'
    );
    $dataHipertensao = array(
            'name'          => 'hipertensao',
            'id'            => 'hipertensao',
            'size'          => '30'
    );
    $dataSarampo = array(
            'name'          => 'sarampo',
            'id'            => 'sarampo',
            'size'          => '30'
    );
    $dataCirculatorios = array(
            'name'          => 'circulatorios',
            'id'            => 'circulatorios',
            'size'          => '30'
    );
    $dataDiabetes = array(
            'name'          => 'diabetes',
            'id'            => 'diabetes',
            'size'          => '30'
    );

    $dataOutrasDoencas = array(
            'name'          => 'outrasDoencas',
            'id'            => 'outrasDoencas',
            'size'          => '60',
            'maxlength'     => '175'
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
            'size'          => '55',
            'maxlength'     => '75'
    );

    $dataRuidoOcupacionalS = array(
            'type'          => 'radio',
            'name'          => 'ruidoOcupacional',
            'id'            => 'ruidoOcupacionalS',
            'size'          => '30',
            'required'      => '',
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
            'maxlength'     => '45'
    );

    $dataRuidoOcupacionalTempo = array(
            'name'          => 'ruidoOcupacionalTempo',
            'id'            => 'ruidoOcupacionalTempo',
            'size'          => '14',
            'maxlength'     => '15'
    );

    $dataTempoPerdaAudicao = array(
            'name'          => 'tempoPerdaAudicao',
            'id'            => 'tempoPerdaAudicao',
            'required'      => '',
            'size'          => '70',
            'maxlength'     => '45'
    );


    $dataCompreendeFalaNaoEntende = array(
            'type'          => 'radio',
            'name'          => 'compreendeFala',
            'id'            => 'compreendeFalaNaoEntende',
            'size'          => '30',
            'required'      => '',
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
            'required'      => '',
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
            'size'          => '30'
    );
    $dataZumbidoOE = array(
            'name'          => 'zumbidoOE',
            'id'            => 'zumbidoOE',
            'size'          => '30'
    );

    $dataTempoZumbido = array(
            'name'          => 'tempoZumbido',
            'id'            => 'tempoZumbido',
            'size'          => '40',
            'maxlength'     => '25'
    );

    $dataVertigemS = array(
            'type'          => 'radio',
            'name'          => 'vertigem',
            'id'            => 'vertigemS',
            'size'          => '30',
            'required'      => '',
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
            'maxlength'     => '45'
    );

    $dataIncomodoS = array(
            'type'          => 'radio',
            'name'          => 'incomodo',
            'id'            => 'incomodoS',
            'size'          => '30',
            'required'      => '',
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
            'id'            => 'cadastrarAnamneseAdulta',
            'class'         => 'botao submit'
    );

?>
