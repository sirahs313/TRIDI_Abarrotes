<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

@include('navbar')
<div class="container">
    <h2>Compras</h2>
    <form action="{{ route('compras.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="producto">Producto:</label>
            <input type="text" class="form-control" name="producto" id="producto" placeholder="Ingrese el nombre del producto">
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad">
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio">
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-select" name="categoria" id="categoria" aria-label="Seleccione una categoría">
                <option selected>Seleccionar categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Proveedor">Proveedor:</label>
            <select class="form-select" name="proveedor" id="Proveedor" aria-label="Seleccione un proveedor">
                <option selected>Seleccionar proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" name="fecha" id="fecha" name="fecha">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
