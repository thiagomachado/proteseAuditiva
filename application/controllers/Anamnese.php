<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Anamnese extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/anamnese.css'));
            $this->load->model('paciente_model');
            $this->load->model('anamnese_model');
            $this->load->helper('url');
        }

        public function cadastroAnamnese($cpf)
        {
          $paciente = $this->paciente_model->recuperarPacientePorCPF($cpf);
          if(sizeof($paciente)== 0)
          {
            redirect('/paciente', 'refresh');
          }

          $tipoAnamnese = $paciente->Pc_TipoAnamn;
          if($tipoAnamnese == 'adulta')
          {
            $paginaAnamnese = 'anamneseAdulta_cadastro';
            $tituloPagina   = 'CADASTRAR ANAMNESE ADULTA';

          }
          elseif ($tipoAnamnese == 'infantil')
          {
            $paginaAnamnese = 'anamneseInfantil_cadastro';
            $tituloPagina   = 'CADASTRAR ANAMNESE INFANTIL';

          }

          $data['paciente'] = $paciente;
          $this->template->set('title', $tituloPagina);
          $this->template->load('template',$paginaAnamnese,$data);
        }

        public function edicaoAnamnese($cpf)
        {
          $paciente = $this->paciente_model->recuperarPacientePorCPF($cpf);
          if(sizeof($paciente)== 0)
          {
            redirect('/paciente', 'refresh');
          }
          //verifica o tipo de anamnese, e escolhe a pagina de edição adequada
          $tipoAnamnese = $paciente->Pc_TipoAnamn;
          if($tipoAnamnese == 'adulta')
          {
            $paginaAnamnese = 'anamneseAdulta_edicao';
            $tituloPagina   = 'EDITAR ANAMNESE ADULTA';
            $anamnese       = $this->anamnese_model->recuperarAnmaneseAdultaPorCPF($cpf);

            //se não houver anamnese redireciona para o cadastro de anamnese adulta
            if(sizeof($anamnese) == 0)
            {
              $tituloPagina   = 'CADASTRAR ANAMNESE ADULTA';
              $paginaAnamnese = 'anamneseAdulta_cadastro';
            }

          }
          elseif ($tipoAnamnese == 'infantil')
          {
            $paginaAnamnese = 'anamneseInfantil_edicao';
            $tituloPagina   = 'EDITAR ANAMNESE INFANTIL';
            $anamnese       = $this->anamnese_model->recuperarAnmaneseInfantilPorCPF($cpf);
            //se não houver anamnese redireciona para o cadastro de anamnese infantil
            if(sizeof($anamnese) == 0)
            {
              $tituloPagina   = 'CADASTRAR ANAMNESE INFANTIL';
              $paginaAnamnese = 'anamneseInfantil_cadastro';
            }
          }

          $data['paciente'] = $paciente;
          $data['anamnese'] = $anamnese;
          $this->template->set('title',$tituloPagina );
          $this->template->load('template',$paginaAnamnese, $data);
        }

        public function cadastrarAdulta()
        {
          $anamneseForm = $this->extrairDadosAnamneseAdulta();

          $anamnese = $this->anamnese_model->cadastrarAnamneseAdulta($anamneseForm);
          echo json_encode($anamnese);
        }

        public function editarAdulta()
        {
          $anamneseForm = $this->extrairDadosAnamneseAdulta();

          $anamnese = $this->anamnese_model->editarAnamneseAdultaPorCPF($anamneseForm['Pc_CPF'],$anamneseForm);
          echo json_encode($anamnese);
        }

        public function cadastrarInfantil()
        {
          $anamneseForm = $this->extrairDadosAnamneseInfantil();

          $anamnese = $this->anamnese_model->cadastrarAnamneseInfantil($anamneseForm);
          echo json_encode($anamnese);
        }

        public function editarInfantil()
        {
          $anamneseForm = $this->extrairDadosAnamneseInfantil();

          $anamnese = $this->anamnese_model->editarAnamneseInfantilPorCPF($anamneseForm['Pc_CPF'],$anamneseForm);
          echo json_encode($anamnese);
        }

        private function extrairDadosAnamneseAdulta()
        {
          extract($_POST);
          if(!isset($AnmAdt_ZumbTipo))
          {
            $AnmAdt_ZumbTipo = 0;
          }
            if(!isset($AnmAdt_DorOuvido))
            {
                $AnmAdt_DorOuvido = 0;
            }
            if(!isset($AnmAdt_HistOtite))
            {
                $AnmAdt_HistOtite = 0;
            }
            if(!isset($AnmAdt_CirurgiaOtologica))
            {
                $AnmAdt_CirurgiaOtologica = 0;
            }
            if(!isset($AnmAdt_PerdaAudNaFamilia))
            {
                $AnmAdt_PerdaAudNaFamilia = 0;
            }
            if(!isset($AnmAdt_UsoMedicacao))
            {
                $AnmAdt_UsoMedicacao = 0;
            }
            if(!isset($AnmAdt_SeRuidosOcup))
            {
                $AnmAdt_SeRuidosOcup = 0;
            }
            if(!isset($AnmAdt_CompreenderFala))
            {
                $AnmAdt_CompreenderFala = 0;
            }
            if(!isset($AnmAdt_Zumbido))
            {
                $AnmAdt_Zumbido = 0;
            }
            if(!isset($AnmAdt_Vertigem))
            {
                $AnmAdt_Vertigem = 0;
            }
            if(!isset($AnmAdt_IncomSonsIntensos))
            {
                $AnmAdt_IncomSonsIntensos = 0;
            }

          $anamnese = array(
            'Pc_CPF'                   =>  $cpf,
            'AnmAdt_EncaminhadoPor'    =>  $AnmAdt_EncaminhadoPor,
            'AnmAdt_PrincQueixa'       =>  $AnmAdt_PrincQueixa,
            'AnmAdt_HistQueixa'        =>  $AnmAdt_HistQueixa,
            'AnmAdt_DorOuvido'         =>  $AnmAdt_DorOuvido,
            'AnmAdt_HistOtite'         =>  $AnmAdt_HistOtite,
            'AnmAdt_OtiteOE'           =>  $AnmAdt_OtiteOE,
            'AnmAdt_OtiteOD'           =>  $AnmAdt_OtiteOD,
            'AnmAdt_Periodicidade'     =>  $AnmAdt_Periodicidade,
            'AnmAdt_CirurgiaOtologica' =>  $AnmAdt_CirurgiaOtologica,
            'AnmAdt_CirurgiaOtolOE'    =>  $AnmAdt_CirurgiaOtolOE,
            'AnmAdt_CirurgiaOtolOD'    =>  $AnmAdt_CirurgiaOtolOD,
            'AnmAdt_CirurgiaDesc'      =>  $AnmAdt_CirurgiaDesc,
            'AnmAdt_PerdaAudNaFamilia' =>  $AnmAdt_PerdaAudNaFamilia,
            'AnmAdt_FamiliarPerdaAud'  =>  $AnmAdt_FamiliarPerdaAud,
            'AnmAdt_Doenca'            =>  $AnmAdt_Doenca,
            'AnmAdt_Caxumba'           =>  $AnmAdt_Caxumba,
            'AnmAdt_Meningite'         =>  $AnmAdt_Meningite,
            'AnmAdt_Sifilis'           =>  $AnmAdt_Sifilis,
            'AnmAdt_Hipertensao'       =>  $AnmAdt_Hipertensao,
            'AnmAdt_Sarampo'           =>  $AnmAdt_Sarampo,
            'AnmAdt_Circulatorios'     =>  $AnmAdt_Circulatorios,
            'AnmAdt_Diabetes'          =>  $AnmAdt_Diabetes,
            'AnmAdt_UsoMedicacao'      =>  $AnmAdt_UsoMedicacao,
            'AnmAdt_Medicacao'         =>  $AnmAdt_Medicacao,
            'AnmAdt_SeRuidosOcup'      =>  $AnmAdt_SeRuidosOcup,
            'AnmAdt_RuidosOcup'        =>  $AnmAdt_RuidosOcup,
            'AnmAdt_TempoRuidosOcup'   =>  $AnmAdt_TempoRuidosOcup,
            'AnmAdt_TempoDificulAud'   =>  $AnmAdt_TempoDificulAud,
            'AnmAdt_CompreenderFala'   =>  $AnmAdt_CompreenderFala,
            'AnmAdt_Zumbido'           =>  $AnmAdt_Zumbido,
            'AnmAdt_ZumbOD'            =>  $AnmAdt_ZumbOD,
            'AnmAdt_ZumbOE'            =>  $AnmAdt_ZumbOE,
            'AnmAdt_ZumbTipo'          =>  $AnmAdt_ZumbTipo,
            'AnmAdt_ZumbTempo'         =>  $AnmAdt_ZumbTempo,
            'AnmAdt_Vertigem'          =>  $AnmAdt_Vertigem,
            'AnmAdt_TempoVertigem'     =>  $AnmAdt_TempoVertigem,
            'AnmAdt_IncomSonsIntensos' =>  $AnmAdt_IncomSonsIntensos,
            'AnmAdt_SonsIntensos'      =>  $AnmAdt_SonsIntensos,
            'AnmAdt_Obs'               =>  $AnmAdt_Obs
          );

          foreach ($anamnese as $key => $value)
          {
            if($value == "true")
            {
              $anamnese[$key] = 1;
            }
            if($value == "false")
            {
              $anamnese[$key] = 0;
            }
          }

          return $anamnese;
        }

        private function extrairDadosAnamneseInfantil()
        {
          extract($_POST);

            if(!isset($AnmInf_GestAlteracao))
            {
               $AnmInf_GestAlteracao = 0;
            }
            if(!isset($AnmInf_HistOtite))
            {
                $AnmInf_HistOtite = 0;
            }
            if(!isset($AnmInf_PerdaAudNaFamilia))
            {
               $AnmInf_PerdaAudNaFamilia = 0;
            }
            if(!isset($AnmInf_UsoMedicacao))
            {
               $AnmInf_UsoMedicacao = 0;
            }
            if(!isset($AnmInf_PaisConsag))
            {
                $AnmInf_PaisConsag = 0;
            }
          $anamnese = array(
            'Pc_CPF'                      => $cpf,
            'AnmInf_EncaminhaPor'         => $AnmInf_EncaminhaPor,
            'AnmInf_PrincQueixa'          => $AnmInf_PrincQueixa,
            'AnmInf_HistQueixa'           => $AnmInf_HistQueixa,
            'AnmInf_GestAlteracao'        => $AnmInf_GestAlteracao,
            'AnmInf_DescAlteracao'        => $AnmInf_DescAlteracao,
            'AnmInf_Rubeola'              => $AnmInf_Rubeola,
            'AnmInf_Toxoplasmose'         => $AnmInf_Toxoplasmose,
            'AnmInf_Sifilis'              => $AnmInf_Sifilis,
            'AnmInf_Citomegalovirose'     => $AnmInf_Citomegalovirose,
            'AnmInf_Herpes'               => $AnmInf_Herpes,
            'AnmInf_Drogas'               => $AnmInf_Drogas,
            'AnmInf_Alcool'               => $AnmInf_Alcool,
            'AnmInf_Parto'                => $AnmInf_Parto,
            'AnmInf_Caxumba'              => $AnmInf_Caxumba,
            'AnmInf_Meningite'            => $AnmInf_Meningite,
            'AnmInf_Encefalite'           => $AnmInf_Encefalite,
            'AnmInf_TraumaAcustico'       => $AnmInf_TraumaAcustico,
            'AnmInf_Sarampo'              => $AnmInf_Sarampo,
            'AnmInf_Doenca'               => $AnmInf_Doenca,
            'AnmInf_HistOtite'            => $AnmInf_HistOtite,
            'AnmInf_OtiteOE'              => $AnmInf_OtiteOE,
            'AnmInf_OtiteOD'              => $AnmInf_OtiteOD,
            'AnmInf_Periodicidade'        => $AnmInf_Periodicidade,
            'AnmInf_PerdaAudNaFamilia'    => $AnmInf_PerdaAudNaFamilia,
            'AnmInf_Familiar'             => $AnmInf_Familiar,
            'AnmInf_UsoMedicacao'         => $AnmInf_UsoMedicacao,
            'AnmInf_Medicacao'            => $AnmInf_Medicacao,
            'AnmInf_PaisConsag'           => $AnmInf_PaisConsag,
            'AnmInf_TempoDifculAud'       => $AnmInf_TempoDifculAud,
            'AnmInf_IdadeConf'            => $AnmInf_IdadeConf,
            'AnmInf_ComoConf'             => $AnmInf_ComoConf,
            'AnmInf_IdadeInterv'          => $AnmInf_IdadeInterv,
            'AnmInf_QualInterv'           => $AnmInf_QualInterv,
            'AnmInf_ReageTrovao'          => $AnmInf_ReageTrovao,
            'AnmInf_ReageAviao'           => $AnmInf_ReageAviao,
            'AnmInf_ReagePorta'           => $AnmInf_ReagePorta,
            'AnmInf_ReageBuzina'          => $AnmInf_ReageBuzina,
            'AnmInf_ReageCachorro'        => $AnmInf_ReageCachorro,
            'AnmInf_ReageVoz'             => $AnmInf_ReageVoz,
            'AnmInf_ReacaoIntensidadeVoz' => $AnmInf_ReacaoIntensidadeVoz,
            'AnmInf_ComoReage'            => $AnmInf_ComoReage,
            'AnmInf_DesenvolvLing'        => $AnmInf_DesenvolvLing,
            'AnmInf_ComunicProdom'        => $AnmInf_ComunicProdom,
            'AnmInf_DesenvolvMotor'       => $AnmInf_DesenvolvMotor,
            'AnmInf_Obs'                  => $AnmInf_Obs
          );

          foreach ($anamnese as $key => $value)
          {
            if($value == "true")
            {
              $anamnese[$key] = 1;
            }
            if($value == "false")
            {
              $anamnese[$key] = 0;
            }
          }

          return $anamnese;
        }

    }
?>
