$(document).ready(function () {
    $('#messages').fadeIn().delay(3000).fadeOut(function () {
        $(this).remove()
    });
    $("#img").filestyle({buttonName: "btn-primary", placeholder: 'Imagem', buttonText: 'Procurar...'});
});