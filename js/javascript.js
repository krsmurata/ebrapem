$(document).ready(function() {

    $('.confirmar').click(function(){
        var answer = confirm('Confirmar Pagamento?');
        return answer // answer is a boolean
    });
    
    if ($("input[name=enviar_trabalho]:radio:checked").val() == 1) {
        $('#form_enviar_trabalho').show();
    }
    
    if ($("input[id=atividade]:radio:checked").val() == 1) {
        $(':input[name=enviar_trabalho]').attr('disabled', true);
        $(':input[name=enviar_trabalho][value=0]').attr('checked', true);
        $('#enviar_trabalho_aviso').slideDown('slow');
    }
    
    $('input[name=enviar_trabalho]:radio').change(function(){
        if ($("input[name=enviar_trabalho]:radio:checked").val() == 1) {
            $('#form_enviar_trabalho').slideDown('slow');
        }
        else {
            $('#form_enviar_trabalho').hide();
        }
    });

    $('input[id=atividade]:radio').change(function (){
        if ($("input[id=atividade]:radio:checked").val() == 1) {
            $(':input[name=enviar_trabalho]').attr('disabled', true);
            $(':input[name=enviar_trabalho][value=0]').attr('checked', true);
            $('#enviar_trabalho_aviso').slideDown('slow');
        } else {
            $(':input[name=enviar_trabalho]').removeAttr('disabled');
            $('#enviar_trabalho_aviso').slideUp('slow');            
        }   
    });

});

