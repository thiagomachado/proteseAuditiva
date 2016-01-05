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
        $dataUsuario = array(
                'name'          => 'nomeUsuario',
                'id'            => 'caixadetexto',
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
                'name'          => 'submit',
                'value'         => 'Entrar',
                'id'            => 'loginButton',
        );
        echo '<tr class="ultimaLinha"><td>'.form_submit($dataSubmit).'</td>';
        echo '<td><a class="linkEsqueciMinhaSenha" href="recuperarSenha.php">Esqueci minha senha</a></td></tr></table>';

        echo form_close();
        echo '</div>';
    ?>
</div>
