<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("protese_cadastro_data.php");
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
            <label>Valor*:</label><br>
            <?php echo form_input($dataValor); ?>
          </td>


        </tr>

        <tr>
          <td>
            <label>Fabricante*:</label><br>
            <?php echo form_input($dataFabricante); ?>
          </td>
          <td>
            <label>Classe*:</label><br>
            <?php echo form_dropdown('classe', $dataClasse,1, 'id="classe" required'); ?>
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
        <a href="<?php echo site_url('estoqueProteses');?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>A prótese foi cadastrada.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo site_url('estoqueProteses');?>"><input class="botao" value="Concluir"/></a>
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
    $("#formProtese").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/cadastrarProtese",
            dataType: 'json',
            data:
            {
              Prot_Cod:            $("#codigo").val(),
              Prot_Nome:           $("#nomeItem").val(),
              Prot_Fabricante:     $("#fabricante").val(),
              classe_id:           $("#classe").val(),
              Prot_Valor:          $("#valor").val(),
              Prot_DataEntrada:    $("#dataEntrada").val()
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
