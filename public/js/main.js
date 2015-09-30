$(document).ready(function () {
    $('#messages').fadeIn().delay(3000).fadeOut(function () {
        $(this).remove()
    });
    $("#imagem").filestyle({buttonName: "btn-primary", placeholder: 'Jpg, Png', buttonText: 'Procurar...'});
});