<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");

    include_once("consulta_caracterizacao_data.php");
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
        <th>Nº da Caracterização</th>
        <th>Data</th>
      </tr>
      <?php
          if(sizeof($caracterizacoes) > 0)
          {
            foreach ($caracterizacoes as $caracterizacao )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$caracterizacao->Caract_Numero.'</td>';
              echo '<td>'.date_format(date_create($caracterizacao->Caract_Data), 'd/m/Y').'</td>';
              echo '</tr>';
            }
          }

       ?>
    </table



  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url("consultaCaracterizacao");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
