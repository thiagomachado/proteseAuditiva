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
          }

          $data['paciente'] = $paciente;
          $data['anamnese'] = $anamnese;
          $this->template->set('title',$tituloPagina );
          $this->template->load('template',$paginaAnamnese, $data);
        }

        public function cadastrar()
        {
        }

        public function editarAdulta()
        {
          extract($_POST);
          if(!isset($AnmAdt_ZumbTipo))
          {
            $AnmAdt_ZumbTipo = 0;
          }
          $anamnese = array(
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

          $this->anamnese_model->editarAnamneseAdultaPorCPF($cpf,$anamnese);
          echo json_encode($anamnese);
        }

        public function excluir()
        {
        }

    }
?>
