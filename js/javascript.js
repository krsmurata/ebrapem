$(document).ready(function() {
    
    if ($("input[name=enviar_trabalho]:radio:checked").val() == 1) {
        $('#form_enviar_trabalho').show();
    }

    $('input[name=enviar_trabalho]:radio').change(function(){
        if ($("input[name=enviar_trabalho]:radio:checked").val() == 1) {
            $('#form_enviar_trabalho').slideDown('slow');
        }
        else {
            $('#form_enviar_trabalho').hide();
        }
    });

});

