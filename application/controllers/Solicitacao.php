<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Solicitacao extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->template->set('css', link_tag('assets/css/solicitacao.css'));
            $this->load->model('solicitacao_model');
            $this->load->model('item_solicitacao_model');
            $this->load->model('paciente_model');
            $this->load->model('usuario_model');
            $this->load->model('procedimento_model');
            $this->load->model('endereco_model');
            $this->load->model('telefone_model');
            $this->load->model('municipio_model');
            $this->load->model('cor_model');
            $this->load->model('andamento_paciente_model');
            $this->load->library('pdf');
        }

        public function selecionarPaciente()
        {
            $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaCadastroSolicitacao.js"></script>';
            $listaPacientes                  = $this->consultarPacientes();
            $listaPacientes['formAction']    = 'cadastroSolicitacao' ;
            $listaPacientes['cadastro']      = "cadastroPaciente";
            $listaPacientes['textoCadastro'] = "Novo Paciente";

            $this->template->set('script', $jsConsulta );
            $this->template->set('title', 'SELECIONE O PACIENTE');
            $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function cadastroSolicitacao($cpf)
        {
            $dados['paciente']       = $this->paciente_model->recuperarPacientePorCPF($cpf);
            $dados['profissionais']  = $this->usuario_model->recuperarProfissionais();
            $dados['procSecundarios']= $this->procedimento_model->recuperarProcedimentosSecundarios();
            $dados['procPincipais']  = $this->procedimento_model->recuperarProcedimentosPrincipais();

            $this->template->set('title', 'CADASTRO DE LAUDO');
            $this->template->load('template','solicitacao_cadastro',$dados);
        }


        public function edicaoSolicitacao($idSolicitacao)
        {
            $dados["solicitacao"]     = $this->solicitacao_model->recuperarSolicitacaoPorId($idSolicitacao);
            $dados["itens"]           = $this->item_solicitacao_model->recuperarItensPorSolicitacao($idSolicitacao);
            $dados["paciente"]        = $this->paciente_model->recuperarPacientePorCPF($dados["solicitacao"]->Pc_CPF);;
            $dados['profissionais']   = $this->usuario_model->recuperarProfissionais();
            $dados["procSecundarios"] = $this->procedimento_model->recuperarProcedimentosSecundarios();
            $dados['procPincipais']   = $this->procedimento_model->recuperarProcedimentosPrincipais();

            $this->template->set('title', 'EDIÇÃO DE LAUDO');
            $this->template->load('template','solicitacao_edicao',$dados);

        }

        public function consultaSolicitacao()
        {
          $jsConsulta                      = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaSolicitacao.js"></script>';
          $listaPacientes                  = $this->consultarPacientesComSolicitacao();
          $listaPacientes['formAction']    = 'consultaSolicitacao' ;
          $listaPacientes['cadastro']      = "cadastroSolicitacao";
          $listaPacientes['textoCadastro'] = "NOVO";

          $this->template->set('script', $jsConsulta );
          $this->template->set('title', 'CONSULTA DE LAUDO');
          $this->template->load('template','consulta_generica',$listaPacientes);

        }

        public function consultaSolicitacaoPorPaciente($cpf)
        {
          $jsConsulta           = '<script language="JavaScript" type="text/javascript" src="'.base_url().'assets/js/consultaSolicitacaoPaciente.js"></script>';
          $solicitacoes         = $this->solicitacao_model->recuperarSolicitacoesPorCPF($cpf);
          $paciente             = $this->paciente_model->recuperarPacientePorCPF($cpf);
          $dados["paciente"]     = $paciente;
          $dados["solicitacoes"] = $solicitacoes;

          $this->template->set('script', $jsConsulta );
          $this->template->set('title', 'LAUDOS DO PACIENTE');
          $this->template->load('template','consulta_solicitacao',$dados);
        }

        public function cadastrar()
        {
          extract($_POST);
          $dataSolicitacao = array(
            'Pc_CPF'              => $Pc_CPF,
            'Proc_Id'             => $Proc_Id,
            'Proc_Quantidade'     => $Proc_Quantidade,
            'Solic_data'          => date("Y-m-d"),
            'Solic_descricao'     => $Solic_descricao,
            'Solic_cid10principal'=> $Solic_cid10principal,
            'Solic_cid10sec'      => $Solic_cid10sec,
            'Solic_cid10causas'   => $Solic_cid10causas,
            'Solic_CPF_Profissional' =>$Solic_CPF_Profissional,
            'Solic_obs'           => $Solic_obs
          );

          $idSolicitacao = $this->solicitacao_model->cadastrarSolicitacao($dataSolicitacao);
          if ($existeProcSecundario > 0)
          {
            $quantidadeItens = sizeof($procedimentos);

            for($i = 0; $i < $quantidadeItens; $i++)
            {
              $dataItemSolicitacao = array(
                'Solic_id'          => $idSolicitacao,
                'Isolic_item_id'    => $procedimentos[$i],
                'Isolic_quantidade' => $quantidades[$i],
                'Isolic_confirmado' => 0
              );
              $this->item_solicitacao_model->cadastrarItemSolicitacao($dataItemSolicitacao);
            }
          }

          //cadastro andamento do paciente (somente se ja não tiver cadastrado antes)
          $andamentoCadastradoAnteriormente = $this->andamento_paciente_model->recuperarAndamentoPacientePorCPF($Pc_CPF);
          if(sizeof($andamentoCadastradoAnteriormente) == 0) //verifica se ja foi cadastrado andamento para esse paciente
          {
            $dataAndamento = array(
              'Pc_CPF' => $Pc_CPF
            );

            $this->andamento_paciente_model->cadastrarAndamentoPaciente($dataAndamento);
          }

          echo json_encode($idSolicitacao);
        }

        private function consultarPacientes()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes    = $this->paciente_model->recuperarPacientePorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);
          //salva os pacientes em um vetor, para poder passar os dados para view
          $listaPacientes["pacientes"] = $pacientes;
          return $listaPacientes;
        }

        private function consultarPacientesComSolicitacao()
        {
          $nomePaciente = $this->input->post('nomePaciente');
          $nProntuario  = $this->input->post('nProntuario');
          $cartaoSUS    = $this->input->post('cartaoSUS');

          $pacientes    = $this->paciente_model->recuperarPacienteComSolicitacaoPorNomeNprontuarioCartaoSUS($nomePaciente,$nProntuario,$cartaoSUS);
          $listaPacientes["pacientes"] = $pacientes;
          return $listaPacientes;

        }

        public function editarSolicitacao()
        {
          extract($_POST);

          $dataSolicitacao = array(
            'Proc_Id'               => $Proc_Id,
            'Proc_Quantidade'       => $Proc_Quantidade,
            'Solic_descricao'       => $Solic_descricao,
            'Solic_cid10principal'  => $Solic_cid10principal,
            'Solic_cid10sec'        => $Solic_cid10sec,
            'Solic_cid10causas'     => $Solic_cid10causas,
            'Solic_CPF_Profissional'=> $Solic_CPF_Profissional,
            'Solic_obs'             => $Solic_obs
          );
           $alterar = $this->solicitacao_model->editarSolicitacao($dataSolicitacao, $Solic_id);
           //altera os itens da solicitação somente se existirem
           if (isset($procedimentos))
           {
             $quantidadeItens = sizeof($procedimentos);

             for($i = 0; $i < $quantidadeItens; $i++)
             {
               $dataItemSolicitacao = array(
                'Isolic_item_id'    => $procedimentos[$i],
                'Isolic_quantidade' => $quantidades[$i]
               );
               $this->item_solicitacao_model->editarItemSolicitacao($dataItemSolicitacao,$idItens[$i]);
             }
           }

           $arr = array('Proc_Id' => $alterar);

           echo json_encode($arr);
           return json_encode($arr);
        }

        public function excluirItem($id)
        {
          $arr = array('ID' => $id);
          $this->item_solicitacao_model->excluirItemSolicitacao($id);
          echo json_encode($arr);
        }

        public function emitirLaudoPDF($idSolicitacao)
        {
          $dados['solicitacao']     = $this->solicitacao_model->recuperarSolicitacaoPorId($idSolicitacao);
          $dados['itensSolicitacao'] = $this->item_solicitacao_model->recuperarItensPorSolicitacao($idSolicitacao);
          $dados['paciente']         = $this->paciente_model->recuperarPacientePorCPF($dados['solicitacao']->Pc_CPF);
          $dados['profissionais']    = $this->usuario_model->recuperarProfissionais();
          $dados['endereco']          = $this->endereco_model->recuperarEnderecoPorCPF($dados['solicitacao']->Pc_CPF);
          $dados['telefone']        = $this->telefone_model->recuperarTelefonePorCPF($dados['solicitacao']->Pc_CPF);
          $dados['municipios']        = $this->municipio_model->recuperarMunicipioPorCodIBGE($dados['endereco']->End_CodIBGE);
          $dados['cor']               = $this->cor_model->recuperarCorPorCodigo($dados['paciente']->Pc_Etnia);
          $dados['profissional']     = $this->usuario_model->recuperarDadosUsuarioPorCPF($dados['solicitacao']->Solic_CPF_Profissional);
          $dados["procSecundarios"] = $this->procedimento_model->recuperarProcedimentosSecundarios();
          $dados['procPincipais']   = $this->procedimento_model->recuperarProcedimentosPrincipais();
          $dados['procPrincipal']   = $this->procedimento_model->recuperarProcedimentoPorId($dados['solicitacao']->Proc_Id);

          //passa o laudo como arquivo pdf para download
          $this->pdf->load_view('solicitacao_laudo', $dados);
          $this->pdf->render();
          $this->pdf->stream(trim($dados['paciente']->Pc_Nome).".pdf");

          //exibe o laudo como pagina web
          // echo $this->load->view('solicitacao_laudo', $dados, true);
        }
    }
?>
