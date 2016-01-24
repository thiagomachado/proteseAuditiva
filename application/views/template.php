<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

  <head lang = "pt-br">
    <title><?php echo $title; ?> </title>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js"></script>

    <?php
    echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
    echo link_tag('assets/css/template.css');
    if(isset($css))
    {
        echo $css; //if it exists, load the extra css.
    }
    if(isset($script))
    {
        echo $script;
    }
    ?>

  </head>

  <body>
    <div id="header">
      <img src="<?php echo base_url();?>assets/css/imagens/vwsus.jpg" class="le" />
      <img src="<?php echo base_url();?>assets/css/imagens/minis.jpg" class="le" />
      <img src="<?php echo base_url();?>assets/css/imagens/logohucff.jpg" class = "ld" />
      <h1><?php echo $title; ?> </h1>
    </div>

    <div id="contents">
      <?php echo $contents;?>
    </div>
  </body>

</html>
