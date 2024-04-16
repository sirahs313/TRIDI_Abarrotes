<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Productos</title>
</head>

<body>
    @include('navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descrip</th>
                            <th>Stock</th>
                            <th>PU</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->descrip }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->PU }}</td>
                                <td>{{ $producto->Categoria }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>              
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</body>

</html>