<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="areaFormulario">
    <div class="areaMensagem"><p>SEJA BEM VINDO(A)!</p></div>

    <?php
        echo '<div class="areaCampos">';

        echo form_open('login/logar', 'name="formLogin"');
        echo '<table id="tabela">';

        if(isset($mensagem))
        {
            echo '<tr><td colspan=2><label style="color: #ff0000;margin-left: 20px;">'.$mensagem.'</label><td></tr>';
        }
        else
        {
          echo '<tr colspan=2><td></td></tr>';
        }

        echo
        ('
                <tr>
                    <td>Usuário:</td>

        ');
        $data_form = array(
            'id' => 'formRecuperarSenha'
        );

        $dataUsuario = array(
                'name'          => 'nomeUsuario',
                'id'            => 'caixadetexto',
                'size'          => '20',
                'required'      => '',
        );
        $dataUsuarioEsqueciSenha = array(
                'name'          => 'usuarioEsqueciSenha',
                'id'            => 'usuarioEsqueciSenha',
                'size'          => '20',
                'required'      => '',
        );

        echo '<td>'.form_input($dataUsuario).'</td></tr>';
        echo
        ('
            <tr>
                <td>Senha:</td>
        ');
        $dataSenha = array(
                'name'          => 'senha',
                'id'            => 'caixadetexto',
                'size'          => '20',
                'required'      => '',
        );
        echo '<td>'.form_password($dataSenha).'</td></tr>';

        $dataSubmit = array(
                'type'          => 'submit',
                'value'         => 'Entrar',
                'id'            => 'loginButton',
                'class'         => 'botao'
        );
        echo '<tr class="ultimaLinha"><td>'.form_submit($dataSubmit).'</td>';
        echo '<td><a class="linkEsqueciMinhaSenha" onclick="mostrarModal(\'#modalEsqueciSenha\')">Esqueci minha senha</a></td></tr></table>';

        echo form_close();
        echo '</div>';
    ?>
    <div class="fundoModal" id="fundoModal">

      <div class="modal" id="modalEsqueciSenha">
        <?php echo form_open("",$data_form); ?>
        <div class="textoModal">
          <h1>Recuperar Senha</h1>
          <p>Informe o nome de usuário:</p>
          <div id="nomeUsuario"><?php echo form_input($dataUsuarioEsqueciSenha); ?></div>
        </div>
        <div class="botoesModal">
          <input type="submit" id="recuperarSenha" class="botao" value="Recuperar"/>
          <input class="botao" type="button" onclick="esconderModal('#modalEsqueciSenha')" value="Cancelar"/>
        </div>
        <?php echo form_close(); ?>
      </div>


      <div class="modal" id="modalSucesso">
        <div class="textoModal">
          <h1>Sucesso!</h1>
          <p>Uma nova senha foi enviada para o e-mail cadastrado.</p>
        </div>

        <div class="botoesModal">
          <input class="botao" onclick="esconderModal('#modalSucesso')" value="Concluir"/>
        </div>
      </div>

      <div class="modal" id="modalErro">
        <div class="textoModal">
          <h1>Erro!</h1>
          <p>Usuario não cadastrado.</p>
        </div>

        <div class="botoesModal">
          <input class="botao" onclick="esconderModal('#modalErro')" value="Ok"/>
        </div>
      </div>
    </div>
</div>


<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    $("#formRecuperarSenha").on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/recuperarSenha",
            dataType: 'json',
            data:
            {
              login:$("#usuarioEsqueciSenha").val(),
            },
            success: function(res)
            {
                esconderModal('#modalEsqueciSenha');
                mostrarModal('#modalSucesso');
                if (res)
                {
                  console.log(res);
                }
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
              esconderModal('#modalEsqueciSenha');
              mostrarModal('#modalErro');
              console.log(xhr.status);
              console.log(thrownError);
            }

        });
    });
});
</script>
