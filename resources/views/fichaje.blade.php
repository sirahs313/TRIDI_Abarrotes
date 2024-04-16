<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title >Fichaje de Turnos</title>
    <!-- Incluir los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .todo{
            width: 250px; /* Aumenté el ancho */
            height: 35px; /* Aumenté la altura */
            border: 8px solid #ddd;
        }
        .hora-entrada {
            background-color: #b8daff; /* color azul claro */
        }
        .hora-salida {
            background-color: #f8d7da; /* color rojo claro */
        }
        .eliminar{
            color: red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        button {
            cursor: pointer;
        }
        .container-content {
            margin-left: 250px; /* Ajuste del margen izquierdo para el contenido */
            padding: 20px; /* Añadir relleno al contenido */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('navbar')

    <div class="container-content">
        <h1 class="h">Fichaje de Turnos</h1>
        @if(session('status'))
            <div style="color: green;">
                {{ session('status') }}
            </div>
        @endif
        @if(session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('fichaje.entrada') }}" method="POST">
            @csrf
            <input class="todo" type="number" name="empleado_id" placeholder="Introduce tu ID de empleado">
            <button type="submit">Fichar Entrada</button>
        </form>

        <form action="{{ route('fichaje.salida') }}" method="POST">
            @csrf
            <input class="todo" type="number" name="empleado_id" placeholder="Introduce tu ID de empleado">
            <button type="submit">Fichar Salida</button>
        </form>

        <h2>Registro de Turnos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Empleado</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Tiempo Trabajado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fichajes as $fichaje)
                <tr>
                    <td>{{ $fichaje->empleado_id }}</td>
                    <td class="hora-entrada">{{ $fichaje->hora_entrada }}</td>
                    <td class="hora-salida">{{ $fichaje->hora_salida ?? 'No Registrado' }}</td>
                    <td>
                        @if ($fichaje->hora_salida)
                            {{ \Carbon\Carbon::parse($fichaje->hora_entrada)->diffInHours(\Carbon\Carbon::parse($fichaje->hora_salida)) }} horas
                        @else
                            Calculando...
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('fichaje.destroy', $fichaje->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="eliminar" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
