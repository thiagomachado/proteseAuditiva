<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("protese_edicao_data.php");
?>
<div class="conteudo">
  <?php
    echo form_open('',$data_form);
    echo form_input($dataId);
  ?>
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
            <?php echo form_input($dataClasse); ?>
          </td>
          <td>
            <label>Data de Entrada*:</label><br>
            <?php echo form_input($dataDataEntrada); ?>
          </td>
        </tr>
      </table>
    </fieldset>
    <?php 
        if(isset($paciente))
        {
            echo '<fieldset class="secaoFormulario">
                    <legend>Paciente Proprietário</legend>
                    <table>
                        <tr>
                            <td>Nome:<br><input type="text" size=60 disabled value="'.$paciente->Pc_Nome.'"/></td>
                            <td>CPF:<br><input type="text" size=30 disabled value="'.$paciente->Pc_CPF.'"/></td>
                        </tr>
                    </table>
                  </fieldset>';
        }
    
    ?>

  </div>
  <div class="areaBotoesFormulario">
    <?php echo form_submit($dataSubmit) ?>
    <input class="botao" type="button" onclick="mostrarModal('#modalSairSemSalvar')" value="Cancelar"/>
    <?php
        if(isset($paciente))
        {
            echo '<input class="botao" style="width:auto;" type="button" onclick="mostrarModal(\'#modalRemover\')" value="Remover do Paciente"/>';
        }
    ?>
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
      
    <div class="modal" id="modalRemover">
      <div class="textoModal">
        <h1>REMOVER</h1>
        <p>Deseja remover a prótese do paciente?</p>
      </div>
      <div class="botoesModal">
          <input type="button" onclick="removerProtesePaciente()" class="botao" value="Sim"/>
        <input class="botao" type="button" onclick="esconderModal('#modalRemover')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>A prótese foi alterada.</p>
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
            url: "<?php echo base_url(); ?>" + "index.php/editarProtese",
            dataType: 'json',
            data:
            {
              Prot_Id:             $("#id").val(),
              Prot_Nome:           $("#nomeItem").val(),
              Prot_Fabricante:     $("#fabricante").val(),
              Prot_Classe:         $("#classe").val(),
              Prot_Valor:          $("#valor").val(),
              Prot_DataEntrada:    $("#dataEntrada").val(),
              Prot_Cod:            $("#codigo").val()
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

function removerProtesePaciente()
{
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/editarProtese",
            dataType: 'json',
            data:
            {
              Prot_Id: $("#id").val(),
              Prot_Nome:           $("#nomeItem").val(),
              Prot_Fabricante:     $("#fabricante").val(),
              Prot_Classe:         $("#classe").val(),
              Prot_Valor:          $("#valor").val(),
              Prot_DataEntrada:    $("#dataEntrada").val(),
              Pc_CPF:              '',
              Prot_Cod:            $("#codigo").val()
            },
            success: function(res)
            {
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
              mostrarModal('#modalErro');
              console.log(xhr.status);
              console.log(thrownError);
            }

        });
}
</script>
