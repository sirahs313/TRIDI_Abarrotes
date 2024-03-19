<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Enlaces CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Regístrate</h1>
                <div class="account-wall">
                    <img class="profile-img" src="img/user.png" alt="">
                    <form class="form-signin" method="POST" action="{{ route('register') }}">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <input type="text" name="name" class="form-control" placeholder="Usuario" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
                    </form>
                </div>
                <a href="{{ route('login') }}" class="text-center new-account">¿Ya tienes una cuenta? Inicia sesión aquí</a>
            </div>
        </div>
    </div>
</body>
</html>
