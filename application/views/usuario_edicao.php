<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
    //inclui dataset dos inputs
    include("usuario_edicao_data.php");
?>
<div class="conteudo">
  <?php
    echo form_open('usuario/cadastrar', $data_form);
    echo form_input($dataCPFHidden);
  ?>
  <div class="areaFormulario">
    <fieldset class="secaoFormulario">
      <legend>Dados Pessoais</legend>
      <table>
        <tr>
          <td colspan="3">
            <label>Nome*:</label><br>
            <?php echo form_input($dataNome); ?>
          </td>
          <td colspan="2">
            <label>CPF*:</label><br>
            <?php echo form_input($dataCPF); ?>
          </td>
          <td>
            <label>Data de Nascimento*:</label><br>
            <?php echo form_input($dataDataNascimento); ?>
          </td>
        </tr>
      </table>
      </fieldset>

      <fieldset class="secaoFormulario">
        <legend>Dados de Acesso</legend>
        <table>
          <tr>
            <td>
                <label>Cargo*:</label><br>
                <?php echo form_input($dataCargo);  ?>
            </td>
            <td>
                <label>CRFA:</label><br>
                <?php echo form_input($dataCRFA);?>
            </td>
            <td>
                <label>Cartão de Saúde do Profissional:</label><br>
                <?php echo form_input($dataCartaoSUS);?>
            </td>

          </tr>

          <tr>
            <td>
              <label>Nome de usuário*:</label><br>
              <?php echo form_input($dataLogin); ?>
            </td>
            <td colspan="2">
              <label>E-mail*:</label><br>
              <?php echo form_input($dataEmail); ?>
            </td>
          </tr>
        </table>
        <table>
          <tr>
            <td>
              <label>Senha*:</label><br>
              <?php echo form_input($dataSenha); ?>
            </td>
            <td>
              <label>Repita a senha*:</label><br>
              <?php echo form_input($dataReSenha); ?>
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
        <a href="<?php echo site_url("menu");?>"><input type="button" class="botao" value="Sim"/></a>
        <input class="botao" type="button" onclick="esconderModal('#modalSairSemSalvar')" value="Não"/>
      </div>
    </div>


    <div class="modal" id="modalSucesso">
      <div class="textoModal">
        <h1>Sucesso!</h1>
        <p>Seus dados foram alterados.</p>
      </div>

      <div class="botoesModal">
        <a href="<?php echo site_url("menu");?>"><input class="botao" value="Concluir"/></a>
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
  var password     = document.getElementById("senha");
  confirm_password = document.getElementById("re_senha");

function validatePassword()
{
  if(password.value != confirm_password.value)
  {
    confirm_password.setCustomValidity("As senhas não são iguais");
  }
  else
  {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>




<script type="text/javascript">
// Ajax post
$(document).ready(function() {

    $("#formUsuario").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url("editarUsuario"); ?>",
            dataType: 'json',
            data:
            {
              Us_CPF:    $("#cpf").val(),
              Us_Nome:   $("#nomeUsuario").val(),
              Us_DtNasc: $("#dataNascimento").val(),
              Us_CRFA:   $("#crfa").val(),
              Us_Cargo:  $("#cargo").val(),
              Us_CartaoSUS: $("#cartaoSUS").val(),
              Us_Login:  $("#login").val(),
              Us_Senha:  $("#senha").val(),
              Us_email:  $("#email").val(),
              cpf:       $('#cpfHidden').val()
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
