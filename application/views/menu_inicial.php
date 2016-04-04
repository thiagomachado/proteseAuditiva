<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class = "menu">
        <ul>
            <?php
                if($this->session->userdata("nivel") != 4)
                {
                    echo '<a href="'.site_url("atendimento").'"><li class = "liInicial">ATENDIMENTO</li></a>';
                }
            ?>

            <a href="<?php echo site_url("sistema"); ?>"><li class = "liInicial">SISTEMA</li></a>
            <a href="<?php echo site_url("meusDados"); ?>"><li class = "liInicial">MEUS DADOS</li></a>
            <a href="<?php echo site_url("sair"); ?>"><li class = "liInicial">SAIR</li></a>
        </ul>
</div>
