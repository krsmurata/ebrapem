<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt"> 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title>ENCONTRO BRASILEIRO DE ESTUDANTES DE PÓS-GRADUAÇÃO EM EDUCAÇÃO MATEMÁTICA</title>

    <script language="javascript" src="<?php echo base_url(); ?>js/jquery.js" ></script>
    <script language="javascript" src="<?php echo base_url(); ?>js/javascript.js" ></script>
    <?php echo link_tag('css/style.css'); ?>
</head>
<body>
<div id="geral">
    <div id="menu">
        <ul>
            <li><?php echo anchor('admin', 'inscrições'); ?></li>
            <li><?php echo anchor('admin/trabalhos', 'trabalhos'); ?></li>
            <li><?php echo anchor('sessions/logout', 'SAIR'); ?></li>
        </ul>
    </div>
    <div id="conteudo">
        <h1><?php echo $heading ?></h1>
        <hr>
        
        <div id="erros">
            <?php
                if (isset($error)) {
                    echo "<p>$error</p>";
                }
                echo validation_errors();
            ?>
        </div>
