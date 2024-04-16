@include('navbar')
<div class="container">
    <h2>Proveedores</h2>
    <form action="{{ route('proveedores.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Ingrese el nombre del proveedor">
        </div>
        <div class="form-group">
            <label for="Telefono">Telefono:</label>
            <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Ingrese el Telefono">
        </div>
        <div class="form-group">
            <label for="Direccion">Direccion:</label>
            <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Ingrese la Direccion">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

@if(session('message'))
<div class="alert alert-success" role="alert">
    {{ session('message') }}
</div>
@endif