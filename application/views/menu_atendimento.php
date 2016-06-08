<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
?>

<div class="menuDireito">
    <ul>
        <a href="cadastroPaciente"><li>CADASTRAR PACIENTE</li></a>
        <?php
            if($nivel == 1 || $nivel == 2)
            {
                echo '<a href="'.site_url("cadastroCaracterizacaoPaciente").'"><li>CADASTRAR CARACTERIZAÇÃO</li></a>';
            }
        ?>

        <a href="<?php echo site_url("cadastroSolicitacao");?>"><li>REALIZAR SOLICITAÇÃO</li></a>
    </ul>
</div>

<div class="menuEsquerdo">
    <ul>
        <a href="<?php echo site_url("consultaPaciente"); ?>"><li>CONSULTAR PACIENTE</li></a>
        <a href="<?php echo site_url("consultaCaracterizacao"); ?>"><li>CONSULTAR CARACTERIZAÇÃO</li></a>
        <a href="<?php echo site_url("consultaSolicitacao");?>"><li>CONSULTAR SOLICITAÇÃO</li></a>
    </ul>
</div>

<div class="menuInferior">
    <ul>
        <a href="<?php echo site_url("andamentoPaciente"); ?>"><li>ANDAMENTO DE PACIENTE</li></a>
        <a href="<?php echo site_url("menu"); ?>"><li>VOLTAR AO MENU PRINCIPAL</li></a>
    </ul>
</div>
