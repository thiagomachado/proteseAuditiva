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
    <title><?php echo $title; ?> </title>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js"></script>
    <?php
    echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('assets/css/templatePDF.css');
    echo link_tag('assets/css/caracterizacaoPacientePDF.css');
    ?>
  </head>
  <body>
    <div class="conteudo">
      <?php
        echo form_open('',$data_form);
      ?>
      <div class="areaFormulario">
        <center><h1>CARACTERIZAÇÃO DE PACIENTE</h1></center>
        <fieldset class="secaoFormulario">
          <legend>Paciente</legend>
          <table>
            <tr>
              <td >
                <label>Nome:</label><br>
                <p class="labelInfo"><?php echo $paciente->Pc_Nome; ?></p>
              </td>
              <td >
                <label>CPF:</label><br>
                <p class="labelInfo"><?php echo $paciente->Pc_CPF; ?></p>
              </td>
              <td >
                <label>Data de Nascimento:</label><br>
                <p class="labelInfo"><?php echo date("d/m/Y", strtotime($paciente->Pc_DtNascimento)); ?></p>
              </td>

              <td >
                <label>Nº Prontuário:</label><br>
                <p class="labelInfo"><?php echo $paciente->Pc_NumProntuario; ?></p>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <label>Profissional:</label><br>
                <p class="labelInfo"><?php echo $profissional->Us_Nome; ?></p>
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
              <td><?php echo $testeCaracterizacao->OD_VA_250; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_500; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_1k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_2k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_3k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_4k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_6k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VA_8k; ?></td>
            </tr>
            <tr>
              <td>VO</td>
              <td></td>
              <td><?php echo $testeCaracterizacao->OD_VO_500; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VO_1k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VO_2k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VO_3k; ?></td>
              <td><?php echo $testeCaracterizacao->OD_VO_4k; ?></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td rowspan="2">OE</td>
              <td>VA</td>
              <td><?php echo $testeCaracterizacao->OE_VA_250; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_500; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_1k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_2k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_3k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_4k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_6k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VA_8k; ?></td>
            </tr>
            <tr>
              <td>VO</td>
              <td></td>
              <td><?php echo $testeCaracterizacao->OE_VO_500; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VO_1k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VO_2k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VO_3k; ?></td>
              <td><?php echo $testeCaracterizacao->OE_VO_4k; ?></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </fieldset>

        <fieldset class="secaoFormulario">
          <legend>Caracterização da Perda Auditiva</legend>
          <table>
            <tr>
              <td>Tipo de Perda Auditiva:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_TipoPerda; ?></p></td>
              <td>Duração:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_Duracao; ?></p></td>
              <td>Zumbido:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_Zumbido; ?></p></td>
            </tr>
            <tr>
              <td>Grau de Perda:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_GrauPerda; ?></p></td>
              <td>Progressão:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_Progress; ?></p></td>
              <td>Configuração:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_Config; ?></p></td>
            </tr>
            <tr>
              <td>Recrutamento:</td>
              <td><p class="labelInfo"><?php echo$caracterizacao->Caract_Recrut; ?></p></td>
            </tr>
          </table>

          <label>Reaultado dos Exames Complementares:</label>
          </br>
          <p class="labelInfo"><?php echo$caracterizacao->Caract_ExamesCompl; ?></p>
          </br>
          <table>
            <tr>
              <td>Candidato ao uso de AASI:</td>
              <td><p class="labelInfo"><?php echo $Caract_AASI; ?></p></td>
              <td>Possível candidato ao uso de implante coclear:</td>
              <td><p class="labelInfo"><?php echo $Caract_ImplCoclear;?></p></td>
            </tr>
          </table>
        </fieldset>

        <fieldset class="secaoFormulario">
          <legend>Histórico da Perda Auditiva</legend>
          <p class="labelInfo"><?php echo $caracterizacao->Caract_HistPerdaAud; ?></p>
        </fieldset>

        <fieldset class="secaoFormulario">
          <legend>AASI indicado</legend>
          <table>
            <tr>
              <td>Modelo:</td>
              <td><p class="labelInfo"><?php echo $caracterizacao->Caract_AASIModelo; ?></p></td>
            </tr>
            <tr>
              <td>Orelha:</td>
              <td><p class="labelInfo"><?php echo $caracterizacao->Caract_AASIOrelha; ?></p></td>
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
          <legend>Observações</legend>
          <p class="labelInfo"><?php echo $caracterizacao->Caract_Obs; ?></p>
        </fieldset>
      </div>

      <?php echo form_close(); ?>

    </div>

  </body>
</html>
