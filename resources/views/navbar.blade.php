<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Navbar</title>
    <!-- Incluir los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px; /* Ancho del navbar lateral */
            background-color: #343a40; /* Color de fondo del navbar */
            padding-top: 4rem;
            padding-bottom: 1rem; /* Espaciado inferior */
            color: #ffa500; /* Color de texto naranja del navbar */
            text-align: center; /* Centrado horizontal */
        }

        .sidebar .nav-link {
            padding: 15px 0; /* Espaciado interno */
            font-size: 18px; /* Tamaño de letra */
            font-weight: bold; /* Peso de la fuente */
            text-align: center; /* Centrado horizontal */
        }

        .sidebar .welcome-message {
            padding: 20px 0; /* Espaciado interno */
            font-size: 24px; /* Tamaño de letra */
            font-weight: bold; /* Peso de la fuente */
        }

        .sidebar .logout-button {
            padding: 20px 0; /* Espaciado interno */
        }

        .content {
            margin-left: 250px; /* Ajuste del contenido principal para dejar espacio al navbar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar lateral -->
    <div class="sidebar">
        <!-- Utilizamos una variable de Blade para mostrar el nombre del usuario -->
        <div class="welcome-message">Bienvenido, {{ Auth::user()->name }}</div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link active" href="">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('producto.index') }}">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categorias.index') }}">Busqueda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('fichaje.index') }}">Control de horas</a>
            </li>
        </ul>
        <!-- Botón de logout -->
        <div class="logout-button">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <!-- Contenido aquí -->
    </div>
</body>
</html>
