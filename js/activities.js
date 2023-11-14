$(document).ready(function () {
    
    $('#datetimepicker').datetimepicker({inline: true});

    $('#datetimepicker').on('change.datetimepicker', function(evento) {
        verDia(evento)
    });

    $.ajax({
        type: "POST",
        // url: "https://localhost/practicas/dev1/webservice",
        url: "webservice/",
        data: {
            method: 'activities.all'
        },
        success: function (data) {
            $('#datetimepicker').datetimepicker('markers', data);
            $('#datetimepicker').datetimepicker('date', new Date());
        }
    });

});

function verDia(evento) {

    const fecha = evento.date.toISOString();

    $.ajax({
        type: "POST",
        // url: "https://localhost/practicas/dev1/webservice",
        url: "webservice/",
        data: {
            method: 'activities.read',
            date: fecha,
        },
        success: function (response) {
            if(response.length === 0) {
                msjCondicional();
            } else {
                imprimirDia(response);
            }
        }
    });  
}

function imprimirDia(response) {
    // console.log(response);
    
    const contenedor = $('#events');
    contenedor.empty();

    response.forEach(elemento => {
        // console.log(elemento);
        const fecha = new moment(elemento.date);
        const tipo = ["Otro", "Académica", "Deportiva", "Cultural", "Protocolaria"]; //Orden -> tipo de respuesta -> posicion arreglo
        const tipoAsistencia = ["Otro", "Presencial", "No Presencial"];

        let evento = '';
        if(elemento.type === 0) {
            evento = elemento.typeother
        } else {
            evento = tipo[elemento.type]
        }

        let asistencia = '';
        if(elemento.assistancetype === 0) {
            asistencia = elemento.assistanceother
            if(elemento.assistanceother === null) {
                asistencia = 'Precencial(*Autogenerado)';
            }
        } else {
            asistencia = tipoAsistencia[elemento.assistancetype];
        }

        const responsable = elemento.responsable;
        const personalities = elemento.personalities;

        contenedor.append(`
            <div class="row row-striped">
                <div class="col-lg-1 col-12 text-center">
                    <h1 class="display"><span class="badge badge-primary">${fecha.format('DD')}</span></h1>
                    <h4 class="text-uppercase">${fecha.format('MMM')}</h4>
                </div>

                <div class="col">
                    <h5 class="text-justify text-uppercase"><strong>${elemento.name}</strong></h5>
                    <ul class="list-inline">
                        <li class="list-inline-item" style="color: #5e6266"><i class="fa fa-clock-o"></i> ${fecha.format('hh:mm')}</li>
                        <li class="list-inline-item" style="color: #1967d2"><i class="fa fa-list-ul"></i> ${evento} </li>
                        <li class="list-inline-item" style="color: #dd4b3e"><i class="fa fa-map-marker"></i> ${asistencia} </li>
                        <li class="list-inline-item" style="color: #cc931c"><i class="fa fa-bookmark"></i>${responsable}</li>
                        <li class="list-inline-item" style="color: #277117"><i class="fa fa-users"></i>${personalities}</li>
                    </ul>
                </div>
            </div>   
        `);
    });
}

function msjCondicional() {
    const contenedor = $('#events');
    contenedor.empty();

    contenedor.append(`
        <div class="row">
            <div class="col">
                <div class="jumbotron text-center" style="margin-top: auto;margin-bottom: auto;">
                    <h1 class="">
                        <i class="fa fa-calendar-times-o" style="color: #4183f1;"></i>
                    </h1>
                    <p>No hay eventos registrados para este día</p>
                </div>
            </div>
        </div>
    `);
}



