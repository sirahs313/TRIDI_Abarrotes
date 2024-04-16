<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

@include('navbar')
<div class="container">
    <h2>Ventas</h2>
    <form action="{{ route('ventas.store') }}" method="POST">
    @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">                    
                    @foreach ($prods as $producto)                        
                        <button type="button" class="btn btn-primary" onclick="seleccionarProducto('{{ $producto->descrip }}', '{{ $producto->PU }}')">{{ $producto->descrip }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="producto">Producto:</label>
                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="" readonly>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad" oninput="calcularTotal()">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" class="form-control" id="precioProducto" name="precioProducto" placeholder="" oninput="calcularTotal()" readonly>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" name="fecha">
                </div>            
                <div class="form-group">
                    <label for="cliente">Cliente:</label>
                    <input type="text" class="form-control" name="cliente" id="cliente" name="cliente">
                </div>     
            </div>
            <div class="col-md-2">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" readonly> <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>        
    </form>
</div>

<script>
    function seleccionarProducto(nombreProducto, precioProducto) {
        document.getElementById('nombreProducto').value = nombreProducto;
        document.getElementById('precioProducto').value = precioProducto;
    }
</script>

<script>
    function calcularTotal() {
        var pu = parseFloat(document.getElementById('precioProducto').value);
        var cantidad = parseInt(document.getElementById('cantidad').value);
        var total = pu * cantidad;
        document.getElementById('total').value = isNaN(total) ? '' : total;
    }
</script>