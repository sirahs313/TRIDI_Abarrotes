@extends('templeate.plantilla')
@section('Contenedor')

<hr>
    <h1>.................TIENDA "LA MORENA"..............................................................................</h1>
<hr>
<hr>
<hr>
    <h1>Edita tu producto</h1>
<hr>
<hr>
<hr>
<form action="{{route('categorias.update',$categoria->id)}}" method="POST">
@csrf
@method('PUT')
<div>
    <label for="">Codigo</label>
    <input type="text" name="codigo" value="{{$categoria->codigo}}" class="form-control">
</div>
<div>
    <label for="">Nombre</label>
    <input type="text" name="nombre" value="{{$categoria->nombre}}"class="form-control">
</div>
<div>
    <input type="submit" name="Enviar" class="btn btn-success">
</div>
</form>
@endsection