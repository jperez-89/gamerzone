function AgregarCarrito(Ruta, idJuego) {
    var token = $("input[name='_token']").val();
    var data = { idJuego: idJuego, _token: token };
    $.ajax({
        type: "post",
        url: Ruta,
        data: data,
        success: function (response) {
            if (response.Estado) {
                $("#lblCantCarrito").html(response.Valor);
                alertify.notify(response.Mensaje, 'success', 0, function () { }).dismissOthers();;
            }
            else {
                if (response.Valor == "alerta") {
                    alertify.notify(response.Mensaje, 'warning', 0, function () { }).dismissOthers();;
                }
                else {
                    alertify.notify(response.Mensaje, 'error', 0, function () { }).dismissOthers();;
                }
            }
        }
    });
}

function recargar(segs) {
    setTimeout(function () {
        location.reload();
    }, parseFloat(segs) * 1000);
}