$(document).ready(function () {
    $('#messages').fadeIn().delay(3000).fadeOut(function () {
        $(this).remove()
    });
    $("#imagem").filestyle({buttonName: "btn-primary", placeholder: 'Jpg, Png', buttonText: 'Procurar...'});
    $("#search").focus();
});
$(document).ready(function () {
    $("#data-realizacao").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
});
$(document).ready(function () {
    $(".excluir-informativo").click(function () {
        var id = $(this).attr('id');
        $(function () {
            $("#dialog-confirm").dialog({
                resizable: false,
                height: 140,
                width: 400,
                modal: true,
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },
                buttons: {
                    "Sim": function () {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/informativos/deletar',
                            data: {
                                'id': id
                            },
                            success: function (response) {
                                $('body').plainOverlay('hide');
                                $('#dialog-confirm').dialog("close");
                                $("[data-referencia='" + id + "']").remove();
                            },
                            beforeSend: function (xhr) {
                                $('body').plainOverlay('show');
                            }
                        });
                    },
                    Cancelar: function () {
                        $(this).dialog("close");
                    }
                }
            });
        });
    });
    
    $(".excluir-agenda").click(function () {
        var id = $(this).attr('id');
        $(function () {
            $("#dialog-confirm").dialog({
                resizable: false,
                height: 140,
                width: 400,
                modal: true,
                show: {
                    effect: "blind",
                    duration: 1000
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },
                buttons: {
                    "Sim": function () {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/agenda/deletar',
                            data: {
                                'id': id
                            },
                            success: function (response) {
                                $('body').plainOverlay('hide');
                                $('#dialog-confirm').dialog("close");
                                $("#msg-sucesso").css("display: block;");
                                $("[data-referencia='" + id + "']").remove();
                            },
                            beforeSend: function (xhr) {
                                $('body').plainOverlay('show');
                            }
                        });
                    },
                    Cancelar: function () {
                        $(this).dialog("close");
                    }
                }
            });
        });
    });
});