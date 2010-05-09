<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt"> 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title>ENCONTRO BRASILEIRO DE ESTUDANTES DE PÓS-GRADUAÇÃO EM EDUCAÇÃO MATEMÁTICA</title>

    <script language="javascript" src="<?php echo base_url(); ?>jquery.js" ></script>
</head>
<body>
<p align="center"> 
    <?php echo img('imagens/logo.jpg'); ?>
</p> 
<h1><?php echo anchor(base_url(), 'Inscrições'); ?> >> <?php echo $heading ?></h1>
<hr>
<?php if (isset($error)) : ?>
<div style="color:red;">
    <?php echo "<p><b>$error</b></p>"; ?>
</div>
<?php endif; ?>

