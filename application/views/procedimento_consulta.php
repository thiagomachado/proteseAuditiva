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
        <th>Valor Unitário</th>
      </tr>
      <?php
          if(sizeof($procedimentos) > 0)
          {
            foreach ($procedimentos as $procedimento )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$procedimento->Proc_Codigo.'<input type="hidden" value="'.$procedimento->Proc_Id.'"</td>';
              echo '<td>'.$procedimento->Proc_Nome.'</td>';
              echo '<td>'.$procedimento->Proc_Valor.'</td>';
              echo '</tr>';
            }
          }

       ?>
    </table
  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url("cadastroProcedimento");?>"><input type="button" class="botao" value="Adicionar"></a>
    <a href="<?php echo site_url("sistema");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
