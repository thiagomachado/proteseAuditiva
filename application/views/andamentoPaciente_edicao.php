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
            <?php echo form_input($dataCNS); echo form_input($dataCPF);?>
          </td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Solicitações</legend>
      <table class="tabelaPDF">
        <tr class="titulo">
          <td>Procedimento:</td>
          <td>Quantidade:</td>
          <td>Confirmado:</td>
          <td>Descrição:</td>
        </tr>
      <?php
          foreach ($itens as $item)
          {
            $checked = '';
            if($item->Isolic_confirmado == 1)
            {
              $checked = 'checked';
            }
            echo
            '
              <tr>
                <td><input type="hidden" name="itens[]" readonly value="'.$item->Isolic_id.'"/>
                '.$dataProcedimentos[$item->Isolic_item_id].'</td>
                <td class="linhaCentralizada">'.$item->Isolic_quantidade.'</td>
                <td class="linhaCentralizada"><input type="checkbox" name="confirmados[]" value="1" '.$checked.'/></td>
                <td class="linhaCentralizada"><input type="text" maxlength=100 name="descricoes[]" size=45 value="'.$item->Isolic_descricao.'"/></td>
              </tr>
            ';
          }
       ?>
     </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Consultas</legend>
      <div id="divEditarConsultas">
        <?php
            if(sizeof($consultas)> 0)
            {
              echo "<table>";
              foreach ($consultas as $consulta)
              {
                //adiciona no value dos inputs o valor recuperado
                $dataConsultaEdicaoData["value"]      = $consulta->Consulta_data;
                $dataConsultaEdicaoDescricao["value"] = $consulta->Consulta_descricao;
                $dataConsultaEdicaoId["value"]        = $consulta->Consulta_id;
                echo
                "
                  <tr>
                    <td>".form_input($dataConsultaEdicaoId)."
                      <label>Data da Consulta:</label><br>
                      ".form_input($dataConsultaEdicaoData)."
                    </td>
                    <td>
                      <label>Descrição:</label><br>
                      ".form_input($dataConsultaEdicaoDescricao)."
                    </td>
                    <td>
                    </br>
                      <button onclick='atualizarLinkRemoverConsulta(".$consulta->Consulta_id."); mostrarModal(\"#modalExcluirConsulta\")'
                      class='remove linhaCentralizada'>-</button>
                    </td>
                  </tr>
                ";
              }
              echo "</table>";
            }
         ?>
      </div>
      <div id="divConsultas" >
        <div class="consulta">
          <table>
            <tr>
              <td>
                <label>Data da Consulta:</label><br>
                <?php echo form_input($dataConsultaData);?>
              </td>
              <td>
                <label>Descrição:</label><br>
                <?php echo form_input($dataConsultaDescricao); ?>
              </td>
            </tr>
          </table>
          <button class="clone">+</button>
          <button class="remove">-</button>
        </div>
      </div>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Observações Gerais</legend>
      <table>
        <tr>
          <td>Prótese Auditiva:<?php echo form_input($dataProtese); ?></td>
          <td>Implante Coclear:<?php echo form_input($dataImplante); ?></td>
        </tr>
        <tr>
          <td colspan="2">Observações:<br>
            <?php echo form_textarea($dataObs); ?>
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
        <a href="<?php echo site_url('andamentoPaciente');?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>SUCESSO!</h1>
        <p>O andamento do paciente foi atualizado.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url().'index.php/andamentoPaciente/';?>"><input type="button" class="botao" value="Concluir"/></a>
        <input onclick="esconderModal('#modalSucesso');location.reload()" class="botao" value="Continuar"/>
      </div>
    </div>

    <div class="modal" id="modalExcluirConsulta">
      <div class="textoModal">
        <h1>ATENÇÃO!</h1>
        <p>Deseja realmente excluir a consulta selecionada?</p>
      </div>

      <div class="botoesModal">
        <a id="botaoExcluirConsulta"><input type="button" class="botao" value="Sim"/></a>
        <input onclick="esconderModal('#modalExcluirConsulta')" class="botao" value="Não"/>
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
    var cloneIndex     = $(".consulta").length;
    var numberOfClones = $(".consulta").length;

    function clone()
    {
      event.preventDefault();
      $(this).parents(".consulta").clone()
          .appendTo("#divConsultas")
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
        $(this).parents(".consulta").remove();
        numberOfClones --;
      }
    }
    $(".clone").on("click", clone);

    $(".remove").on("click", remove);

    function atualizarLinkRemoverConsulta(idConsulta)
    {
      event.preventDefault();
      var link = "<?php echo site_url('excluirConsulta');?>/"
      $('#botaoExcluirConsulta').attr("href", link + idConsulta);
    }

</script>



<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formAndamentoPaciente").on('submit', function(event) {
        event.preventDefault();
        var confirmados              = [];
        var descricoes               = [];
        var itens                    = [];
        var consultaEdicaoDatas      = [];
        var consultaEdicaoDescricoes = [];
        var consultaEdicaoIds        = [];
        var consultaDatas            = [];
        var consultaDescricoes       = [];

        //montando vetor com os itens da solicitação a serem editados
        $("input[name='confirmados[]']").each(function()
        {
          if($(this).prop("checked"))
          {
            confirmados.push(1);
          }
          else
          {
            confirmados.push(0);
          }
        });

        $("input[name='descricoes[]']").each(function()
        {
            descricoes.push($(this).val());
        });

        $("input[name='itens[]']").each(function()
        {
            itens.push($(this).val());
        });

        //Montando vetor com as consultas a serem editadas
        $("input[name='consultaEdicaoId[]']").each(function()
        {
            consultaEdicaoIds.push($(this).val());
        });

        $("input[name='consultaEdicaoDescricao[]']").each(function()
        {
            consultaEdicaoDescricoes.push($(this).val());
        });

        $("input[name='consultaEdicaoData[]']").each(function()
        {
            consultaEdicaoDatas.push($(this).val());
        });

        //montando vetor com as consultas a serem inseridas
        $("input[name='consultaDescricao[]']").each(function()
        {
            consultaDescricoes.push($(this).val());
        });

        $("input[name='consultaData[]']").each(function()
        {
            consultaDatas.push($(this).val());
        });

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/atualizarAndamentoPaciente",
            dataType: 'json',
            data:
            {
              confirmados:              confirmados,
              descricoes:               descricoes,
              itens:                    itens,
              consultaEdicaoIds:        consultaEdicaoIds,
              consultaEdicaoDescricoes: consultaEdicaoDescricoes,
              consultaEdicaoDatas:      consultaEdicaoDatas,
              consultaDatas:            consultaDatas,
              consultaDescricoes:       consultaDescricoes,
              Andamento_protese:        $('#protese').val(),
              Andamento_implante:       $('#implante').val(),
              Andamento_obs:            $('#obs').val(),
              Pc_CPF:                   $('#cpfHidden').val()
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
