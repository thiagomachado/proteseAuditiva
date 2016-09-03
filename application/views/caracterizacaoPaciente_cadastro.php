<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("caracterizacaoPaciente_cadastro_data.php");
?>

<div class="conteudo">
  <?php
    echo form_open('',$data_form);
    echo form_input($dataCPFHidden);
  ?>
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
        <tr>
          <td colspan="4">
            <label>Selecione o Profissional:</label><br>
            <?php echo form_dropdown('profissional', $dataProfissional, '', 'id = "profissional"'); ?>
          </td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Caracterização do Paciente</legend>
      <table class="tabelaCaracterizacao">
        <tr>
          <th colspan="2"></th>
          <th>250</th>
          <th>500</th>
          <th>1K</th>
          <th>2K</th>
          <th>3K</th>
          <th>4K</th>
          <th>6K</th>
          <th>8K</th>
        </tr>
        <tr>
          <td rowspan="2">OD</td>
          <td>VA</td>
          <td><?php echo form_input($dataOD_VA_250); ?></td>
          <td><?php echo form_input($dataOD_VA_500); ?></td>
          <td><?php echo form_input($dataOD_VA_1k); ?></td>
          <td><?php echo form_input($dataOD_VA_2k); ?></td>
          <td><?php echo form_input($dataOD_VA_3k); ?></td>
          <td><?php echo form_input($dataOD_VA_4k); ?></td>
          <td><?php echo form_input($dataOD_VA_6k); ?></td>
          <td><?php echo form_input($dataOD_VA_8k); ?></td>
        </tr>
        <tr>
          <td>VO</td>
          <td></td>
          <td><?php echo form_input($dataOD_VO_500); ?></td>
          <td><?php echo form_input($dataOD_VO_1k); ?></td>
          <td><?php echo form_input($dataOD_VO_2k); ?></td>
          <td><?php echo form_input($dataOD_VO_3k); ?></td>
          <td><?php echo form_input($dataOD_VO_4k); ?></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td rowspan="2">OE</td>
          <td>VA</td>
          <td><?php echo form_input($dataOE_VA_250); ?></td>
          <td><?php echo form_input($dataOE_VA_500); ?></td>
          <td><?php echo form_input($dataOE_VA_1k); ?></td>
          <td><?php echo form_input($dataOE_VA_2k); ?></td>
          <td><?php echo form_input($dataOE_VA_3k); ?></td>
          <td><?php echo form_input($dataOE_VA_4k); ?></td>
          <td><?php echo form_input($dataOE_VA_6k); ?></td>
          <td><?php echo form_input($dataOE_VA_8k); ?></td>
        </tr>
        <tr>
          <td>VO</td>
          <td></td>
          <td><?php echo form_input($dataOE_VO_500); ?></td>
          <td><?php echo form_input($dataOE_VO_1k); ?></td>
          <td><?php echo form_input($dataOE_VO_2k); ?></td>
          <td><?php echo form_input($dataOE_VO_3k); ?></td>
          <td><?php echo form_input($dataOE_VO_4k); ?></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Caracterização da Perda Auditiva</legend>
      <table>
        <tr>
          <td>Tipo de Perda Auditiva:</br><?php echo form_input($dataTipoPerdaAuditiva); ?></td>
        </tr>
        <tr>
          <td>Duração:</br><?php echo form_input($dataDuracao); ?></td>
        </tr>
        <tr>
          <td>Zumbido:</br><?php echo form_input($dataZumbido); ?></td>
        </tr>
        <tr>
          <td>Grau de Perda:</br><?php echo form_input($dataGrauPerda); ?></td>
        </tr>
        <tr>
          <td>Progressão:</br><?php echo form_input($dataProgressao); ?></td>
        </tr>
        <tr>
          <td>Configuração:</br><?php echo form_input($dataConfiguracao); ?></td>
        </tr>
        <tr>
          <td>Recrutamento:</br><?php echo form_input($dataRecrutamento); ?></td>
        </tr>
      </table>

      <label>Resultado dos Exames Complementares:</label>
      </br>
      <?php echo form_textarea($dataExamesComplementares); ?>
      </br>
      <table>
        <tr>
          <td>Candidato ao uso de AASI:</td>
          <td><?php echo form_dropdown('candidatoAASI',$dataOpcoesDropdown,'' ,'id ="candidatoAASI"'); ?></td>
          <td>Possível candidato ao uso de implante coclear:</td>
          <td><?php echo form_dropdown('candidatoImplante', $dataOpcoesDropdown,'' ,'id="candidatoImplante"'); ?></td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Histórico da Perda Auditiva*</legend>
      <?php echo form_textarea($dataHistoricoPerda); ?>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>AASI indicado</legend>
      <table>
        <tr>
          <td>Modelo:</td>
          <td><?php echo form_input($dataModeloAASI); ?></td>
        </tr>
        <tr>
          <td>Orelha:</td>
          <td><?php echo form_input($dataOrelhaAASI); ?></td>
        </tr>
      </table>
    </br>
      <table class="tabelaCaracterizacao">
        <tr>
          <th></th>
          <th>250</th>
          <th>500</th>
          <th>1K</th>
          <th>2K</th>
          <th>3K</th>
          <th>4K</th>
          <th>6K</th>
          <th>8K</th>
          <th>Percepção da fala</th>
        </tr>
        <tr>
          <td>Sem AASI</td>
          <td><?php echo form_input($dataSem_AASI_250); ?></td>
          <td><?php echo form_input($dataSem_AASI_500); ?></td>
          <td><?php echo form_input($dataSem_AASI_1k); ?></td>
          <td><?php echo form_input($dataSem_AASI_2k); ?></td>
          <td><?php echo form_input($dataSem_AASI_3k); ?></td>
          <td><?php echo form_input($dataSem_AASI_4k); ?></td>
          <td><?php echo form_input($dataSem_AASI_6k); ?></td>
          <td><?php echo form_input($dataSem_AASI_8k); ?></td>
          <td><?php echo form_input($dataSem_AASI_PercepcaoFala); ?></td>
        </tr>
        <tr>
          <td>AASI OD</td>
          <td><?php echo form_input($dataOD_AASI_250); ?></td>
          <td><?php echo form_input($dataOD_AASI_500); ?></td>
          <td><?php echo form_input($dataOD_AASI_1k); ?></td>
          <td><?php echo form_input($dataOD_AASI_2k); ?></td>
          <td><?php echo form_input($dataOD_AASI_3k); ?></td>
          <td><?php echo form_input($dataOD_AASI_4k); ?></td>
          <td><?php echo form_input($dataOD_AASI_6k); ?></td>
          <td><?php echo form_input($dataOD_AASI_8k); ?></td>
          <td><?php echo form_input($dataOD_AASI_PercepcaoFala); ?></td>
        </tr>
        <tr>
          <td>AASI OE</td>
          <td><?php echo form_input($dataOE_AASI_250); ?></td>
          <td><?php echo form_input($dataOE_AASI_500); ?></td>
          <td><?php echo form_input($dataOE_AASI_1k); ?></td>
          <td><?php echo form_input($dataOE_AASI_2k); ?></td>
          <td><?php echo form_input($dataOE_AASI_3k); ?></td>
          <td><?php echo form_input($dataOE_AASI_4k); ?></td>
          <td><?php echo form_input($dataOE_AASI_6k); ?></td>
          <td><?php echo form_input($dataOE_AASI_8k); ?></td>
          <td><?php echo form_input($dataOE_AASI_PercepcaoFala); ?></td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Observações</legend>
      <?php echo form_textarea($dataObs); ?>
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
        <a href="<?php echo base_url().'index.php/atendimento/';?>"><input class="botao" type="button" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>

    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>A caracterização do paciente foi cadastrada.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url().'index.php/consultaCaracterizacao/';?>"><input type="button" class="botao" value="Concluir"/></a>
        <a target="_blank" href="<?php $emitirLaudo ='emitirLaudo/'.$paciente->Pc_CPF;  echo site_url($emitirLaudo);?>"><input class="botao" value="Emitir PDF"/></a>
      </div>
    </div>

    <div class="modal" id="modalErro">
      <div class="textoModal">
        <h1>Erro!</h1>
        <p>Houve um erro inesperado.</p>
      </div>

      <div class="botoesModal">
        <input class="botao" onclick="esconderModal('#modalErro'),location.reload()" value="Ok"/>
      </div>
    </div>
  </div>

  <?php echo form_close(); ?>

</div>



<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formCaracterizacaoPaciente").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/cadastrarCaracterizacaoPaciente",
            dataType: 'json',
            data:
            {
              cpf:                       $("#cpfHidden").val(),
              Caract_Cpf_Profissional:   $('#profissional').val(),
              Caract_TipoPerda:          $("#tipoPerdaAuditiva").val(),
              Caract_GrauPerda:          $("#grauPerda").val(),
              Caract_Config:             $("#configuracao").val(),
              Caract_Duracao:            $("#duracao").val(),
              Caract_Progress:           $("#progressao").val(),
              Caract_Recrut:             $("#recrutamento").val(),
              Caract_Zumbido:            $("#zumbido").val(),
              Caract_ExamesCompl:        $("#examesComplementares").val(),
              Caract_AASI:               $('#candidatoAASI').val(),
              Caract_ImplCoclear:        $('#candidatoImplante').val(),
              Caract_HistPerdaAud:       $("#historicoPerda").val(),
              Caract_AASIModelo:         $('#modeloAASI').val(),
              Caract_AASIOrelha:         $("#orelhaAASI" ).val(),
              Caract_Obs:                $("#obs").val(),
              OD_VA_250:                 $("#oD_VA_250").val(),
              OD_VA_500:                 $("#oD_VA_500").val(),
              OD_VA_1k:                  $("#oD_VA_1k").val(),
              OD_VA_2k:                  $("#oD_VA_2k").val(),
              OD_VA_3k:                  $("#oD_VA_3k").val(),
              OD_VA_4k:                  $("#oD_VA_4k").val(),
              OD_VA_6k:                  $("#oD_VA_6k").val(),
              OD_VA_8k:                  $("#oD_VA_8k").val(),
              OD_VO_500:                 $("#oD_VO_500").val(),
              OD_VO_1k:                  $("#oD_VO_1k").val(),
              OD_VO_2k:                  $("#oD_VO_2k").val(),
              OD_VO_3k:                  $("#oD_VO_3k").val(),
              OD_VO_4k:                  $("#oD_VO_4k").val(),
              OE_VA_250:                 $("#oE_VA_250").val(),
              OE_VA_500:                 $("#oE_VA_500").val(),
              OE_VA_1k:                  $("#oE_VA_1k").val(),
              OE_VA_2k:                  $("#oE_VA_2k").val(),
              OE_VA_3k:                  $("#oE_VA_3k").val(),
              OE_VA_4k:                  $("#oE_VA_4k").val(),
              OE_VA_6k:                  $("#oE_VA_6k").val(),
              OE_VA_8k:                  $("#oE_VA_8k").val(),
              OE_VO_500:                 $("#oE_VO_500").val(),
              OE_VO_1k:                  $("#oE_VO_1k").val(),
              OE_VO_2k:                  $("#oE_VO_2k").val(),
              OE_VO_3k:                  $("#oE_VO_3k").val(),
              OE_VO_4k:                  $("#oE_VO_4k").val(),
              sem250:                    $("#sem_AASI_250").val(),
              sem500:                    $("#sem_AASI_500").val(),
              sem1k:                     $("#sem_AASI_1k").val(),
              sem2k:                     $("#sem_AASI_2k").val(),
              sem3k:                     $("#sem_AASI_3k").val(),
              sem4k:                     $("#sem_AASI_4k").val(),
              sem6k:                     $("#sem_AASI_6k").val(),
              sem8k:                     $("#sem_AASI_8k").val(),
              sempercfala:               $("#sem_AASSI_percepcaoFala").val(),
              od250:                     $("#oD_AASI_250").val(),
              od500:                     $("#oD_AASI_500").val(),
              od1k:                      $("#oD_AASI_1k").val(),
              od2k:                      $("#oD_AASI_2k").val(),
              od3k:                      $("#oD_AASI_3k").val(),
              od4k:                      $("#oD_AASI_4k").val(),
              od6k:                      $("#oD_AASI_6k").val(),
              od8k:                      $("#oD_AASI_8k").val(),
              odpercfala:                $("#oD_AASSI_percepcaoFala").val(),
              oe250:                     $("#oE_AASI_250").val(),
              oe500:                     $("#oE_AASI_500").val(),
              oe1k:                      $("#oE_AASI_1k").val(),
              oe2k:                      $("#oE_AASI_2k").val(),
              oe3k:                      $("#oE_AASI_3k").val(),
              oe4k:                      $("#oE_AASI_4k").val(),
              oe6k:                      $("#oE_AASI_6k").val(),
              oe8k:                      $("#oE_AASI_8k").val(),
              oepercfala:                $("#oE_AASSI_percepcaoFala").val()
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
