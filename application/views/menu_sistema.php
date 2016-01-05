<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("nivel");
?>
<div class="menu">
    <ul>
        <?php
            if($nivel == 1 || $nivel == 4)
            {
                echo '<a href="ConsultaDeProteses.php"><li>PRÓTESES AUDITIVAS</li></a>
                      <a href="html/consultaImplantes.html"><li>IMPLANTES COCLEARES</li></a>';
            }
        ?>

        <a href="html/consultaProcPrinc.html"><li>PROCEDIMENTOS</li></a>
        <?php
            if($nivel == 1)
            {
                echo '<a href=""><li>RELATÓRIO FINANCEIRO</li></a>';
            }
        ?>

        <a href=""><li>CADASTRO DE USUARIOS</li></a>
    </ul>
</div>

<div class="menuInferior">
    <ul>
        <a href="<?php echo base_url(); ?>index.php/menu"><li>VOLTAR AO MENU PRINCIPAL</li></a>
    </ul>
</div>
