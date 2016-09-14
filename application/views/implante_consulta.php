<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    $dataClasse = array();
    $dataClasse[''] = "";
    foreach ($classes as $classe)
    {
      $dataClasse[$classe->classe_id] = $classe->classe_nome;
    }
?>
<div class="conteudo">
  <div class="filtro">
    <?php
    echo form_open("implante/", 'name="consultaImplante"');
    ?>
    <table class="formulario">
      <tr>
        <td colspan="2">
          <label>Nome:</label><br>
          <input type="text" size="62" name="nomeImplante">
        </td>
      </tr>
      <tr>
        <td>
            <label>Classe:</label><br>
            <?php echo form_dropdown('classe', $dataClasse,0, 'id="classe" ') ?>
        </td>
        <td>
          <label>Disponibilidade:</label><br>
          <select name="disponibilidade">
            <option value="0">Disponível</option>
            <option value="1">Indisponível</option>
          </select>
        </td>
      </tr>

    </table>
    <div class="areaBotoesFiltro">
      <input type="submit" value="Consultar" class="botao"/>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="resultado" id="resultadoImplantes">
    <table class="tabelaResultado">
      <tr class="first">
        <th>Código</th>
        <th>Nome</th>
        <th>Fabricante</th>
        <th>Classe</th>
        <th>Valor Unitário</th>
        <th>Data de Entrada	</th>
        <th>Paciente</th>
      </tr>
      <?php
          if(sizeof($implantes) > 0)
          {
            foreach ($implantes as $implante )
            {
              $dataId = array(
                      'name'          => 'id',
                      'class'         => 'id',
                      'type'          => 'hidden',
                      'value'         => $implante->Impl_Id
              );
              echo '<tr class="linhaResultado">';
              echo form_input($dataId);
              echo '<td>'.$implante->Impl_Cod.'</td>';
              echo '<td>'.$implante->Impl_Desc.'</td>';
              echo '<td>'.$implante->Impl_Fabr.'</td>';
              echo '<td>'.$dataClasse[$implante->classe_id].'</td>';
              echo '<td>'.$implante->Impl_Valor.'</td>';
              echo '<td>'.date("d/m/Y", strtotime($implante->Impl_DataEnt)).'</td>';
              echo '<td>'.$implante->Pc_CPF.'</td>';
              echo '</tr>';
            }
          }

       ?>
    </table

    </ol>

  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url("cadastroImplante");?>"><input type="button" class="botao" value="Novo Implante"></a>
    <a href="<?php echo site_url("sistema");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
