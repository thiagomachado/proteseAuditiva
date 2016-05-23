<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("paciente_edicao_data.php");
?>
<div class="conteudo">
  <?php
    echo form_open('paciente/editar',$data_form);
    echo form_input($dataCPFHidden);
   ?>

  <div class="areaFormulario">
    <fieldset class="secaoFormulario">
      <legend>Dados Pessoais</legend>
      <table>
        <tr>
          <td colspan="3">
            <label>Nome*:</label><br>
            <?php echo form_input($dataNomePaciente); ?>
          </td>
          <td colspan="2">
            <label>Cartão SUS*:</label><br>
            <?php echo form_input($dataCartaoSus); ?>
          </td>
          <td>
            <label>Nº do Prontuário*:</label><br>
            <?php echo form_input($dataProntuario); ?>
          </td>
        </tr>

        <tr>
          <td>
            <label>CPF*:</label><br>
            <?php echo form_input($dataCPF); ?>
          </td>
          <td>
            <label>Data de Nascimento*:</label><br>
            <?php echo form_input($dataDataNascimento); ?>
          </td>
          <td>
            <label>Idade:</label><br>
            <?php echo form_input($dataIdade); ?>
          </td>
          <td>
            <label>Sexo*:</label><br>
            <?php echo form_input($dataSexoM);?><label>M</label>
            <?php echo form_input($dataSexoF); ?><label>F</label>
          </td>
          <td>
            <label>Etnia:</label><br>
            <?php echo form_dropdown('etnia', $dataEtnia,$paciente->Pc_Etnia, 'id="etnia" required'); ?>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <label>Nome da Mãe*:</label><br>
            <?php echo form_input($dataNomeMaePaciente); ?>
          </td>
          <td colspan="3">
            <label>Nome do Pai:</label><br>
            <?php echo form_input($dataNomePaiPaciente); ?>
          </td>
          <td colspan="3">
            <label>Tipo Anamenese:</label><br/>
            <?php echo form_dropdown('anamnese', $dataAnamnese,$paciente->Pc_TipoAnamn, 'id="anamnese" required'); ?>
          </td>
        </tr>
      </table>
      </fieldset>

      <fieldset class="secaoFormulario">
        <legend>Dados Profissionais</legend>
        <table>
          <tr>
            <td>
                <label>Escolaridade:</label><br>
                <?php echo form_dropdown('escolaridade', $dataEscolaridade,$paciente->Pc_GrauEscolar, 'id="escolaridade" required');  ?>
            </td>
            <td>
                <label>Trabalha*?</label><br>
                <?php echo form_input($dataTrabalhaS);?><label>Sim</label>
                <?php echo form_input($dataTrabalhaN);?><label>Não</label>
            </td>
            <td>
                <label>Profissão:</label><br>
                <?php echo form_input($dataProfissao);  ?>
            </td>
          </tr>
        </table>
      </fieldset>

      <fieldset class="secaoFormulario">
        <legend>Endereço e Telefone</legend>
        <table>
          <tr>
            <td colspan="7">
              <label>Endereço*:</label><br>
              <?php echo form_input($dataLogradouro); ?>
            </td>
          </tr>

          <tr>
            <td>
              <label>UF*:</label><br>
              <?php echo form_dropdown('estado', $dataEstado, $endereco->End_UF,'onchange="mudarCidades()" id="estado" required'); ?>
            </td>
            <td>
              <label>Municipio*:</label><br>
              <?php echo form_dropdown('municipio', $dataMunicipio, $endereco->End_CodIBGE,'onchange="mudarCodigoIBGE()" id="municipio" required'); ?>
            </td>
            <td>
              <label>Código IBGE:</label><br>
              <?php echo form_input($dataCodIBGE); ?>
            </td>
            <td>
              <label>CEP*:</label><br>
              <?php echo form_input($dataCEP); ?>
            </td>
            <td>
              <label>Telefone 1:</label><br>
              <?php echo form_input($dataTelefone1); ?>
            </td>
            <td>
              <label>Telefone 2:</label><br>
              <?php echo form_input($dataTelefone2); ?>
            </td>
          </tr>
        </table>
      </fieldset>
  </div>
  <div class="areaBotoesFormulario">
    <?php echo form_submit($dataSubmit) ?>
    <!-- <input class="botao" type="button" onclick="mostrarModal('#modalExcluirPaciente')" value="Excluir"/> -->
    <a href="<?php echo base_url().'index.php/edicaoAnamnese/'.$paciente->Pc_CPF;?>"><input class="botao" type="button" value="Anamnese"/></a>
    <input class="botao" type="button" onclick="mostrarModal('#modalSairSemSalvar')" value="Cancelar"/>
  </div>

  <div class="fundoModal" id="fundoModal">

    <div class="modal" id="modalSairSemSalvar">
      <div class="textoModal">
        <h1>CANCELAR</h1>
        <p>Deseja sair sem salvar?</p>
      </div>
      <div class="botoesModal">
        <a href="<?php echo base_url();?>index.php/consultaPaciente"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>

    <!-- <div class="modal" id="modalExcluirPaciente">
      <div class="textoModal">
        <h1>EXCLUIR</h1>
        <p>Todos os dados desse paciente serão excluídos, deseja continuar?</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url();?>index.php/excluirPaciente/<?php echo $paciente->Pc_CPF; ?>"><input type="button" class="botao" value="Sim"/></a>
        <input type="button" class="botao" onclick="esconderModal('#modalExcluirPaciente')" value="Não"/>
      </div>
    </div> -->

    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>Os dados foram alterados.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo base_url();?>index.php/consultaPaciente"><input type="button" class="botao" value="Concluir"/></a>
        <input class="botao" onclick="esconderModal('#modalSucesso'),location.reload()" value="Continuar"/>
      </div>
    </div>

    <div class="modal" id="modalErro">
      <div class="textoModal">
        <h1>Erro!</h1>
        <p>Houve um erro inesperado.</p>
        <p>Verifique se já não existe um paciente com mesmo CPF</p>
      </div>

      <div class="botoesModal">
        <input class="botao" onclick="esconderModal('#modalErro'),location.reload()" value="Ok"/>
      </div>
    </div>
  </div>
  </div>

<?php echo form_close(); ?>
</div>

<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    calcularIdade();
    $("#formPaciente").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/editarPaciente",
            dataType: 'json',
            data:
            {
              cpf:              $("#cpfHidden").val(),
              Pc_Nome:          $("#nomePaciente").val(),
              Pc_CartaoSus:     $("#cartaoSUS").val(),
              Pc_NumProntuario: $("#nProntuario").val(),
              Pc_RG:            $("#rg").val(),
              Pc_CPF:           $("#cpf").val(),
              Pc_DtNascimento:  $("#dataNascimento").val(),
              Pc_Sexo:          $("input[name='sexo']:checked").val(),
              Pc_Etnia:         $("#etnia").val(),
              Pc_NomeMae:       $("#nomeMaePaciente").val(),
              Pc_NomePai:       $("#nomePaiPaciente").val(),
              Pc_GrauEscolar:   $("#escolaridade").val(),
              Pc_SeTrabalha:    $("input[name='trabalha']:checked").val(),
              Pc_Profissao:     $("#profissao").val(),
              Pc_TipoAnamn:     $("#anamnese").val(),
              End_Logradouro:   $("#logradouro").val(),
              End_CodIBGE:      $("#codIBGE").val(),
              End_CEP:          $("#cep").val(),
              End_UF:           $("#estado").val(),
              Tel_Tel1:         $("#telefone1").val(),
              Tel_Tel2:         $("#telefone2").val()
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
