<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("anamneseAdulta_cadastro_data.php");
?>

<div class="conteudo">

  <?php
    echo form_open('anamnese/cadastrarAdulta',$data_form);
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
       <table>
         <tr>
           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Dor de Ouvido?</legend>
               <?php echo form_input($dataDorDeOuvidoS);?><label>Sim</label>
               <?php echo form_input($dataDorDeOuvidoN);?><label>Não</label>
             </fieldset>
           </td>

           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Cirurgia otológica</legend>
               <?php echo form_input($dataCirurgiaOtologicaS);?><label>Sim</label>
               <?php echo form_input($dataCirurgiaOtologicaN);?><label>Não</label><br>
               <?php echo form_checkbox($dataCirurgiaOtologicaOD);?><label>OD</label>
               <?php echo form_checkbox($dataCirurgiaOtologicaOE);?><label>OE</label><br>
               <label>Qual?</label><br>
              <?php echo form_input($dataCirurgiaOtologicaDescricao);?>
             </fieldset>
           </td>

           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Já teve ou tem alguma dessas doenças?</legend>
               <?php echo form_checkbox($dataCaxumba);?><label>Caxumba</label>
               <?php echo form_checkbox($dataMeningite);?><label>Meningite</label>
               <?php echo form_checkbox($dataSifilis);?><label>Sífilis</label>
               <?php echo form_checkbox($dataHipertensao);?><label>Hipertensão Arterial</label>
               <?php echo form_checkbox($dataSarampo);?><label>Sarampo</label>
               <?php echo form_checkbox($dataDiabetes);?><label>Diabetes</label><br>
               <?php echo form_checkbox($dataCirculatorios);?><label>Problemas Circulatórios</label><br>
               <label>Outra(s):</label> <?php echo form_input($dataOutrasDoencas);?>
             </fieldset>
           </td>
         </tr>

         <tr>
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
              <legend>Fez uso de medicação por tempo prolongado?</legend>
              <?php echo form_input($dataUsoMedicacaoS);?><label>Sim</label>
              <?php echo form_input($dataUsoMedicacaoN);?><label>Não</label><br>
              <label>Qual e para que?</label><?php echo form_input($dataMedicacao);?>
            </fieldset>
              <br>
            <fieldset class="subsecaoFormulario">
              <legend>Exposição à ruídos ocupacionais?</legend>
              <?php echo form_input($dataRuidoOcupacionalS);?><label>Sim</label>
              <?php echo form_input($dataRuidoOcupacionalN);?><label>Não</label><br>
              <label>Quais?</label><?php echo form_input($dataRuidoOcupacionalDesc);?>
              <label>Tempo:</label><?php echo form_input($dataRuidoOcupacionalTempo);?>
            </fieldset>
         </td>

        </tr>
       </table>
     </fieldset>

     <fieldset class="secaoFormulario">
       <legend>Aspectos Auditivos</legend>
       <table>
         <tr>
           <td>
             <label>A quanto tempo vem sentindo perda de audição:</label>
             <?php echo form_input($dataTempoPerdaAudicao); ?>
           </td>
         </tr>

         <tr>
           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Quanto a Habilidade para compreender a fala:</legend>
               <table>
                 <tr>
                   <td><?php echo form_input($dataCompreendeFalaNaoEntende);?><label>Ouve, mas não entende.</label></td>
                   <td> <?php echo form_input($dataCompreendeFalaDificuldadeOuvir);?><label>Dificuldade para ouvir e entender.</label></td>
                 </tr>
                 <tr>
                   <td><?php echo form_input($dataCompreendeFalaPorPistasVisuais);?><label>Entende o que é dito com o apoio de pistas viusais.</label></td>
                   <td><?php echo form_input($dataCompreendeFalaEntendeTudo);?><label>Entende tudo que é dito.</label></td>
                 </tr>
               </table>
             </fieldset>
           </td>
         </tr>

         <tr>
           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Zumbido?</legend>
               <table>
                 <tr>
                   <td><?php echo form_input($dataZumbidoS);?><label>Sim</label></td>
                   <td> <?php echo form_input($dataZumbidoN);?><label>Não</label></td>
                 </tr>

                 <tr>
                   <td><?php echo form_input($dataZumbidoTipoContinuo);?><label>Continuo</label></td>
                   <td><?php echo form_input($dataZumbidoTipoIntermitente);?><label>Intermitente</label></td>
                 </tr>

                 <tr>
                   <td><?php echo form_checkbox($dataZumbidoOD);?><label>OD</label></td>
                   <td> <?php echo form_checkbox($dataZumbidoOE);?><label>OE</label></td>
                 </tr>

                 <tr>
                   <td colspan="2"><label>Tempo:</label><?php echo form_input($dataTempoZumbido);?></td>
                 </tr>
               </table>
             </fieldset>
           </td>
         </tr>

         <tr>
           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Vertigem?</legend>
               <table>
                 <tr>
                   <td><?php echo form_input($dataVertigemS);?><label>Sim</label></td>
                   <td><?php echo form_input($dataVertigemN);?><label>Não</label></td>
                 </tr>
                 <tr>
                   <td colspan="2"><label>Tempo:</label><?php echo form_input($dataTempoVertigem);?></td>
                 </tr>
               </table>
             </fieldset>
           </td>
         </tr>

         <tr>
           <td>
             <fieldset class="subsecaoFormulario">
               <legend>Incômodo a sons intensos?</legend>
               <table>
                 <tr>
                   <td><?php echo form_input($dataIncomodoS);?><label>Sim</label></td>
                   <td><?php echo form_input($dataIncomodoN);?><label>Não</label></td>
                 </tr>
                 <tr>
                   <td colspan="2"><label>Quais?</label><?php echo form_input($dataDescIncomodo);?></td>
                 </tr>
               </table>
             </fieldset>
           </td>
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
         <input class="botao" onclick="esconderModal('#modalErro')" value="Ok"/>
       </div>
     </div>
   </div>

   <?php echo form_close(); ?>
</div>

<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formAnamneseAdulta").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url("cadastrarAnamneseAdulta"); ?>",
            dataType: 'json',
            data:
            {
              cpf:                      $("#cpfHidden").val(),
              AnmAdt_EncaminhadoPor:    $("#encaminhado").val(),
              AnmAdt_PrincQueixa:       $("#queixaPrincipal").val(),
              AnmAdt_HistQueixa:        $("#historicoQueixa").val(),
              AnmAdt_DorOuvido:         $("input[name='dorDeOuvido']:checked").val(),
              AnmAdt_HistOtite:         $("input[name='historicoOtite']:checked").val(),
              AnmAdt_OtiteOE:           $("#historicoOtiteOE" ).prop("checked"),
              AnmAdt_OtiteOD:           $("#historicoOtiteOD" ).prop("checked"),
              AnmAdt_Periodicidade:     $("#historicoOtitePeriodo").val(),
              AnmAdt_CirurgiaOtologica: $("input[name='cirurgiaOtologica']:checked").val(),
              AnmAdt_CirurgiaOtolOE:    $("#cirurgiaOtologicaOE" ).prop("checked"),
              AnmAdt_CirurgiaOtolOD:    $("#cirurgiaOtologicaOD" ).prop("checked"),
              AnmAdt_CirurgiaDesc:      $("#cirurgiaOtologicaDescricao").val(),
              AnmAdt_PerdaAudNaFamilia: $("input[name='perdaAuditivaNaFamilia']:checked").val(),
              AnmAdt_FamiliarPerdaAud:  $("#perdaAuditivaParentesco").val(),
              AnmAdt_Doenca:            $("#outrasDoencas").val(),
              AnmAdt_Caxumba:           $("#caxumba" ).prop("checked"),
              AnmAdt_Meningite:         $("#meningite" ).prop("checked"),
              AnmAdt_Sifilis:           $("#sifilis" ).prop("checked"),
              AnmAdt_Hipertensao:       $("#hipertensao" ).prop("checked"),
              AnmAdt_Sarampo:           $("#sarampo" ).prop("checked"),
              AnmAdt_Circulatorios:     $("#circulatorios" ).prop("checked"),
              AnmAdt_Diabetes:          $("#diabetes" ).prop("checked"),
              AnmAdt_UsoMedicacao:      $("input[name='usoMedicacao']:checked").val(),
              AnmAdt_Medicacao:         $("#medicacao").val(),
              AnmAdt_SeRuidosOcup:      $("input[name='ruidoOcupacional']:checked").val(),
              AnmAdt_RuidosOcup:        $("#ruidoOcupacionalDesc").val(),
              AnmAdt_TempoRuidosOcup:   $("#ruidoOcupacionalTempo").val(),
              AnmAdt_TempoDificulAud:   $("#tempoPerdaAudicao" ).val(),
              AnmAdt_CompreenderFala:   $("input[name='compreendeFala']:checked").val(),
              AnmAdt_Zumbido:           $("input[name='zumbido']:checked").val(),
              AnmAdt_ZumbOD:            $("#zumbidoOD" ).prop("checked"),
              AnmAdt_ZumbOE:            $("#zumbidoOE" ).prop("checked"),
              AnmAdt_ZumbTipo:          $("input[name='zumbidoTipo']:checked").val(),
              AnmAdt_ZumbTempo:         $("#tempoZumbido").val(),
              AnmAdt_Vertigem:          $("input[name='vertigem']:checked").val(),
              AnmAdt_TempoVertigem:     $("#tempoVertigem").val(),
              AnmAdt_IncomSonsIntensos: $("input[name='incomodo']:checked").val(),
              AnmAdt_SonsIntensos:      $("#descIncomodo").val(),
              AnmAdt_Obs:               $("#obs").val()
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
