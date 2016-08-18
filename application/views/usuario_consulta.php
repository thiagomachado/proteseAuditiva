<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
?>
<div class="conteudo">
  <div class="filtro">
    <?php

        echo form_open('usuario/', 'name="usuarioConsulta"');
        echo '<table class="formulario">';

        echo
        ('
        <tr>
          <td colspan="2">
            <label for="usuarioNome">Nome do Usuário</label>
            <input name="usuarioNome" size="62">
          </td>
        </tr>

        ');

        echo
        ('
            <tr>
                <td>
                  <label for="usuarioEmail">E-mail<br></label>
                  <input name="usuarioEmail" size="30">
                </td>

                  <td>
                    <label for="nivel">Nivel<br></label>
                     '.form_dropdown("nivel",$niveis,1,"id=\'nivel\' required").'
                  </td>
                </tr>
                </table>
                <div class="areaBotoesFiltro">
                <input type="submit" id="btnConsultarUsuario" value="Consultar" class="botao"> 
                </div>
        ');
        echo form_close();
     ?>
  </div>
  <div class="resultado">
    <table class="tabelaResultado">
      <tr class="first">
        <th>Nome</th>
        <th>E-mail</th>
        <th>Nivel</th>
      </tr>
      <?php
        if(isset($usuarios))
        {
          if(sizeof($usuarios) > 0)
          {
            foreach ($usuarios as $usuario )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$usuario->Us_Nome.'<input type="hidden" value="'.$usuario->Us_CPF.'"/></td>';
              echo '<td>'.$usuario->Us_email.'</td>';
              echo '<td>'.$usuario->Nvl_Desc.'</td>';
              echo '</tr>';
            }
          }
        }
       ?>
    </table

    </ol>

  </div>
  <div class="areaBotoesResultado">
    <a href="<?php echo site_url('cadastroUsuario');?>"><input type="button" class="botao" value="Novo Usuário"></a>
    <a href="<?php echo site_url("sistema");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
