<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery  -->
    <script defer src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Adminlte -->
    <script defer src="plugins/adminlte/adminlte.min.js"></script>
    <link rel="stylesheet" href="plugins/adminlte/adminlte.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.css">

    <!-- Bootstrap -->
    <script defer src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Toastr -->
    <script defer src="plugins/toastr/toastr.min.js"></script>
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

    <!-- Moment -->
    <script defer src="plugins/moment/moment.min.js"></script>
    <script defer src="plugins/moment/locale/es-mx.js"></script>

    <!-- TempusDominus -->
    <script defer src="plugins/tempusdominus/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="plugins/tempusdominus/tempusdominus-bootstrap-4.min.css">

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/styles.css">
    <script defer src="js/create.js" type="text/javascript"></script>
    <script defer src="js/common.js" type="text/javascript"></script>

    <title>Crear Evento</title>
</head>
<body>

    <main class="container">

        <header class="text-center">
            <a class="m-4 btn btn-primary" href="/practicas/dev1" name="Salir">Agenda</a>

            <button class="iSalir" id="salir">
                <i class="fas fa-sign-out-alt fa-xs" style="color: #ffffff;"></i>
            </button>

            <h4> <b> Agenda de actividades institucionales – Centro Universitario del Norte</b></h4>
            <p class="m-4">Para solicitar agenda y cobertura de una actividad, favor de llenar el presente formato</p>
        </header>

        <form id="form">

            <input type="hidden" name="method" value="activities.create">

            <div class="row">
                <div class="form-group col">
                    <label for="type"> <i class="fa fa-list-ul"></i> <b>Tipo de Actividad</b></label>
                    <select name="type" class="form-control" required id="type">
                      <option disabled selected value="">-- Seleccione --</option>
                      <option class="academica" value=1 >Academica</option>
                      <option class="deportiva" value=2 >Deportiva</option>
                      <option class="protocolaria" value=3 >Protocolaria</option>
                      <option class="cultural" value=4 >Cultural</option>
                      <option class="editable" value=0 >Otra Opción</option>
                    </select>
                    <input
                        class="typeother"
                        placeholder="Agrege otra opción"
                        style="display:none;"
                        name="typeother"
                        required
                        disabled
                    ></input>
                </div>

                <div class="form-group col">
                    <label for="assistancetype"> <i class="fa fa-map-marker"></i> <b>Modalidad</b></label>
                    <select name="assistancetype" class="form-control" required id="assistancetype">
                      <option disabled selected value="">-- Seleccione --</option>
                      <option class="presencial" value="1">Presencial</option>
                      <option class="linea" value="2">En Linea</option>
                      <option class="editable" value=0>Otra Opción</option>
                    </select>
                    <input
                        class="assistancetypeother"
                        placeholder="Agrege otra opción"
                        style="display:none;"
                        name="assistancetypeother"
                        required
                        disabled
                    ></input>
                </div>
            </div>

            <br>

            <!-- Calendario -->
            <div class="row">
                <div class="col-md-12">
                    <div id="datetimepicker"></div>
                </div>
            </div>
            <input type="hidden" name="date" id="date" required>

            <div class="form-group mt-3">
                <label for="name"> <i class="fas fa-comment-alt"></i> <b>Nombre de la actividad y breve descripción de la misma</b></label>
                <input name="name" type="text" class="form-control" id="name" required>
            </div>

            <div class="form-group mt-3">
                <label for="responsable"> <i class="fa fa-bookmark"></i> <b>Nombre de la unidad responsable / Nombre y contacto de la persona responsable de la actividad (Teléfono y correo electrónico).</b></label>
                <input name="responsable" type="text" class="form-control" id="responsable" required>
            </div>

            <div class="form-group mb-5">
                <label for="personalities"> <i class="fa fa-users"></i> <b>Mencionar si el Rector, alguna autoridad o directivo del Centro Universitario, o de otra institución, participa en presídium.</b></label>
                <input name="personalities" type="text" class="form-control" id="personalities" required>
            </div>

            <input id="submit" type="submit" class="btn btn-primary btn-block mb-5" value="Enviar">
        </form>

    </main>

</body>
</html>