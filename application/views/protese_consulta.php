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
          if(sizeof($proteses) > 0)
          {
            foreach ($proteses as $protese )
            {
              $dataId = array(
                      'name'          => 'id',
                      'class'         => 'id',
                      'type'          => 'hidden',
                      'value'         => $protese->Prot_Id
              );
              echo '<tr class="linhaResultado">';
              echo form_input($dataId);
              echo '<td>'.$protese->Prot_Cod.'</td>';
              echo '<td>'.$protese->Prot_Nome.'</td>';
              echo '<td>'.$protese->Prot_Fabricante.'</td>';
              echo '<td>'.$protese->Prot_Classe.'</td>';
              echo '<td>'.$protese->Prot_Valor.'</td>';
              echo '<td>'.date("d/m/Y", strtotime($protese->Prot_DataEntrada)).'</td>';
              echo '<td>'.$protese->Pc_CPF.'</td>';
              echo '</tr>';
            }
          }

       ?>
    </table>

  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url("cadastroProtese");?>"><input type="button" class="botao" value="Nova Prótese"></a>
    <a href="<?php echo site_url("sistema");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
