<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("caracterizacaoPaciente_edicao_data.php");

    $Caract_AASI        = $dataOpcoesDropdown[$caracterizacao->Caract_AASI];
    $Caract_ImplCoclear = $dataOpcoesDropdown[$caracterizacao->Caract_ImplCoclear];
?>
<!DOCTYPE html>
<html>

  <head lang = "pt-br">
    <?php
    echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('assets/css/caracterizacaoPacientePDF.css');
    ?>
  </head>
  <body>
    <div class="conteudo">
      <div class="areaFormulario">
          <div class="logoHUCFF"></div>

          <div class="cabecalho">
            <p>
              UNIVERSIDADE FEDERAL DO RIO DE JANEIRO</br>
              HOSPITAL UNIVERSITÁRIO CLEMENTINO FRAGA FILHO</br>
              DIVISÃO DE APOIO ASSISTENCIAL</br>
              SERVIÇO DE FONOAUDIOLOGIA</br>
              PROGRAMA DE SAÚDE AUDITIVA DE ALTA COMPLEXIDADE</br>
            </p>
          </div>
          <fieldset class="secaoFormulario">
            <legend class="titulo">IDENTIFICAÇÃO DO PACIENTE</legend>
            <table class="tabelaPDF">
              <tr>
                <td colspan="2">
                  <fieldset class="campo">
                    <legend>NOME:</legend>
                    <label><?php echo trim($paciente->Pc_Nome); ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>Nº DO PRONTUÁRIO:</legend>
                    <label><?php echo $paciente->Pc_NumProntuario; ?></label>
                  </fieldset>
                </td>
              </tr>

              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>CPF:</legend>
                    <label><?php echo strtoupper($paciente->Pc_CPF); ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>CARTÃO NACIONAL DE SAÚDE(CNS):</legend>
                    <label><?php echo $paciente->Pc_CartaoSus; ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>DATA DE NASCIMENTO:</legend>
                    <label><?php echo date("d/m/Y", strtotime($paciente->Pc_DtNascimento)); ?></label>
                  </fieldset>
                </td>

              </tr>
            </table>
          </fieldset>

          <fieldset class="secaoFormulario">
            <legend class="titulo">CARACTERIZAÇÃO DA PERDA AUDITIVA</legend>
            <table>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>TIPO DE PERDA AUDITIVA:</legend>
                    <label><?php echo$caracterizacao->Caract_TipoPerda; ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>GRAU DE PERDA:</legend>
                    <label><?php echo$caracterizacao->Caract_GrauPerda; ?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>CONFIGURAÇÃO:</legend>
                    <label><?php echo$caracterizacao->Caract_Config; ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>DURAÇÃO:</legend>
                    <label><?php echo$caracterizacao->Caract_Duracao; ?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>PROGRESSÃO:</legend>
                    <label><?php echo$caracterizacao->Caract_Progress; ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>RECRUTAMENTO:</legend>
                    <label><?php echo$caracterizacao->Caract_Recrut; ?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>ZUMBIDO:</legend>
                    <label><?php echo$caracterizacao->Caract_Zumbido; ?></label>
                  </fieldset>
                </td>
              </tr>

            </table>
          </fieldset>
          <fieldset class="secaoFormulario">
            <legend class="titulo">EXAMES</legend>
            <table>
              <tr>
                <td colspan="2">
                  <fieldset class="campo obs">
                    <legend>RESULTADO DOS EXAMES COMPLEMENTARES</legend>
                    <label><?php echo$caracterizacao->Caract_ExamesCompl; ?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>CANDIDATO AO USO DE AASI:</legend>
                    <label><?php echo $Caract_AASI; ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>CANDIDATO AO USO DE IMPLANTE COCLEAR:</legend>
                    <label><?php echo $Caract_ImplCoclear;?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <fieldset class="campo obs">
                    <legend>HISTÓRICO DA PERDA AUDITIVA</legend>
                    <label><?php echo$caracterizacao->Caract_HistPerdaAud; ?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>MODELO DE AASI INDICADO:</legend>
                    <label><?php echo $caracterizacao->Caract_AASIModelo; ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>ORELHA:</legend>
                    <label><?php echo $caracterizacao->Caract_AASIOrelha;?></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <fieldset class="campo obs">
                    <legend>OBSERVAÇÕES</legend>
                    <label><?php echo$caracterizacao->Caract_Obs; ?></label>
                  </fieldset>
                </td>
              </tr>
            </table>
          </fieldset>

          <fieldset class="secaoFormulario">
            <legend class="titulo">LIMIARES DE AUDIBILIDADE</legend>
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
                <td><?php echo $testeAASI->sem250; ?></td>
                <td><?php echo $testeAASI->sem500; ?></td>
                <td><?php echo $testeAASI->sem1k; ?></td>
                <td><?php echo $testeAASI->sem2k; ?></td>
                <td><?php echo $testeAASI->sem3k; ?></td>
                <td><?php echo $testeAASI->sem4k; ?></td>
                <td><?php echo $testeAASI->sem6k; ?></td>
                <td><?php echo $testeAASI->sem8k; ?></td>
                <td><?php echo $testeAASI->sempercfala; ?></td>
              </tr>
              <tr>
                <td>AASI OD</td>
                <td><?php echo $testeAASI->od250; ?></td>
                <td><?php echo $testeAASI->od500; ?></td>
                <td><?php echo $testeAASI->od1k; ?></td>
                <td><?php echo $testeAASI->od2k; ?></td>
                <td><?php echo $testeAASI->od3k; ?></td>
                <td><?php echo $testeAASI->od4k; ?></td>
                <td><?php echo $testeAASI->od6k; ?></td>
                <td><?php echo $testeAASI->od8k; ?></td>
                <td><?php echo $testeAASI->odpercfala; ?></td>
              </tr>
              <tr>
                <td>AASI OE</td>
                <td><?php echo $testeAASI->oe250; ?></td>
                <td><?php echo $testeAASI->oe500; ?></td>
                <td><?php echo $testeAASI->oe1k; ?></td>
                <td><?php echo $testeAASI->oe2k; ?></td>
                <td><?php echo $testeAASI->oe3k; ?></td>
                <td><?php echo $testeAASI->oe4k; ?></td>
                <td><?php echo $testeAASI->oe6k; ?></td>
                <td><?php echo $testeAASI->oe8k; ?></td>
                <td><?php echo $testeAASI->oepercfala; ?></td>
              </tr>
            </table>
          </fieldset>

          <fieldset class="secaoFormulario">
            <legend class="titulo">FONOAUDIÓLOGO</legend>
            <table>
              <tr>
                <td>
                  <fieldset class="campo">
                    <legend>NOME DO PROFISSIONAL</legend>
                    <label><?php echo $profissional->Us_Nome ?></label>
                  </fieldset>
                </td>
                <td>
                  <fieldset class="campo">
                    <legend>DATA</legend>
                    <label><?php echo date("d/m/Y"); ?></label>
                  </fieldset>
                </td>
                <td rowspan="2">
                  <fieldset class="campoCarimbo">
                    <legend>ASSINATURA E CARIMBO</legend>
                    <label></label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <fieldset class="campo">
                    <legend>CARTÃO NACIONAL DE SAÚDE DO PROFISSIONAL SOLICITANTE</legend>
                    <label></label>
                  </fieldset>
                </td>
              </tr>
            </table>
          </fieldset>
<br><br>
          <table>
            <tr>
              <td><center>________________________________________</center></td>
              <td><center>________________________________________</center></td>
            </tr>
            <tr>
              <td><center>Otorrinolaringologista</center></td>
              <td><center>Divisão Médica</center></td>
            </tr>
          </table>
      </div>
    </div>

  </body>
</html>
