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
                echo '<a href="'.base_url().'index.php/cadastroCaracterizacaoPaciente"><li>CADASTRAR CARACTERIZAÇÃO</li></a>';
            }
        ?>

        <a href="CadastrarSolicitacao.php"><li>REALIZAR SOLICITAÇÃO</li></a>
    </ul>
</div>

<div class="menuEsquerdo">
    <ul>
        <a href="<?php echo base_url(); ?>index.php/consultaPaciente"><li>CONSULTAR PACIENTE</li></a>
        <a href=""><li>CONSULTAR CARACTERIZAÇÃO</li></a>
        <a href=""><li>CONSULTAR SOLICITAÇÃO</li></a>
    </ul>
</div>

<div class="menuInferior">
    <ul>
        <a href=""><li>ANDAMENTO DE PACIENTE</li></a>
        <a href="<?php echo base_url(); ?>index.php/menu"><li>VOLTAR AO MENU PRINCIPAL</li></a>
    </ul>
</div>
