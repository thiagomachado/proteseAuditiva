<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("procedimento_edicao_data.php");
?>
<div class="conteudo">
  <?php
    echo form_open('',$data_form);
    echo form_input($dataId);
  ?>
  <div class="areaFormulario">
    <fieldset class="secaoFormulario">
      <legend>Dados do Procedimento</legend>
      <table>
        <tr>
          <td colspan="3">
            <label>Nome*:</label><br>
            <?php echo form_input($dataNome); ?>
          </td>
          <td colspan="2">
            <label>Código*:</label><br>
            <?php echo form_input($dataCodigo); ?>
          </td>
          <td>
            <label>Valor*:</label><br>
            <?php echo form_input($dataValor); ?>
          </td>
        </tr>
      </table>
    </fieldset>

  </div>
  <div class="areaBotoesFormulario">
    <?php echo form_submit($dataSubmit) ?>
    <input class="botao" type="button" onclick="mostrarModal('#modalSairSemSalvar')" value="Cancelar"/>
  </div>

  <div class="fundoModal" id="fundoModal">

    <div class="modal" id="modalSairSemSalvar">
      <div class="textoModal">
        <h1>CANCELAR</h1>
        <p>Deseja sair sem salvar?</p>
      </div>
      <div class="botoesModal">
        <a href="<?php echo site_url('estoqueProteses');?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>O procedimento foi alterado.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo site_url('procedimento');?>"><input class="botao" value="Concluir"/></a>
      </div>
    </div>

    <div class="modal" id="modalErro">
      <div class="textoModal">
        <h1>Erro!</h1>
        <p>Houve um erro inesperado.</p>
      </div>

      <div class="botoesModal">
        <input class="botao" onclick="esconderModal('#modalErro')" value="Ok"/>
      </div>
    </div>
  </div>

<?php echo form_close(); ?>
</div>

<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formProcedimento").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/editarProcedimento",
            dataType: 'json',
            data:
            {
              Proc_Nome:    $("#nome").val(),
              Proc_Codigo:  $("#codigo").val(),
              Proc_Valor:   $("#valor").val(),
              Proc_Id:      $("#id").val()
            },
            success: function(res)
            {
                mostrarModal('#modalSucesso');
                if (res)
                {
                  console.log(res);
                }
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
              mostrarModal('#modalErro');
              console.log(xhr.status);
              console.log(thrownError);
            }

        });
    });
});
</script>
