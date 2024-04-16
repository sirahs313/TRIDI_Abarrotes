<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Enlaces CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style media="screen">
        /* Estilos CSS */
        body {
            background-color: #080710;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .login-title {
            text-align: center;
            color: #ffffff;
        }

        .account-wall {
            background-color: rgba(255, 255, 255, 0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        .form-signin {
            margin-bottom: 0;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            color: #ffffff;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .btn-primary {
            background-color: #ffffff;
            color: #080710;
            border-radius: 5px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #f0f0f0;
        }

        .new-account {
            text-align: center;
            color: #ffffff;
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }

        .new-account:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Regístrate</h1>
                <div class="account-wall">
                    <!-- <img class="profile-img" src="img/user.png" alt=""> -->
                    <form class="form-signin" method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <input type="text" name="name" class="form-control" placeholder="Usuario" required autofocus>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
                    </form>
                </div>
                <a href="{{ route('login') }}" class="text-center new-account">¿Ya tienes una cuenta? Inicia sesión aquí</a>
            </div>
        </div>
    </div>
    
    <?php
        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conexión a la base de datos (reemplaza los valores con los tuyos)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tridi";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Recibir datos del formulario
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Hash de la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertar los datos en la base de datos
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Usuario registrado exitosamente</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Cerrar conexión
            $conn->close();
        }
    ?>

    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var uppercaseRegex = /[A-Z]/;
            var symbolRegex = /[!@#$%^&*(),.?":{}|<>]/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                alert("Por favor, introduce un correo electrónico válido.");
                return false;
            }

            if (!uppercaseRegex.test(password)) {
                alert("La contraseña debe contener al menos una letra mayúscula.");
                return false;
            }

            if (!symbolRegex.test(password)) {
                alert("La contraseña debe contener al menos un símbolo.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
