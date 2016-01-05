<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
?>

<div class="menuDireito">
    <ul>
        <a href="CadastroDePacientes.php"><li>CADASTRAR PACIENTE</li></a>
        <?php
            if($nivel == 1 || $nivel == 2)
            {
                echo '<a href="CadastroDeProntuario.php"><li>CADASTRAR PRONTUÁRIO</li></a>';
            }
        ?>

        <a href="CadastrarSolicitacao.php"><li>REALIZAR SOLICITAÇÃO</li></a>
    </ul>
</div>

<div class="menuEsquerdo">
    <ul>
        <a href="ConsultaDePacientes.php"><li>CONSULTAR PACIENTE</li></a>
        <a href="ConsultaDeProntuarios.php"><li>CONSULTAR PRONTUÁRIO</li></a>
        <a href=""><li>CONSULTAR SOLICITAÇÃO</li></a>
    </ul>
</div>

<div class="menuInferior">
    <ul>
        <a href=""><li>ANDAMENTO DE PACIENTE</li></a>
        <a href="<?php echo base_url(); ?>index.php/menu"><li>VOLTAR AO MENU PRINCIPAL</li></a>
    </ul>
</div>
