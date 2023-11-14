$(document).ready(function () {

    calendarioMark();

    $('#datetimepicker').datetimepicker({inline: true, sideBySide: true});

    $('#datetimepicker').on('change.datetimepicker', function(evento) {
        const fecha = evento.date.toISOString();
        $('#date').val(fecha);
    });

    tipoActividad();
    tipoModalidad();

    $("#form").submit(function (e) { 
        e.preventDefault();
        validarFormulario();
    });

    $("#submit").click(function(){
        $("#form").addClass("was-validated");
    });

    $('#salir').click(function (e) { 
        e.preventDefault();
        cerrarSesionModal();
    });
});

function calendarioMark() {
    $.ajax({
        type: "POST",
        url: "webservice/",
        data: {
            method: 'activities.all'
        },
        success: function (data) {
            $('#datetimepicker').datetimepicker('markers', data);
            $('#datetimepicker').datetimepicker('date', new Date());
        }
    });
}

function cerrarSesionModal() {

    Swal.fire({
        title: '¿Cerrar Sesión?',
        showDenyButton: true,
        confirmButtonText: 'Cerrar',
        denyButtonText: `No cerrar`,
      }).then((result) => {
        if (result.isConfirmed) {
            toastr.warning('Cerrando sesión...');
            cerrarSesion();
        } else if (result.isDenied) {
          Swal.fire('La sesión Continuará Abirta', '', 'info')
        }
      })
}

function cerrarSesion() {

    $.ajax({
        type: "POST",
        url: "webservice/",
        data: {
            method: "system.logout",
        },
        success: function(respuesta) {
            if (respuesta.status == 'success') {
                window.location = '/practicas/dev1';
            } else
                toastr.warning(respuesta.message);
        },
        error: function(respuesta) {
            toastr.error(respuesta.message);
        }
    });
}

function validarFormulario() {

    let errores = [];

    const type = $('#type').val();
    const assistancetype = $('#assistancetype').val();
    const date = $('#date').val();
    const name = $('#name').val();
    const responsable = $('#responsable').val();
    const personalities = $('#personalities').val();
    const typeother = $('.typeother').val();
    const assistancetypeother = $('.assistancetypeother').val();

    if(type === null) {
        errores.push('Especifique el tipo de actividad');
    }

    if(assistancetype === null) {
        errores.push('Especifique la modalidad del evento');
    }

    if(type == 0 && typeother === '') {
        errores.push('Especifique el otro tipo de actividad');
    }

    if(assistancetype == 0 && assistancetypeother === '') {
        errores.push('Especifique el otro tipo de modalidad');
    }

    if(date === '') {
        errores.push('Especifique la fecha y hora del evento');
    }

    if(name === '') {
        errores.push('Especifique el nombre de la actividad');
    }

    if(responsable === '') {
        errores.push('Especifique el nombre de la unidad responsable del evento');
    }

    if(personalities === '') {
        errores.push('Especifique si es que acudiran personalidades al evento \n');
    }

    if(errores.length > 0) {
        errores.forEach((error) => {
            toastr.warning(error);
        });
        return;
    }

    const datos = {type, assistancetype, typeother, assistancetypeother, date, name, responsable, personalities}
    enviarFormulario(datos);
}

function enviarFormulario(datos) {
    
    const {type, assistancetype, typeother, assistancetypeother, date, name, responsable, personalities} = datos;
    const formato = {
        method: 'activities.create',
        type, 
        assistancetype, 
        typeother, 
        assistancetypeother, 
        date, 
        name, 
        responsable, 
        personalities
    }
    
    $.ajax({
        type: "POST",
        url: "webservice/",
        data: formato,

        success: function (data) {
            if (data.status == 'success') {    
                toastr.success(data.message);
                $("#form").removeClass("was-validated");
                form.reset();
                calendarioMark();
            } else {
                toastr.warning(data.message);
                $("#form").removeClass("was-validated");
                form.reset();
            }
        },
        error: function (data){
            toastr.error(data.message);
            $("#form").removeClass("was-validated");
            form.reset();
        }
    });
}

function tipoActividad() {
    const otraOpcion = $('.typeother');
    const type = $('#type');

    type.change(function(){

        const seleccion = $('option:selected', this).attr('class');
    
        if(seleccion == 'editable'){
          otraOpcion.attr('disabled', false);
          otraOpcion.show();
        }else{
          otraOpcion.hide();
          otraOpcion.attr('disabled', true);
        }

    });   //Evento
}

function tipoModalidad() {
    const otraOpcion = $('.assistancetypeother');
    const modalidad = $('#assistancetype');

    modalidad.change(function(){

        const seleccion = $('option:selected', this).attr('class');
    
        if(seleccion == 'editable'){
          otraOpcion.attr('disabled', false);
          otraOpcion.show();
        }else{
          otraOpcion.hide();
          otraOpcion.attr('disabled', true);
        }

    });
}

