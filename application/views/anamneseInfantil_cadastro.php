<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("anamneseInfantil_cadastro_data.php");
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
           <td>
             <label>Encaminhado por:</label><br>
             <?php echo form_input($dataEncaminhado); ?>
           </td>
         </tr>
       </table>
     </fieldset>

     <fieldset class="secaoFormulario">
       <legend>Queixas</legend>
       <table>
         <tr>
           <td>
             <label>Queixa Principal:</label><br>
             <?php echo form_input($dataQueixaPrincipal); ?>
           </td>
         </tr>
         <tr>
           <td>
             <label>Histórico da Queixa:</label><br>
             <?php echo form_textarea($dataHistoricoQueixa); ?>
           </td>
         </tr>
       </table>
     </fieldset>

     <fieldset class="secaoFormulario">
       <legend>Antecedentes Individuais</legend>
       <fieldset class="subsecaoFormulario">
         <legend>Gestação</legend>
         <table>
           <tr>
             <td>
               <label>Alterações na Gestação:</label><br/>
               <?php echo form_input($dataAlteracoesGravidezS);?><label>Sim</label>
               <?php echo form_input($dataAlteracoesGravidezN);?><label>Não</label><br/>
               <label>Quais?</label><br/>
               <?php echo form_input($dataDescricaoAlteracao);?>
             </td>

             <td>
               <label>A mãe teve algum destes problemas durante a gestação?</label><br/>
               <?php echo form_checkbox($dataRubeola);?><label>Rubéola</label>
               <?php echo form_checkbox($dataToxoplasmose);?><label>Toxoplasmose</label>
               <?php echo form_checkbox($dataSifilis);?><label>Sífilis</label>
               <?php echo form_checkbox($dataCitomegalovirose);?><label>Citomegalovirose</label><br/>
               <?php echo form_checkbox($dataHerpes);?><label>Herpes</label>
               <?php echo form_checkbox($dataDrogas);?><label>Uso de Drogas Abortivas</label>
               <?php echo form_checkbox($dataAlcool);?><label>Álcool e/ou Fumo</label>
             </td>

             <td>
               <label>Tipo de Parto:</label><br/>
               <?php echo form_dropdown('tipoParto',$dataTipoParto, 'normal' , 'id="tipoParto" required'); ?>
             </td>
           </tr>
         </table>
       </fieldset>

       <table>
         <tr>
           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Já teve ou tem alguma dessas doenças?</legend>
               <?php echo form_checkbox($dataCaxumba);?><label>Caxumba</label>
               <?php echo form_checkbox($dataMeningite);?><label>Meningite</label><br>
               <?php echo form_checkbox($dataEncefalite);?><label>Encefalite</label>
               <?php echo form_checkbox($dataTraumaAcustico);?><label>Trauma Acustico</label><br>
               <?php echo form_checkbox($dataSarampo);?><label>Sarampo</label>
               <br>
               <label>Outra(s):</label> <?php echo form_input($dataOutrasDoencas);?>
             </fieldset>
           </td>

           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Histórico de otite</legend>
               <?php echo form_input($dataHistoricoOtiteS);?><label>Sim</label>
               <?php echo form_input($dataHistoricoOtiteN);?><label>Não</label><br>
               <?php echo form_checkbox($dataHistoricoOtiteOD);?><label>OD</label>
               <?php echo form_checkbox($dataHistoricoOtiteOE);?><label>OE</label><br>
               <label>Periodicidade:</label><br>
              <?php echo form_input($dataHistoricoOtitePeriodo);?>
             </fieldset>
           </td>

           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Alguém na família<br> com perda auditiva?</legend>
               <?php echo form_input($dataPerdaAuditivaNaFamiliaS);?><label>Sim</label>
               <?php echo form_input($dataPerdaAuditivaNaFamiliaN);?><label>Não</label><br>
               <label>Quem?</label><br>
              <?php echo form_input($dataPerdaAuditivaParentesco);?>
             </fieldset>
          </td>

          <td>
            <fieldset class="subsecaoFormulario">
              <legend>Faz uso de medicação?</legend>
              <?php echo form_input($dataUsoMedicacaoS);?><label>Sim</label>
              <?php echo form_input($dataUsoMedicacaoN);?><label>Não</label><br>
              <label>Qual e para que?</label><?php echo form_input($dataMedicacao);?>
            </fieldset><br>
            <label>Pais com consaguinidade?</label>
            <?php echo form_input($dataPaisConsaguinidadeS);?><label>Sim</label>
            <?php echo form_input($dataPaisConsaguinidadeN);?><label>Não</label><br>
          </td>
         </tr>
       </table>

     </fieldset>

     <fieldset class="secaoFormulario">
       <legend>Aspectos Auditivos</legend>
       <table>
         <tr>
           <td colspan="2">Há quanto tempo vem suspeitando de dificuldade de audição?</td>
           <td colspan="2"><?php echo form_input($dataTempoDificuldadeAuditiva);?></td>
         </tr>

         <tr>
           <td>Idade da confirmação:</td>
           <td><?php echo form_input($dataIdadeConfirmacao); ?></td>
           <td>Como confirmou?</td>
           <td><?php echo form_input($dataComoConfirmou); ?></td>
         </tr>

          <tr>
            <td>Idade da intervenção:</td>
            <td><?php echo form_input($dataIdadeIntervencao); ?></td>
            <td>Qual intervenção?</td>
            <td><?php echo form_input($dataQualIntervencao); ?></td>
          </tr>
       </table>
     </fieldset>

     <fieldset class="secaoFormulario">
       <legend>Reação aos sons</legend>
       <table>
         <tr>
           <td>
             <fieldset  class="subsecaoFormulario">
               <legend><label>Reage a qual destes sons?</label> </legend>
               <label>Trovão:</label>
               <?php echo form_checkbox($dataReageTrovao); ?>
               <label>Avião:</label>
               <?php echo form_checkbox($dataReageAviao); ?>
               <label>Batida de Porta:</label>
               <?php echo form_checkbox($dataReagePorta); ?>
               <label>Buzina de Carro:</label>
               <?php echo form_checkbox($dataReageBuzina); ?>
               <label>Latido de Cachorro:</label>
               <?php echo form_checkbox($dataReageCachorro); ?>
               <label>Voz:</label>
               <?php echo form_checkbox($dataReageVoz); ?>
             </fieldset>
           </td>
           <td>
            <fieldset class="subsecaoFormulario">
              <legend>Reage a qual intensidade de voz?</legend>
              <?php echo form_dropdown('intensidadeVoz', $dataReacaoVoz ,'normal', 'id="intensidadeVoz"'); ?>
            </fieldset>
           </td>

           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Como reage aos sons?</legend>
               <?php echo form_dropdown('comoReage', $dataComoReage ,'chora', 'id="comoReage"'); ?>
             </fieldset>
           </td>
         </tr>
       </table>
       <table>
         <tr>
           <td><label>Desenvolvimento da linguagem:</label><td>
           <td> <?php echo form_input($dataDesenvolvimentoLinguagem);  ?></td>
         </tr>
         <tr>
           <td><label>Tipo de comunicação predominante:</label><td>
           <td> <?php echo form_input($dataComunicacaoPredominante);  ?></td>
         </tr>
         <tr>
           <td><label>Desenvolvimento motor:</label><td>
           <td> <?php echo form_input($dataDesenvolvimentoMotor);  ?></td>
         </tr>
       </table>
     </fieldset>

     <fieldset class="secaoFormulario">
       <legend>Extra</legend>
       <table>
         <tr>
           <td>
             <label>Observações:</label><br>
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
         <a href="<?php echo base_url().'index.php/edicaoPaciente/'.$paciente->Pc_CPF;?>"><input class="botao" type="button" value="Sim"/></a>
         <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
       </div>
     </div>

     <div class="modal" id="modalSucesso">
       <div class="textoModal">
         <h1>Sucesso!</h1>
         <p>Os dados foram cadastrados.</p>
       </div>

       <div class="botoesModal">
         <a href="<?php echo base_url().'index.php/edicaoPaciente/'.$paciente->Pc_CPF;?>"><input type="button" class="botao" value="Concluir"/></a>
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
    $("#formAnamneseInfantil").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/cadastrarAnamneseInfantil",
            dataType: 'json',
            data:
            {
              cpf:                         $("#cpfHidden").val(),
              AnmInf_EncaminhaPor:         $("#encaminhado").val(),
              AnmInf_PrincQueixa:          $("#queixaPrincipal").val(),
              AnmInf_HistQueixa:           $("#historicoQueixa").val(),
              AnmInf_GestAlteracao:        $("input[name='alteracoesGravidez']:checked").val(),
              AnmInf_DescAlteracao:        $("#descricaoAlteracao").val(),
              AnmInf_Rubeola:              $("#rubeola" ).prop("checked"),
              AnmInf_Toxoplasmose:         $("#toxoplasmose" ).prop("checked"),
              AnmInf_Sifilis:              $("#sifilis" ).prop("checked"),
              AnmInf_Citomegalovirose:     $("#citomegalovirose" ).prop("checked"),
              AnmInf_Herpes:               $("#herpes" ).prop("checked"),
              AnmInf_Drogas:               $("#drogas" ).prop("checked"),
              AnmInf_Alcool:               $("#alcool" ).prop("checked"),
              AnmInf_Parto:                $('#tipoParto').val(),
              AnmInf_Caxumba:              $("#caxumba" ).prop("checked"),
              AnmInf_Meningite:            $("#meningite" ).prop("checked"),
              AnmInf_Encefalite:           $("#encefalite" ).prop("checked"),
              AnmInf_TraumaAcustico:       $("#traumaAcustico" ).prop("checked"),
              AnmInf_Sarampo:              $("#sarampo" ).prop("checked"),
              AnmInf_Doenca:               $("#outrasDoencas").val(),
              AnmInf_HistOtite:            $("input[name='historicoOtite']:checked").val(),
              AnmInf_OtiteOE:              $("#historicoOtiteOE" ).prop("checked"),
              AnmInf_OtiteOD:              $("#historicoOtiteOD" ).prop("checked"),
              AnmInf_Periodicidade:        $("#historicoOtitePeriodo").val(),
              AnmInf_PerdaAudNaFamilia:    $("input[name='perdaAuditivaNaFamilia']:checked").val(),
              AnmInf_Familiar:             $("#perdaAuditivaParentesco").val(),
              AnmInf_UsoMedicacao:         $("input[name='usoMedicacao']:checked").val(),
              AnmInf_Medicacao:            $("#medicacao").val(),
              AnmInf_PaisConsag:           $("input[name='consaguinidade']:checked").val(),
              AnmInf_TempoDifculAud:       $("#tempoDificuldadeAuditiva").val(),
              AnmInf_IdadeConf:            $("#idadeConfirmacao").val(),
              AnmInf_ComoConf:             $("#comoConfirmou").val(),
              AnmInf_IdadeInterv:          $("#idadeIntervencao").val(),
              AnmInf_QualInterv:           $("#qualIntervencao").val(),
              AnmInf_ReageTrovao:          $("#reageTrovao" ).prop("checked"),
              AnmInf_ReageAviao:           $("#reageAviao" ).prop("checked"),
              AnmInf_ReagePorta:           $("#reagePorta" ).prop("checked"),
              AnmInf_ReageBuzina:          $("#reageBuzina" ).prop("checked"),
              AnmInf_ReageCachorro:        $("#reageCachorro" ).prop("checked"),
              AnmInf_ReageVoz:             $("#sarampo" ).prop("checked"),
              AnmInf_ReacaoIntensidadeVoz: $("#intensidadeVoz").val(),
              AnmInf_ComoReage:            $("#comoReage").val(),
              AnmInf_DesenvolvLing:        $("#desenvolvimentoLinguagem").val(),
              AnmInf_ComunicProdom:        $("#comunicacaoPredominante").val(),
              AnmInf_DesenvolvMotor:       $("#desenvolvimentoMotor").val(),
              AnmInf_Obs:                  $("#obs").val()
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
