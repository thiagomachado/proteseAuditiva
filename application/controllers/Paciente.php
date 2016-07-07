<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Paciente extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/paciente.css'));
            $this->load->model('paciente_model');
            $this->load->model('endereco_model');
            $this->load->model('telefone_model');
            $this->load->model('uf_model');
            $this->load->model('municipio_model');
            $this->load->helper('url');
        }

        //Consulta de Pacientes
        public function index()
        {
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaEdicaoPaciente.js"></script>';
            $listaPacientes                  = $this->consultar();
            $listaPacientes['formAction']    = 'paciente/' ;
            $listaPacientes['cadastro']      = "cadastroPaciente";
            $listaPacientes['textoCadastro'] = "Novo Paciente";

            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'CONSULTA DE PACIENTES');
            $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function cadastroPaciente()
        {
          $this->template->set('title', 'CADASTRAR PACIENTE');

          $estados            = $this->uf_model->get_all();
          $municipios         = $this->municipio_model->recuperarMunicipiosPorUf('AC');
          $data['estados']    = $estados;
          $data['municipios'] = $municipios;

          $this->template->load('template','paciente_cadastro',$data);
        }

        public function edicaoPaciente($cpf)
        {
          $paciente = $this->paciente_model->recuperarPacientePorCPF($cpf);
          if(sizeof($paciente)== 0)
          {
            redirect('/paciente', 'refresh');
          }
          $endereco           = $this->endereco_model->recuperarEnderecoPorCPF($cpf);
          $telefone           = $this->telefone_model->recuperarTelefonePorCPF($cpf);
          $estados            = $this->uf_model->get_all();
          $municipios         = $this->municipio_model->recuperarMunicipiosPorUf($endereco->End_UF);
          $data['paciente']   = $paciente;
          $data['endereco']   = $endereco;
          $data['telefone']   = $telefone;
          $data['estados']    = $estados;
          $data['municipios'] = $municipios;


          $this->template->set('title', 'EDITAR PACIENTE');
          $this->template->load('template','paciente_edicao', $data);
        }

        public function popularMunicipios($estado)
        {
          header('Content-Type: application/x-json; charset=utf-8');
          echo(json_encode($this->municipio_model->recuperarMunicipiosPorUf($estado)));
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataPaciente = array(
            'Pc_CPF'          => $Pc_CPF,
            'Pc_Nome'         => $this->normalizarTexto($Pc_Nome),
            'Pc_CartaoSus'    => $Pc_CartaoSus,
            'Pc_NumProntuario'=> $Pc_NumProntuario,
            'Pc_DtNascimento' => $Pc_DtNascimento,
            'Pc_Sexo'         => $Pc_Sexo,
            'Pc_Etnia'        => $Pc_Etnia,
            'Pc_NomeMae'      => $this->normalizarTexto($Pc_NomeMae),
            'Pc_NomePai'      => $this->normalizarTexto($Pc_NomePai),
            'Pc_GrauEscolar'  => $Pc_GrauEscolar,
            'Pc_SeTrabalha'   => $Pc_SeTrabalha,
            'Pc_Profissao'    => $Pc_Profissao,
            'Pc_TipoAnamn'    => $Pc_TipoAnamn
          );

          $dataEndereco = array(
            'Pc_CPF'         => $Pc_CPF,
            'End_Logradouro' => $this->normalizarTexto($End_Logradouro),
            'End_UF'         => $End_UF,
            'End_CEP'        => $End_CEP,
            'End_CodIBGE'    => $End_CodIBGE
          );

          $dataTelefone = array(
            'Pc_CPF'        => $Pc_CPF,
            'Tel_Tel1'      => $Tel_Tel1,
            'Tel_Tel2'      => $Tel_Tel2
          );

          $pacienteInserido = $this->paciente_model->cadastrarPaciente($dataPaciente);
          $this->endereco_model->cadastrarEndereco($dataEndereco);
          $this->telefone_model->cadastrarTelefone($dataTelefone);
          echo json_encode($pacienteInserido->Pc_CPF);
        }

        public function editar()
        {
          extract($_POST);
          $dataPaciente = array(
            'Pc_CPF'          => $Pc_CPF,
            'Pc_Nome'         => $this->normalizarTexto($Pc_Nome),
            'Pc_CartaoSus'    => $Pc_CartaoSus,
            'Pc_NumProntuario'=> $Pc_NumProntuario,
            'Pc_DtNascimento' => $Pc_DtNascimento,
            'Pc_Sexo'         => $Pc_Sexo,
            'Pc_Etnia'        => $Pc_Etnia,
            'Pc_NomeMae'      => $this->normalizarTexto($Pc_NomeMae),
            'Pc_NomePai'      => $this->normalizarTexto($Pc_NomePai),
            'Pc_GrauEscolar'  => $Pc_GrauEscolar,
            'Pc_SeTrabalha'   => $Pc_SeTrabalha,
            'Pc_Profissao'    => $Pc_Profissao,
            'Pc_TipoAnamn'    => $Pc_TipoAnamn
          );

          $dataEndereco = array(
            'Pc_CPF'         => $Pc_CPF,
            'End_Logradouro' => $this->normalizarTexto($End_Logradouro),
            'End_UF'         => $End_UF,
            'End_CEP'        => $End_CEP,
            'End_CodIBGE'    => $End_CodIBGE
          );

          $dataTelefone = array(
            'Pc_CPF'        => $Pc_CPF,
            'Tel_Tel1'      => $Tel_Tel1,
            'Tel_Tel2'      => $Tel_Tel2
          );

          $editarPaciente = $this->paciente_model->editarPacientePorCPF($cpf, $dataPaciente);
          $this->endereco_model->editarEnderecoPorCPF($cpf, $dataEndereco);
          $this->telefone_model->editarTelefonePorCPF($cpf, $dataTelefone);

          echo json_encode(true);
        }

        public function excluir($cpf)
        {
          $this->paciente_model->excluirPacientePorCPF($cpf);
          redirect('/paciente', 'refresh');

        }

        private function consultar()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes    = $this->paciente_model->recuperarPacientePorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);

          //salva os pacientes em um vetor, para poder passar os dados para view
          $listaPacientes["pacientes"] = $pacientes;
          return $listaPacientes;
        }

    }
?>
