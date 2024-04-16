@extends('templeate.plantilla')
@section('Contenedor')

<hr>
    <h1>....................TIENDA LA MORENA........................................</h1>
<hr>
<hr>
    <h1>Edita tu producto</h1>
<hr>
<form action="{{route('categorias.update',$categoria->id)}}" method="POST">
@csrf
@method('PUT')
<div class="container">
<div>
    <label for="">Codigo</label>
    <input type="text" name="codigo" value="{{$categoria->codigo}}" class="form-control">
</div>
<div>
    <label for="">Nombre</label>
    <input type="text" name="nombre" value="{{$categoria->nombre}}"class="form-control">
</div>
<hr>
<div class="contenedor">
        <form action="('categorias.index')" method="POST">
        <input type="submit" value="Regresar" class="btn btn-danger">
        </form>
        <input type="submit" name="Enviar" class="btn btn-success">
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