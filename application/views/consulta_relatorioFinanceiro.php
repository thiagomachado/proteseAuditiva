<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    $dataSubmit = array(
            'type'          => 'submit',
            'value'         => 'Consultar',
            'id'            => 'btnConsultar',
            'class'         => 'botao'
    );
?>
<div class="conteudo">
  <div class="filtro">
    <?php echo form_open("relatorioFinanceiro", 'name="pacienteConsulta"');  ?>
    <table class="formulario">
        <tr>
          <td>
            <label>De:<br></label>
            <input id="dataInicio" type="date" name="dataInicio"/>
          </td>
          <td>
            <label>Até:<br></label>
            <input id="dataFim" type="date" name="dataFim"/>
          </td>
        </tr>
    </table>
    <div class="areaBotoesFiltro">
        <?php echo form_input($dataSubmit); ?>
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="resultado">
    <table class="tabelaResultado">
      <tr class="first">
        <th>Descrição</th>
        <th>Valor Unitário</th>
        <th>Qtde.</th>
        <th>Valor Total</th>
      </tr>
      <?php
          if(sizeof($procedimentos) > 0)
          {
            foreach ($procedimentos as $procedimento )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$procedimento->descricao.'</td>';
              echo '<td>'.number_format($procedimento->valor_unitario, 2, ',', '.').'</td>';
              echo '<td>'.$procedimento->quantidade.'</td>';
              echo '<td>'.number_format($procedimento->valor_unitario * $procedimento->quantidade, 2, ',', '.').'</td>';
              echo '</tr>';
            }
          }
          
          if(sizeof($implantes) > 0)
          {
            foreach ($implantes as $implante )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$implante->descricao.'</td>';
              echo '<td>'.number_format($implante->valor_unitario, 2, ',', '.').'</td>';
              echo '<td>'.$implante->quantidade.'</td>';
              echo '<td>'.number_format($implante->valor_unitario * $implante->quantidade,2,',','.').'</td>';
              echo '</tr>';
            }
          }
          
          if(sizeof($proteses) > 0)
          {
            foreach ($proteses as $protese )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$protese->descricao.'</td>';
              echo '<td>'.number_format($protese->valor_unitario, 2, ',', '.').'</td>';
              echo '<td>'.$protese->quantidade.'</td>';
              echo '<td>'.number_format($protese->valor_unitario * $protese->quantidade,2,',','.').'</td>';
              echo '</tr>';
            }
          }

       ?>
      
    </table>
    <table class="tabelaResultado">
        <tr class="first">
            <th style="width: 70%">TOTAL</th>
          <th> R$ <?php echo $total; ?></th>
        </tr>
      
    </table>

  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url("sistema");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
