<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluir los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Para eliminar los márgenes de la página */
        }
        .full-screen-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Alinear elementos verticalmente */
            opacity: 0; /* Inicialmente oculto */
            transition: opacity 1s; /* Transición de opacidad */
        }
        .full-screen-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover; /* Para que la imagen cubra toda el área */
        }
    </style>
</head>
<body>
    <div class="full-screen-container" id="container">
        <!-- Aplicar estilos de Bootstrap al texto h4 -->
        <h4 class="display-4 fw-bold text-center">BIENVENIDO</h4>
        <img src="{{ asset('img/LOGO.jpg') }}" alt="Imagen Grande" class="full-screen-image" id="image">
    </div>

    <script>
        // Esperar a que se cargue el contenido de la página
        window.addEventListener('load', function() {
            // Obtener el contenedor y la imagen
            var container = document.getElementById('container');
            var image = document.getElementById('image');

            // Mostrar el contenedor y la imagen con un efecto de desvanecimiento
            container.style.opacity = 1;
            image.style.opacity = 1;
        });
    </script>
</body>
</html>
