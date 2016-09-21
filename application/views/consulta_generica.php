<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
?>
<div class="conteudo">
  <div class="filtro">
    <?php
        //inclui dataset dos inputs
        include("consulta_generica_data.php");

        echo form_open($formAction, 'name="pacienteConsulta"');
        echo '<table class="formulario">';

        echo
        ('
        <tr>
          <td colspan="2">
            <label for="nomePaciente">Nome do Paciente<br></label>
            '.form_input($dataNomePaciente).'
          </td>
        </tr>

        ');

        echo
        ('
            <tr>
                <td>
                  <label for="cartaoSUS">Cartão SUS<br></label>
                  '.form_input($dataCartaoSus).'
                </td>

                  <td>
                    <label for="nProntuario">Nº do Prontuario<br></label>
                    '.form_input($dataProntuario).'
                  </td>
                </tr>
                </table>
                <div class="areaBotoesFiltro">
                  '.form_input($dataSubmit).'
                </div>
        ');
        echo form_close();
     ?>
  </div>
  <div class="resultado">
    <table class="tabelaResultado">
      <tr class="first">
        <th>CPF</th>
        <th>Nome</th>
        <th>Cartão SUS</th>
        <th>Prontuário</th>
      </tr>
      <?php
          if(sizeof($pacientes) > 0)
          {
            foreach ($pacientes as $paciente )
            {
              echo '<tr class="linhaResultado">';
              echo '<td>'.$paciente->Pc_CPF.'</td>';
              echo '<td>'.$paciente->Pc_Nome.'</td>';
              echo '<td>'.$paciente->Pc_CartaoSus.'</td>';
              echo '<td>'.$paciente->Pc_NumProntuario.'</td>';
              echo '</tr>';
            }
          }

       ?>
    </table

    </ol>

  </div>
  <div class="areaBotoesResultado">
    <?php
      if(isset($cadastro))
      {
        echo '<a href="'.site_url($cadastro).'"><input type="button" class="botao" style="width:auto;" value="'.$textoCadastro.'"></a>';
      }
    ?>

    <a href="<?php echo site_url("atendimento");?>"><input type="button" class="botao" value="Voltar"></a>
  </div>
</div>
