<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioFinanceiro extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template->set('css', link_tag('assets/css/relatorioFinanceiro.css'));
        $this->load->model('solicitacao_model');
        $this->load->model('relatorio_financeiro_model');
        $this->load->model('item_solicitacao_model');
        $this->load->model('paciente_model');
        $this->load->model('usuario_model');
        $this->load->model('procedimento_model');
        $this->load->model('implante_model');
        $this->load->model('protese_model');        
        $this->load->model('andamento_paciente_model');
        $this->load->library('pdf');
    }
    
    public function index()
    {        
        $listaFinanceiro                  = $this->consultar();                
        
        $this->template->set('title', 'RELATÓRIO FINANCEIRO');
        $this->template->load('template','consulta_relatorioFinanceiro',$listaFinanceiro);
              
    }
    
    
    private function consultar()
    {
      $dataInicio = $this->input->post('dataInicio');
      $dataFim    = $this->input->post('dataFim');
      $dataAtual  = date('Y-m-d');
      
      //na busca incial mostra os valores do inicio do mês até a data atual
      if ($dataInicio == "")
      {
          $dataInicio = date("Y-m").'-01';          
      }
      if ($dataFim == "")
      {
          $dataFim = $dataAtual;
      }
      $total         = 0;
      $procedimentos = $this->relatorio_financeiro_model->recuperarDadosFinanceiroProcedimentosPorPeriodo($dataInicio, $dataFim);
      foreach ($procedimentos as $procedimento)
      {
          $total = $total + ($procedimento->quantidade * $procedimento->valor_unitario);
      }
      
      $implantes = $this->relatorio_financeiro_model->recuperarDadosFinanceiroImplantesPorPeriodo($dataInicio,$dataFim);
      foreach ($implantes as $implante)
      {
          $total = $total + ($implante->quantidade * $implante->valor_unitario);
      }
      
      $proteses = $this->relatorio_financeiro_model->recuperarDadosFinanceiroProtesesPorPeriodo($dataInicio, $dataFim);
      foreach ($proteses as $protese) 
      {
         $total = $total + ($protese->quantidade * $protese->valor_unitario); 
      }
      
      $listaFinanceiro["proteses"]      = $proteses;
      $listaFinanceiro["implantes"]     = $implantes;
      $listaFinanceiro["procedimentos"] = $procedimentos;
      $listaFinanceiro["total"]         = number_format($total, 2, ',', '.');
      return $listaFinanceiro;
    }
}
