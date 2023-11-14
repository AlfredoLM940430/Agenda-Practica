<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar</title>

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

    <script defer src="js/common.js" type="text/javascript"></script>
    <script defer src="js/login.js" type="text/javascript"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Ingresar</a>
            </div>
            <div class="card-body">
                <form class="form-signin" id="login" method="POST">
                    <input type="hidden" name="method" value="system.login">
                    <label for="username" class="sr-only">Usuario</label>
                    <input type="number" name="username" id="username" class="form-control" placeholder="Usuario moodle" required autofocus>
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                    <p class="mt-5 mb-3 text-muted">Coordinación de Extensión</p>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</body>

</html>