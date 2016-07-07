<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("solicitacao_edicao_data.php");
?>
<div class="conteudo">
  <?php
    echo form_open('', $data_form);
    echo form_input($dataIdSolicitacao);
  ?>
  <div class="areaFormulario">
    <fieldset class="secaoFormulario">
      <legend>Procedimento Principal</legend>
      <div id="divProcedimentosPrincipais" >
        <div class="procedimentoPrincipal">
          <table>
            <tr>
              <td>
                <label>Procedimento Principal Solicitado*:</label><br>
                <?php echo form_dropdown('procPrincipal', $dataProcPrincipais,$solicitacao->Proc_Id,'id="procPrincipal" required');?>
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

            <?php
              foreach ($itens as $item )
              {
                $dataQuantidade["value"] = $item->Isolic_quantidade;
                $dataIdItem["value"]     = $item->Isolic_id;
                echo
                '
                  <tr>
                    <td>
                    '.form_input($dataIdItem).'
                      <label>Procedimento Solicitado*:</label><br>
                      '.form_dropdown('procedimentos[]', $dataProcSecundarios, $item->Isolic_item_id).'
                    </td>
                    <td>
                      <label>Quantidade*:</label><br>
                      '.form_input($dataQuantidade).'
                    </td>
                  </tr>
                ';
              }
            ?>

          </table>
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
              <label>Profissional responsável :</label><br>
              <?php echo form_dropdown('profissional', $dataProfissional, $solicitacao->Solic_CPF_Profissional, 'id = "profissional"'); ?>
            </td>
          </tr>
        </table>
      </fieldset>

  </div>
  <div class="areaBotoesFormulario">
    <?php echo form_submit($dataSubmit) ?>
    <a target="_blank" href="<?php $emitirLaudo ='emitirLaudoSolicitacao/'.$solicitacao->Solic_id;  echo site_url($emitirLaudo);?>"><input class="botao" type="button" value="Emitir PDF"/></a>
    <input class="botao" type="button" onclick="mostrarModal('#modalSairSemSalvar')" value="Cancelar"/>
  </div>

  <div class="fundoModal" id="fundoModal">

    <div class="modal" id="modalSairSemSalvar">
      <div class="textoModal">
        <h1>CANCELAR</h1>
        <p>Deseja sair sem salvar?</p>
      </div>
      <div class="botoesModal">
        <a href="<?php echo site_url('consultaSolicitacao/'.$solicitacao->Pc_CPF);?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>A solicitação foi editada.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url().'index.php/consultaSolicitacao/';?>"><input type="button" class="botao" value="Concluir"/></a>
        <input class="botao" onclick="esconderModal('#modalSucesso'),location.reload()" value="Continuar"/>
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
    $("#formSolicitacao").on('submit', function(event) {
        event.preventDefault();
        var procedimentos = [];
        var quantidades   = [];
        var idItens       = [];

        $("select[name='procedimentos[]']").each(function()
        {
            procedimentos.push($(this).val());
        });

        $("input[name='quantidade[]']").each(function()
        {
            quantidades.push($(this).val());
        });

        $("input[name='idItem[]']").each(function()
        {
            idItens.push($(this).val());
        });

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/editarSolicitacao",
            dataType: 'json',
            data:
            {
              Solic_id:              $("#idSolicitacao").val(),
              Solic_descricao:       $("#diagnostico").val(),
              Solic_cid10principal:  $("#cid10Principal").val(),
              Solic_cid10sec:        $("#cid10Sec").val(),
              Solic_cid10causas:     $("#cid10Causas").val(),
              Solic_obs:             $("#obs").val(),
              Solic_CPF_Profissional:$("#profissional").val(),
              Proc_Id:               $("#procPrincipal").val(),
              Proc_Quantidade:       $("#quantidadePrincipal").val(),
              procedimentos:         procedimentos,
              quantidades:           quantidades,
              idItens:               idItens
            },
            success: function (res)
            {
                mostrarModal('#modalSucesso');
                if(res)
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
