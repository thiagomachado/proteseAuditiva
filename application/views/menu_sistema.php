<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $nivel = $this->session->userdata("usuario")->Us_Nivel;
?>
<div class="menu">
    <ul>
        <?php
            if($nivel == 1 || $nivel == 4)
            {
                echo '<a href="'.site_url("estoqueProteses").'"><li>PRÓTESES AUDITIVAS</li></a>
                      <a href="'.site_url("estoqueImplantes").'"><li>IMPLANTES COCLEARES</li></a>';
            }
        ?>

        <a href="<?php echo site_url("procedimento"); ?>"><li>PROCEDIMENTOS</li></a>
        <?php
            if($nivel == 1)
            {
                echo '<a href=""><li>RELATÓRIO FINANCEIRO</li></a>';
            }
        ?>
        <?php
          if($nivel == 1)
          {
              echo '<a href="'.site_url("cadastroUsuario").'"><li>CADASTRO DE USUARIOS</li></a>';
          }          
        ?>
    </ul>
</div>

<div class="menuInferior">
    <ul>
        <a href="<?php echo base_url(); ?>index.php/menu"><li>VOLTAR AO MENU PRINCIPAL</li></a>
    </ul>
</div>
