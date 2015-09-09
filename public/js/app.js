$(document).ready(function () {
    $('#mensagem-sucesso').fadeIn().delay(3000).fadeOut(function () {
        $(this).remove()
    });
    $('#email-cadastro').on('blur', function () {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/core/verificacoes/verifica-email-usuario',
            data: $(this).serialize(),
            beforeSend: function ()
            {
                $('body').plainOverlay('show');
            },
            complete: function ()
            {
                $('body').plainOverlay('hide');
            },
            success: function (response) {
                if (response.status == false) {
                    $("#email-sucess-message").css('display', 'none');
                    $("#email-error-message").css('display', 'block');
                } else {
                    $("#email-error-message").css('display', 'none');
                    $("#email-sucess-message").css('display', 'block');
                }
            }
        });
        return false;
    });
    $("#cadastro").on("submit", function ()
    {
        $.ajax({
            type: 'POST',
            url: '/app/index/cadastre-se',
            data: $(this).serialize(),
            beforeSend: function ()
            {
                $('body').plainOverlay('show');
            },
            complete: function ()
            {
                $('body').plainOverlay('hide');
            }
        });
    });
});