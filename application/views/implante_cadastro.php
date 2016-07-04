<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("implante_cadastro_data.php");
?>
<div class="conteudo">
  <?php echo form_open('',$data_form); ?>
  <div class="areaFormulario">
    <fieldset class="secaoFormulario">
      <legend>Dados do Produto</legend>
      <table>
        <tr>
          <td>
            <label>Codigo*:</label><br>
            <?php echo form_input($dataCodigo); ?>
          </td>
          <td>
            <label>Nome do Item*:</label><br>
            <?php echo form_input($dataNomeItem); ?>
          </td>
          <td>
            <label>Fabricante*:</label><br>
            <?php echo form_input($dataFabricante); ?>
          </td>

        </tr>

        <tr>
          <td>
            <label>Classe*:</label><br>
            <?php echo form_input($dataClasse); ?>
          </td>
          <td>
            <label>Valor*:</label><br>
            <?php echo form_input($dataValor); ?>
          </td>
          <td>
            <label>Data de Entrada*:</label><br>
            <?php echo form_input($dataDataEntrada); ?>
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
        <a href="<?php echo site_url('estoqueImplantes');?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>O implante foi cadastrado.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo site_url('estoqueImplantes');?>"><input class="botao" value="Concluir"/></a>
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
    $("#formImplante").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/cadastrarImplante",
            dataType: 'json',
            data:
            {
              Impl_Cod:      $("#codigo").val(),
              Impl_Desc:     $("#nomeItem").val(),
              Impl_Fabr:     $("#fabricante").val(),
              Impl_Clss:     $("#classe").val(),
              Impl_Valor:    $("#valor").val(),
              Impl_DataEnt:  $("#dataEntrada").val()
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
