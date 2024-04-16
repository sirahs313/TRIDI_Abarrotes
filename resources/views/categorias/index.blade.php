@include('navbar')
@extends('templeate.plantilla')

@section('Contenedor')
<div class="container" style="margin-left: 250px;">
    <h1>TIENDA LA MORENA</h1>
    <hr>
    <div class="d-md-flex justify-content-md-end">
        <form action="{{ route('categorias.index')}}" method="get">
            <div class="btn-group">
                <input type="text" name="busqueda" class="form-control">
                <input type="submit" value="enviar" class="btn btn-primary">
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <!-- Botón para abrir el modal de creación -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearCategoria">Crear</button>
        </div>
        <div class="card-body">
            <h5 class="card-title">Lista</h5>
            <table class="table"> 
                <thead>
                    <th>id</th>
                    <th>codigo</th>
                    <th>nombre</th>
                    <th>opciones</th>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->codigo}}</td>
                            <td>{{$categoria->nombre}}</td>
                            <td class="btn-group">
                                <a href="{{ route('categorias.show',$categoria->id)}}" class="btn btn-primary">+</a>
                                <a href="{{ route('categorias.edit',$categoria->id)}}" class="btn btn-warning">Editar</a>
                                <form id='frmDatos'action="{{route('categorias.destroy',$categoria->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="ELiminar" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">{{$categorias->appends(['busqueda'=>$busqueda])}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal para el formulario de creación -->
<div id="modalCrearCategoria" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Categoría</h5>
                <!-- Botón de cierre (la "X") -->
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del formulario de creación -->
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" name="codigo" id="codigo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#frmDatos').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: "¿Estas seguro?",
            text: "No se podra revertir!",
            icon: "Peligro",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ELIMINA!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario después de confirmar la eliminación
                $('#frmDatos').unbind('submit').submit();
            }
        });
    });
</script>

<style>
    /* Estilos CSS personalizados */
    .btn-close-modal {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1050;
    }
</style>
@endsection
