<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <!-- Agregar los estilos de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para centrar el título */
        .title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #007bff; /* Color azul de Bootstrap */
        }
    </style>
</head>
<body>
    @include('navbar') <!-- Aquí se incluye el navbar -->
    
    <div class="container">
        <h1 class="mt-5 mb-4 title">Lista de Empleados</h1>

        <!-- Formulario de creación de empleado -->
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-row align-items-center mb-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Crear Empleado</button>
                </div>
            </div>
        </form>

        <!-- Lista de empleados -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Agregar los scripts de Bootstrap al final del body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
