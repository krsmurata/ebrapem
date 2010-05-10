<?php if ($cpf_invalido == true) : ?>
<p class='destaque'>
    Não consta inscrição nesse CPF. Tente outro CPF <?php echo anchor('inscricao/status','aqui'); ?>.
</p>
<?php else : ?>
<?php
    $insc = $inscricao[0];

    if ($insc->pag_confirmado == 1) {
        $status = "<p class='confirmada'>INSCRIÇÃO CONFIRMADA!</p>";
    }
    elseif ($insc->pag_data_envio && $insc->pag_confirmado == 0) { 
        $status = "<p class='aguardando-conf'>Comprovante de pagamento enviado, aguardando confirmação.</p>";
    }
    else {
        $link = anchor("inscricao/confirmar_pagamento/$cpf", 'aqui');
        $status = "<p class='aguardando-comp'>Aguardando envio de comprovante. Envie seu comrpovante $link.</p>";
    }
?>
<?php echo $status; ?>
<?php endif; ?>
