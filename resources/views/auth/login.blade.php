<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <!-- Enlaces CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Bienvenido</h1>
                <div class="account-wall">
                    <img class="profile-img" src="img/user.png" alt="">
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <input type="text" name="email" class="form-control" placeholder="Correo" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                        <label class="checkbox pull-left">
                        </label>
                    </form>
                </div>
                <a href="register" class="text-center new-account">Crear Usuario </a>
            </div>
        </div>
    </div>
</body>
</html>
