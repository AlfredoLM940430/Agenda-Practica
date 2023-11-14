<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de actividades</title>

    <!-- JQuery  -->
    <script defer src="plugins/jquery/jquery.min.js"></script>

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
    
    <script defer src="js/common.js" type="text/javascript"></script>
    <script defer src="js/activities.js" type="text/javascript"></script>

</head>

<body class="hold-transition layout-top-nav layout-footer-fixed">

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="py-5 text-center">
                        <a href="create" class="btn btn-primary"><i class="fa fa-calendar-plus" aria-hidden="true"></i> Registro</a>
                        <h2>Agenda de actividades institucionales - Centro Universitario del Norte</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="datetimepicker"></div>
                        </div>
                    </div>

                    <div id="events" class="container mt-5">

                    </div>                    
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
</body>

</html>