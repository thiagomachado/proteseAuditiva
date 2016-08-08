<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Relatorio_financeiro_model extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function recuperarDadosFinanceiroProcedimentosPorPeriodo($dataInicio, $dataFim) 
    {
       $query = $this->db->query(
         'SELECT p.Proc_Id as "id", p.Proc_Nome as "descricao", p.Proc_Valor as "valor_unitario",
         (SELECT SUM(Proc_Quantidade) FROM bd_projpa.tbl_solicitacao s WHERE p.Proc_Id = s.Proc_Id and s.Solic_data BETWEEN "'.$dataInicio.'" and "'.$dataFim.'") as "quantidade"
         FROM bd_projpa.tbl_procedimentos p
         WHERE 
         EXISTS(select 1 FROM bd_projpa.tbl_solicitacao s1 WHERE p.Proc_Id = s1.Proc_Id and s1.Solic_data BETWEEN "'.$dataInicio.'" and "'.$dataFim.'" )'                          
        );

       return $query->result();
    }
    
    public function recuperarDadosFinanceiroImplantesPorPeriodo($dataInicio, $dataFim) 
    {
        $query = $this->db->query(
        'SELECT i.Impl_Id   as "id", i.Impl_Desc as "descricao", i.Impl_Valor as "valor_unitario",
        (select 1 from bd_projpa.tbl_implantes i2 where i.Impl_Id = i2.Impl_Id ) as "quantidade"
        FROM bd_projpa.tbl_implantes i
        WHERE
        i.Pc_CPF <> ""
        and i.Impl_DataSaida BETWEEN "'.$dataInicio.'" and "'.$dataFim.'"'                        
        );
        
        return $query->result();
    }
    
    public function recuperarDadosFinanceiroProtesesPorPeriodo($dataInicio, $dataFim) 
    {
        $query = $this->db->query(
        'SELECT p.Prot_Id   as "id", p.Prot_Nome as "descricao", p.Prot_Valor as "valor_unitario",
         (select 1 from bd_projpa.tbl_proteses p2 where p.Prot_Id = p2.Prot_Id ) as "quantidade"
         FROM bd_projpa.tbl_proteses p
         WHERE
         p.Pc_CPF <> ""
         and p.Prot_DataSaida BETWEEN "'.$dataInicio.'" and "'.$dataFim.'"'
        );
        
        return $query->result();
    }
}
