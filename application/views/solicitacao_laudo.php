<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("solicitacao_edicao_data.php");
?>
<!DOCTYPE html>
<html>

  <head lang = "pt-br">
    <title><?php echo $title; ?> </title>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js"></script>
    <?php
    echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('assets/css/templatePDF.css');
    ?>
  </head>
  <body>
    <div class="conteudo">
      <?php
        echo form_open('',$data_form);
      ?>
      <div class="areaFormulario">
        <img src="<?php echo base_url();?>assets/css/imagens/vwsus.jpg" class="le" />
        <img src="<?php echo base_url();?>assets/css/imagens/minis.jpg" class="le" />
        <img src="<?php echo base_url();?>assets/css/imagens/logohucff.jpg" class = "ld" />
        <center><h1>SOLICITAÇÃO</h1></center>
        <fieldset class="secaoFormulario">
          <legend>Paciente</legend>
          <table class="tabelaPDF">
            <tr>
              <th>Nome:</th>
              <th>CPF:</th>
              <th>Data de Nascimento:</th>
              <th>Nº Prontuário:</th>
            </tr>
            <tr>
              <th >
                <p class="labelInfo"><?php echo trim($paciente->Pc_Nome); ?></p>
              </th>
              <td >
                <p class="labelInfo"><?php echo $paciente->Pc_CPF; ?></p>
              </td>
              <td >
                <p class="labelInfo"><?php echo date("d/m/Y", strtotime($paciente->Pc_DtNascimento)); ?></p>
              </td>

              <td >
                <p class="labelInfo"><?php echo $paciente->Pc_NumProntuario; ?></p>
              </td>
            </tr>
          </table>
        </fieldset>
        <br>
        <fieldset class="secaoFormulario">
          <legend>Procedimentos Solicitados:</legend>
          <table>
            <tr>
              <td>Procedimento:</td>
              <td>Quantidade:</td>
            </tr>
            <?php
              foreach ($itensSolicitacao as $itemSolicitacao)
              {
                echo
                '
                  <tr>
                    <td><p class="labelInfo">'.$dataProcedimentos[$itemSolicitacao->Isolic_item_id].'</p></td>
                    <td><p class="labelInfo">'.$itemSolicitacao->Isolic_quantidade.'</p></td>
                  </tr>
                ';
              }
             ?>
          </table>

        </fieldset>
        <br>
        <fieldset class="secaoFormulario">
          <legend>Justificativa do(s) procedimento(s) solicitado(s)</legend>
          <table class="tabelaPDF">
            <tr>
              <td >
                <label>Descrição do Diagnóstico*:</label><br>
                <p class="labelInfo"><?php echo $solicitacao->Solic_descricao; ?></p>
              </td>
              <td >
                <label>CID 10 Principal:</label><br>
                <p class="labelInfo"><?php echo $solicitacao->Solic_cid10principal; ?></p>
              </td>
              <td >
                <label>CID 10 Secundário:</label><br>
                <p class="labelInfo"><?php echo $solicitacao->Solic_cid10sec; ?></p>
              </td>
              <td >
                <label>CID 10 Causas Associadas:</label><br>
                <p class="labelInfo"><?php echo $solicitacao->Solic_cid10causas; ?></p>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <label>Obs.:</label><br>
                <p class="labelInfo"><?php echo $solicitacao->Solic_obs; ?></p>
              </td>
            </tr>
          </table>
        </fieldset>
      </div>

      <?php echo form_close(); ?>
    </div>
  </body>
</html>
