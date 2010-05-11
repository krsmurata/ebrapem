<?php if ($cpf_invalido == true) : ?>
<p class='destaque'>
    Não consta inscrição nesse CPF. Tente outro CPF <?php echo anchor('inscricao/confirmar_pagamento','aqui'); ?>.
</p>
<?php else : ?>
    <?php
        $insc = $inscricao[0];
        if (($insc->pag_confirmado == 1) || ($insc->pag_data_envio && $insc->pag_confirmado == 0)) : ?> 
    <?php
            $link = anchor("inscricao/status/$cpf", 'aqui');
            if ($insc->pag_confirmado == 1) {
                $status = "<p class='confirmada'>Sua inscrição já está confirmada! Mais informações $link.</p>";
            }
            elseif ($insc->pag_data_envio && $insc->pag_confirmado == 0) {
                $status = "<p class='aguardando-conf'>Você já enviou o comprovante de pagamento enviado, aguardando confirmação. Mais informações $link.</p>";
            }
            echo $status;
    ?>
    <?php else : ?>
    <p class='confirmada'>Olá <?php echo $insc->nome; ?>,</p>
    <p class='destaque'>
        ATENÇÃO! A sua inscrição só será efetuada depois da confirmação do pagamento por parte da organização.
    </p>
    
    <p>
       Para finalizar sua inscrição é necessário efetuar o pagamento através de depósito ou transferência bancária: 
    </p>
    
    <div id="info-deposito">
        <p>Banco: <strong>Banco do Brasil</strong></p>
        <p>Agência: <strong>4421-0</strong></p>
        <p>Conta: <strong>5501-8</strong></p>
        <p>Nome: <strong>KARLA JOCELYA NONATO</strong></p>
    </div>
    
    <p class='destaque'>
        ATENÇÃO! Não serão aceitas tranferências ou depósitos agendados.<br />
        Depósitos com envelope e DOC's podem demorar até 2 dias úteis para confirmação.
    </p>
    
    <p>
        Após o pagamento é necessário enviar a imagem do comprovante digitalizada ou o comprovante online no formulário abaixo:
    </p>
    
    <?php echo form_open_multipart("inscricao/processa_confirmar_pagamento/$cpf"); ?>
        <fieldset>
        <legend>Enviar Comprovante</legend>
        <p><b>CPF:</b> <?php echo $cpf; ?></p>
        <p><b>Valor:</b> R$ <?php echo $insc->valor; ?></p>
        <p><b>*Número do Documento:</b> <input type="text" value="<?php echo set_value('pag_num_doc'); ?>" name="pag_num_doc" maxlength="20" size="20"></p>
        
        <p><b>*Confirmar Número do Documento:</b> <input type="text" value="<?php echo set_value('pag_num_doc_conf'); ?>" name="pag_num_doc_conf" maxlength="20" size="20"></p>
    
        <p><b>*Comprovante:</b> <input type="file" name="pag_arquivo" size="20" /> (DOC/PDF/JPEG/JPG/PNG/GIF)</p>
     
        <p>
            <b>Outras Informações:</b>
        </p>
        
        <textarea value="<?php echo set_value('pag_comprovante'); ?>" name="pag_comprovante" cols="60" rows="10"></textarea>
        <p style="color:red;"><b>* Campos obrigatórios.</b></p>
        
        <p align="center"><input type="submit" value="Enviar" class="botao"></p>
        </fieldset>
    <?php echo form_close(); ?>
    <?php endif; ?>
<?php endif; ?>
