$('#login').on('submit', function(evt) {

    evt.preventDefault();
    
    $.ajax({
        type: "post",
        url: "webservice/",
        data: {
            method: 'system.login',
            username: $('#username').val(),
            password: $('#password').val()
        },
        success: function(respuesta) {
            if (respuesta.status == 'success') {
                window.location.reload();
            } else
                toastr.warning(respuesta.message);
        },
        error: function(respuesta) {
            toastr.error(respuesta.message);
        }
    })
});


