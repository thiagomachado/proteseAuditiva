<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    include_once("consulta_solicitacao_data.php");
?>
<div class="conteudo">




  <div class="resultado" id="resultadoConsultaSolicitacao">

    <fieldset class="areaDescricaoPaciente">
      <legend>Paciente</legend>
      <table>
        <tr>
          <td >
            <label>Nome:</label><br>
            <?php echo form_input($dataNomePaciente); ?>
          </td>

          <td >
            <label>CPF:</label><br>
            <?php echo form_input($dataCPF); ?>
          </td>

          <td >
            <label>Nº Prontuário:</label><br>
            <?php echo form_input($dataProntuario); ?>
          </td>

          <td >
            <label>Data de Nascimento:</label><br>
            <?php echo form_input($dataDataNascimento); ?>
          </td>

        </tr>
      </table>
      </fieldset>

    <table class="tabelaResultado" id="tabelaResultado">
      <tr class="first">
        <th>Nº da Solicitação</th>
        <th>Data</th>
      </tr>
      <?php
          if(sizeof($solicitacoes) > 0)
          {
            foreach ($solicitacoes as $solicitacao )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$solicitacao->Solic_id.'</td>';
              echo '<td>'.date_format(date_create($solicitacao->Solic_data), 'd/m/Y').'</td>';
              echo '</tr>';
            }
          }

       ?>
    </table



  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url("consultaSolicitacao");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
