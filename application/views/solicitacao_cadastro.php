<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("solicitacao_cadastro_data.php");
?>
<div class="conteudo">
  <?php echo form_open('', $data_form); ?>
  <div class="areaFormulario">
    <fieldset class="secaoFormulario">
      <legend>Paciente</legend>
      <table>
        <tr>
          <td >
            <label>Nome:</label><br>
            <?php echo form_input($dataNomePaciente); ?>
          </td>
          <td >
            <label>CPF:</label><br>
            <?php echo form_input($dataCPF); ?>
          </td>
          <td >
            <label>Data de Nascimento:</label><br>
            <?php echo form_input($dataDataNascimento); ?>
          </td>

          <td >
            <label>Nº Prontuário:</label><br>
            <?php echo form_input($dataProntuario); ?>
          </td>
        </tr>
      </table>
      </fieldset>

      <fieldset class="secaoFormulario">
        <legend>Procedimento Principal</legend>
        <div id="divProcedimentosPrincipais" >
          <div class="procedimentoPrincipal">
            <table>
              <tr>
                <td>
                  <label>Procedimento Principal Solicitado*:</label><br>
                  <?php echo form_dropdown('procPrincipal', $dataProcPrincipais,'','id="procPrincipal" required');?>
                </td>
                <td>
                  <label>Quantidade*:</label><br>
                  <?php echo form_input($dataQuantidadePrincipal); ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </fieldset>


      <fieldset class="secaoFormulario">
        <legend>Procedimentos Secundários</legend>
        <div id="divProcedimentos" >
          <div class="procedimento">
            <table>
              <tr>
                <td>
                  <label>Procedimento Solicitado*:</label><br>
                  <?php echo form_dropdown('procedimentos[]', $dataProcSecundarios);?>
                </td>
                <td>
                  <label>Quantidade*:</label><br>
                  <?php echo form_input($dataQuantidade); ?>
                </td>
              </tr>
            </table>
            <button class="clone">+</button>
            <button class="remove">-</button>
          </div>
        </div>
      </fieldset>

      <fieldset class="secaoFormulario">
        <legend>Justificativa do(s) procedimento(s) solicitado(s)</legend>
        <table>
          <tr>
            <td >
              <label>Descrição do Diagnóstico*:</label><br>
              <?php echo form_input($dataDiagnostico); ?>
            </td>
            <td >
              <label>CID 10 Principal:</label><br>
              <?php echo form_input($dataCid10Principal); ?>
            </td>
            <td >
              <label>CID 10 Secundário:</label><br>
              <?php echo form_input($dataCid10Sec); ?>
            </td>
            <td >
              <label>CID 10 Causas Associadas:</label><br>
              <?php echo form_input($dataCid10Causas); ?>
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <label>Obs.:</label><br>
              <?php echo form_textarea($dataObs); ?>
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <label>Selecione o profissional responsável :</label><br>
              <?php echo form_dropdown('profissional', $dataProfissional, '', 'id = "profissional"'); ?>
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
        <a href="<?php echo site_url('cadastroSolicitacao');?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>A solicitação foi cadastrada.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url().'index.php/consultaSolicitacao/';?>"><input type="button" class="botao" value="Concluir"/></a>
        <a id='emitirLaudo' target="_blank"?><input class="botao" value="Emitir PDF"/></a>
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
    var regex          = /^(.+?)(\d+)$/i;
    var cloneIndex     = $(".procedimento").length;
    var numberOfClones = $(".procedimento").length;

    function clone()
    {
      event.preventDefault();
      $(this).parents(".procedimento").clone()
          .appendTo("#divProcedimentos")
          .attr("id", "clonedInput" +  cloneIndex)
          .each(function()
          {
              var id = this.id || "";
              var match = id.match(regex) || [];
              if (match.length == 3)
              {
                  this.id = match[1] + (cloneIndex);
              }
          })
          .on('click', 'button.clone', clone)
          .on('click', 'button.remove', remove);
      cloneIndex++;
      numberOfClones++;
    }
    function remove()
    {
      event.preventDefault();
      if (numberOfClones > 1)
      {
        $(this).parents(".procedimento").remove();
        numberOfClones --;
      }
    }
    $(".clone").on("click", clone);

    $(".remove").on("click", remove);
</script>



<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formSolicitacao").on('submit', function(event) {
        event.preventDefault();
        var procedimentos = [];
        var quantidades   = [];

        $("select[name='procedimentos[]']").each(function()
        {
            procedimentos.push($(this).val());
        });

        $("input[name='quantidade[]']").each(function()
        {
            quantidades.push($(this).val());
        });

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/cadastrarSolicitacao",
            dataType: 'json',
            data:
            {
              Pc_CPF:                $("#cpf").val(),
              Solic_descricao:       $("#diagnostico").val(),
              Solic_cid10principal:  $("#cid10Principal").val(),
              Solic_cid10sec:        $("#cid10Sec").val(),
              Solic_cid10causas:     $("#cid10Causas").val(),
              Solic_obs:             $("#obs").val(),
              Solic_CPF_Profissional:$("#profissional").val(),
              Proc_Id:               $("#procPrincipal").val(),
              Proc_Quantidade:       $("#quantidadePrincipal").val(),
              procedimentos:         procedimentos,
              quantidades:           quantidades
            },
            success: function(res)
            {
                mostrarModal('#modalSucesso');
                if (res)
                {
                  var urlLaudoPDF = "<?php echo site_url('emitirLaudoSolicitacao');?>/"+res;
                  $("#emitirLaudo").attr("href", urlLaudoPDF);
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
