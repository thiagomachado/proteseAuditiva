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

    <fieldset class="secaoFormulario" <?php if(sizeof($solicitacoes)<= 0){echo 'style="display:none;"';}?>>
      <legend>Solicitações</legend>

      <?php
          foreach ($solicitacoes as $solicitacao)
          {
              $procedimentoPrincipal = "";
              foreach ($procedimentos as $procedimento )
              {
                if($solicitacao->Proc_Id == $procedimento->Proc_Id)
                {
                  $procedimentoPrincipal = $procedimento;
                }
              }
              $marcarProcedimentoPrincipal = '';
              if($solicitacao->Proc_Confirmado == 1)
              {
                $marcarProcedimentoPrincipal = 'checked';
              }
              echo '<fieldset class="secaoFormulario"> <legend>'.date("d/m/Y", strtotime($solicitacao->Solic_data)).'</legend>';
              echo '<table>
                      <tr>
                        <td>
                          <input type="hidden" name="solicitacoes[]" readonly value="'.$solicitacao->Solic_id.'"/>
                          <label class="titulo">Procedimento Principal:</label></br>
                          '.$procedimentoPrincipal->Proc_Nome.'
                        </td>
                        <td>
                          <label class="titulo">Código:</label></br>
                          '.$procedimentoPrincipal->Proc_Codigo.'
                        </td>
                        <td class="linhaCentralizada">
                          <label class="titulo">Quantidade:</label></br>
                          '.$solicitacao->Proc_Quantidade.'
                        </td>
                        <td class="linhaCentralizada">
                          <label class="titulo">Confirmado:</label></br>
                          <input type="checkbox" name="confirmadosPrincipais[]" value="1" '.$marcarProcedimentoPrincipal.'/>
                        </td>
                        <td>
                          <label class="titulo">Descrição:</label></br>
                          <input type="text" maxlength=100 name="descricoesPrincipais[]" size=45 value="'.$solicitacao->Proc_Descricao.'"/>
                        </td>
                      </tr>
                    </table>
              ';

              $itensSecundarios = new SplObjectStorage;
              foreach ($itens as $item)
              {
                if($item->Solic_id == $solicitacao->Solic_id)
                {
                  $itensSecundarios->attach($item);
                }
              }
              if(sizeof($itensSecundarios)> 0)
              {
                echo '<fieldset class="secaoFormulario"><legend>Procedimentos Secundários</legend>
                <table class="tabelaPDF">
                  <tr class="titulo">
                    <td>Código - Nome:</td>
                    <td>Quantidade:</td>
                    <td>Confirmado:</td>
                    <td>Descrição:</td>
                  </tr>
                ';
                foreach ($itensSecundarios as $itemSecundario)
                {
                  $checked = '';
                  if($itemSecundario->Isolic_confirmado == 1)
                  {
                    $checked = 'checked';
                  }
                  echo
                  '
                    <tr>
                      <td><input type="hidden" name="itens[]" readonly value="'.$itemSecundario->Isolic_id.'"/>
                      '.$dataProcedimentos[$itemSecundario->Isolic_item_id].'</td>
                      <td class="linhaCentralizada">'.$itemSecundario->Isolic_quantidade.'</td>
                      <td class="linhaCentralizada"><input type="checkbox" name="confirmados[]" value="1" '.$checked.'/></td>
                      <td class="linhaCentralizada">
                        <input type="text" maxlength=100 name="descricoes[]" size=45 value="'.$itemSecundario->Isolic_descricao.'"/>
                      </td>
                    </tr>
                  ';
                }
                echo '</table> </fieldset>';
              }


              echo '</fieldset>';
          }echo '</fieldset>';
      ?>

    <?php
      if(sizeof($protesesPaciente)>0)
      {
        echo '
          <fieldset class="secaoFormulario">
              <legend>Próteses do Paciente:</legend>
              <table class="tabelaResultado" id="tabelaResultadoProtese">
                <tr>
                  <th>Código</th>
                  <th>Nome</th>
                  <th>Fabricante</th>
                  <th>Classe</th>
                  <th>Data da Retirada</th>
                </tr>';
        foreach ($protesesPaciente as $protese)
        {
          $dataId = array(
                  'name'          => 'id',
                  'class'         => 'id',
                  'type'          => 'hidden',
                  'value'         => $protese->Prot_Id
          );
          echo '<tr class="linhaResultado">';
          echo form_input($dataId);
          echo '<td>'.$protese->Prot_Cod.'</td>';
          echo '<td>'.$protese->Prot_Nome.'</td>';
          echo '<td>'.$protese->Prot_Fabricante.'</td>';
          echo '<td>'.$dataClasse[$protese->classe_id].'</td>';
          echo '<td>'.date("d/m/Y", strtotime($protese->Prot_DataEntrada)).'</td>';
          echo '</tr>';
        }

        echo '
              </table>
          </fieldset>
        ';
      }


      if(sizeof($implantesPaciente)> 0)
      {
        echo '
          <fieldset class="secaoFormulario">
              <legend>Implantes do Paciente:</legend>
              <table class="tabelaResultado" id="tabelaResultadoImplante">
                <tr>
                  <th>Código</th>
                  <th>Nome</th>
                  <th>Fabricante</th>
                  <th>Classe</th>
                  <th>Data da Retirada</th>
                </tr>';
        foreach ($implantesPaciente as $implante)
        {
          $dataId = array(
                  'name'          => 'id',
                  'class'         => 'id',
                  'type'          => 'hidden',
                  'value'         => $implante->Impl_Id
          );
          echo '<tr class="linhaResultado">';
          echo form_input($dataId);
          echo'
            <td>'.$implante->Impl_Cod.'</td>
            <td>'.$implante->Impl_Desc.'</td>
            <td>'.$implante->Impl_Fabr.'</td>
            <td>'.$dataClasse[$implante->classe_id].'</td>
            <td>'.date_format(date_create($implante->Impl_DataSaida), 'd/m/Y').'</td>

          </tr></a>';
        }

        echo '
              </table>
          </fieldset>
        ';
      }
     ?>
    <fieldset class="secaoFormulario" <?php if(sizeof($caracterizacoes) <= 0){echo 'style="display:none;"';} ?>>
        <legend>Dados Audilógicos</legend>
        <table class="tabelaResultado" id="tabelaResultadoDadosAudiologicos">
            <tr class="first">
                <th>Nº dos Dados Audiológicos </th>
                <th>Data</th>
            </tr>
            <?php
            if(sizeof($caracterizacoes) > 0)
            {
                foreach ($caracterizacoes as $caracterizacao )
                {
                    echo '<tr class="linhaResultado">';
                    echo '<td>'.$caracterizacao->Caract_Numero.'</td>';
                    echo '<td>'.date_format(date_create($caracterizacao->Caract_Data), 'd/m/Y').'</td>';
                    echo '</tr>';
                }
            }

            ?>
        </table>
    </fieldset>


    <fieldset class="secaoFormulario">
      <legend>Observações Gerais</legend>
      <table>
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



<script>
$(document).ready(function()
{
	$('#tabelaResultadoProtese tr:gt(0)').click(function()
    {
  		var id = $(this).children('.id').val();
  		window.location.href = "/proteseAuditiva/index.php/edicaoProtese/"+id;
		})
  $('#tabelaResultadoImplante tr:gt(0)').click(function()
    {
  		var id = $(this).children('.id').val();
  		window.location.href = "/proteseAuditiva/index.php/edicaoImplante/"+id;
		})
    $('#tabelaResultadoDadosAudiologicos tr:gt(0)').click(function()
    {
        var id =  $(this).children('td:eq(0)').text();
        window.location.href = "/proteseAuditiva/index.php/edicaoCaracterizacao/"+id;
    })

}).attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);
</script>

<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formAndamentoPaciente").on('submit', function(event) {
        event.preventDefault();
        var confirmados              = [];
        var descricoes               = [];
        var itens                    = [];
        var solicitacoes             = [];
        var confirmadosPrincipais    = [];
        var descricoesPrincipais     = [];

        //montando vetor com as solicitações a serem editadas
        $("input[name='solicitacoes[]']").each(function()
        {
          solicitacoes.push($(this).val());
        });
        $("input[name='confirmadosPrincipais[]']").each(function()
        {
          if($(this).prop("checked"))
          {
            confirmadosPrincipais.push(1);
          }
          else
          {
            confirmadosPrincipais.push(0);
          }
        });
        $("input[name='descricoesPrincipais[]']").each(function()
        {
            descricoesPrincipais.push($(this).val());
        });

        //montando vetor com os itens da solicitação (Procedimentos Secundarios) a serem editados
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


        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/atualizarAndamentoPaciente",
            dataType: 'json',
            data:
            {
              solicitacoes:             solicitacoes,
              confirmadosPrincipais:    confirmadosPrincipais,
              descricoesPrincipais:     descricoesPrincipais,
              confirmados:              confirmados,
              descricoes:               descricoes,
              itens:                    itens,
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
