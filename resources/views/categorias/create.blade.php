@extends('templeate.plantilla')
@section('Contenedor')

<hr>
<div class="contenedor">
    <h1>........................TIENDA LUPITA........................................</h1>
    </div>
<hr>
<hr>
<div class="contenedor">
    <h1>CREA tu producto</h1>
    </div>
<hr>
</div>
<div class="container">
<form action="{{route('categorias.store')}}" method="POST">
@csrf
<div class="contenedor">
    <label for="">Codigo</label>
    <input type="text" name="codigo"class="form-control">
</div>
<hr>
<hr>
<div class="contenedor">
    <label for="">Nombre</label>
    <input type="text" name="nombre"class="form-control">
</div>
<hr>
<div class="contenedor">
    <input type="submit" name="Enviar"class="btn btn-success">
</div>
</div>
<style>
       .contenedor {
            display: flex; /* Utilizar flexbox */
            justify-content: center; /* Centrar los elementos horizontalmente */
            gap: 10px; /* Espacio entre los elementos */
        }
    </style>
</form>
@endsection
