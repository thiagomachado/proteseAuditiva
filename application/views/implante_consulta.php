<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
?>
<div class="conteudo">
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
              echo '<td>'.$implante->Impl_Clss.'</td>';
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
