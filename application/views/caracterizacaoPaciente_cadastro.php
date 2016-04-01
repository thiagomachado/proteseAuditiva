<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("caracterizacaoPaciente_cadastro_data.php");
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
          <td>VO</td>
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
          <td>VA</td>
          <td></td>
          <td><?php echo form_input($dataOD_VA_500); ?></td>
          <td><?php echo form_input($dataOD_VA_1k); ?></td>
          <td><?php echo form_input($dataOD_VA_2k); ?></td>
          <td><?php echo form_input($dataOD_VA_3k); ?></td>
          <td><?php echo form_input($dataOD_VA_4k); ?></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td rowspan="2">OE</td>
          <td>VO</td>
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
          <td>VA</td>
          <td></td>
          <td><?php echo form_input($dataOE_VA_500); ?></td>
          <td><?php echo form_input($dataOE_VA_1k); ?></td>
          <td><?php echo form_input($dataOE_VA_2k); ?></td>
          <td><?php echo form_input($dataOE_VA_3k); ?></td>
          <td><?php echo form_input($dataOE_VA_4k); ?></td>
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
          <td><?php echo form_input($dataTipoPerdaAuditiva); ?></td>
          <td>Duração:</td>
          <td><?php echo form_input($dataDuracao); ?></td>
          <td>Zumbido:</td>
          <td><?php echo form_input($dataZumbido); ?></td>
        </tr>
        <tr>
          <td>Grau de Perda:</td>
          <td><?php echo form_input($dataGrauPerda); ?></td>
          <td>Progressão:</td>
          <td><?php echo form_input($dataProgressao); ?></td>
          <td>Configuração:</td>
          <td><?php echo form_input($dataConfiguracao); ?></td>
        </tr>
        <tr>
          <td>Recrutamento:</td>
          <td><?php echo form_input($dataRecrutamento); ?></td>
        </tr>
      </table>

      <label>Reaultado dos Exames Complementares:</label>
      </br>
      <?php echo form_textarea($dataExamesComplementares); ?>
      </br>
      <table>
        <tr>
          <td>Candidato ao uso de AASI:</td>
          <td><?php echo form_dropdown('candidatoAASI',$dataOpcoesDropdown, 'id = "candidatoAASI"'); ?></td>
          <td>Possível candidato ao uso de implante coclear:</td>
          <td><?php echo form_dropdown('candidatoImplante', $dataOpcoesDropdown, 'id="candidatoImplante"'); ?></td>
        </tr>
      </table>
    </fieldset>

    <fieldset class="secaoFormulario">
      <legend>Histórico da Perda Auditiva</legend>
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
        <a href="<?php echo base_url().'index.php/edicaoPaciente/'.$paciente->Pc_CPF;?>"><input class="botao" type="button" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>

    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>Os dados foram alterados.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url().'index.php/edicaoPaciente/'.$paciente->Pc_CPF;?>"><input type="button" class="botao" value="Concluir"/></a>
        <input class="botao" onclick="esconderModal('#modalSucesso'),location.reload()" value="Continuar"/>
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
