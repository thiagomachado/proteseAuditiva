<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("andamentoPaciente_edicao_data.php");
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
            <label>Carteira Nacional de Saúde(CNS):</label><br>
            <?php echo form_input($dataCNS); ?>
          </td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Solicitações</legend>
      <table class="tabelaPDF">
        <tr>
          <td>Procedimento:</td>
          <td>Confirmado:</td>
          <td>Descrição:</td>
        </tr>
      <?php
          foreach ($itens as $item)
          {
            echo
            '
              <tr>
                <td>'.$dataProcedimentos[$item->Isolic_item_id].'</td>
                <td>'.$item->Isolic_quantidade.'</td>
                <td></td>
              </tr>
            ';
          }
       ?>
     </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Consultas</legend>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Observações Gerais</legend>
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
    $("#formAndamentoPaciente").on('submit', function(event) {
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
