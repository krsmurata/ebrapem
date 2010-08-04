<?php
    if (time() > strtotime('2010-08-02')) :
?>

<p class='destaque'>
    ATENÇÃO! Envio de Trabalhos encerrado.
</p>

<?php
 else:

    $insc = $inscricao[0];
    
    if ($cpf_invalido == true) :
?>
<p class='destaque'>
    Não consta inscrição nesse CPF. Tente outro CPF <?php echo anchor('inscricao/enviar_trabalho','aqui'); ?>.
</p>
<?php 
    elseif ($insc->atividade_id == 1) :
?>
<p class='destaque'>
    ATENÇÃO! Estudantes de Graduação não podem enviar trabalho.
</p>
<?php
    else :
?>
    <p class='confirmada'>Olá <?php echo $insc->nome; ?>,</p>
<?php
        if ($insc->trabalho_enviado == 1) {
            $link = anchor("inscricao/status/$cpf", 'aqui');
            echo "<p class='confirmada'>Seu trabalho já foi enviado! Mais informações $link.</p>";
            echo "<p class='destaque'>ATENÇÃO! Ao enviar seu trabalho de novo, ele substiruirá o antigo.</p>";
        }
?>
    <?php echo form_open_multipart("inscricao/processa_enviar_trabalho/$cpf"); ?>
        <input type="hidden" name="nome" value="<?php echo $insc->nome; ?>">
        <?php $this->load->view('form_enviar_trabalho'); ?>
        <p style="color:red;"><b>* Campos obrigatórios.</b></p>
        <p align="center"><input type="submit" value="Enviar" class="botao"></p>
    <?php echo form_close(); ?>
<?php endif; ?>

<?php endif; ?>
