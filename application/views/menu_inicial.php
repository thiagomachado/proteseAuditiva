<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class = "menu">
        <ul>
            <?php
                if($this->session->userdata("nivel") != 4)
                {
                    echo '<a href="'.base_url().'index.php/atendimento"><li class = "liInicial">ATENDIMENTO</li></a>';
                }
            ?>

            <a href="<?php echo base_url(); ?>index.php/sistema"><li class = "liInicial">SISTEMA</li></a>
            <a href="<?php echo base_url(); ?>index.php/meusDados"><li class = "liInicial">MEUS DADOS</li></a>
            <a href="<?php echo base_url(); ?>index.php/sair"><li class = "liInicial">SAIR</li></a>
        </ul>
</div>
