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
        $status = "<p class='aguardando-comp'>Aguardando envio de comprovante. Envie seu comprovante $link.</p>";
    }
?>
<div id="status">
    <?php
        echo $status;
        
        if ($insc->trabalho_aprovado == 1) { 
            echo "<p class='confirmada'>Parabéns! Seu trabalho já foi aprovado.</p>";
        }
    ?>
</div>
<div id="info">
    <h2>Inscrição</h2>
    <p><b>Data: </b>  <?php echo $insc->criado_em; ?></p>
    <p><b>Valor: </b>  R$ <?php echo $insc->valor; ?></p>

    <p><b>Nome:</b> <?php echo $insc->nome; ?></p>
    <p><b>Atividade:</b> <?php echo $atividade[0]->nome; ?></p>
    <p><b>CPF:</b> <?php echo $insc->cpf; ?></p>
    <p><b>Data de Nascimento:</b> <?php echo $insc->data_nascimento; ?></p>
    
    <p><b>Endere&ccedil;o:</b>  <?php echo $insc->endereco; ?></p> 
     
    <p>
        <b>Cidade:</b> <?php echo $insc->cidade; ?>
        <b>Estado:</b> <?php echo $insc->estado; ?>
    </p> 
     
    <p>
        <b>CEP:</b> <?php echo $insc->cep; ?>
        <b>Pa&iacute;s:</b> <?php echo $insc->pais; ?>
    </p> 
     
    <p><b>Telefone:</b>  <?php echo $insc->telefone; ?></p> 
     
    <p><b>Email:</b> <?php echo $insc->email; ?></p>  
</div>

    <?php if ($insc->trabalho_enviado == 1) : ?>
    <div id="trabalho">
        <h2>Trabalho</h2>
        <p><b>Título:</b> <?php echo $insc->trabalho_titulo; ?></p>
        <p>
            <b>Arquivo:</b>
            <a href='<?php echo base_url(); ?>trabalhos/<?php echo $insc->trabalho_arquivo; ?>'><?php echo $insc->trabalho_arquivo; ?></a>
        </p>
        <p>
            <b>Carta de Recomendação:</b>
            <?php if (!empty($insc->trabalho_carta)) : ?>
            <a href='<?php echo base_url(); ?>trabalhos/<?php echo $insc->trabalho_carta; ?>'><?php echo $insc->trabalho_carta; ?></a>
            <?php else : ?>
            -
            <?php endif; ?>
        </p>
   </div>
    <?php endif; ?>
<?php endif; ?>
