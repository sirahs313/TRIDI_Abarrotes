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
    <hr>
    <div class="card">
        <div class="card-header">
            <!-- Botón para abrir el modal de creación -->
            
            <a href="{{ route('categorias.create')}}" class="btn btn-primary">crear</a>
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
                                <!-- Botón para abrir el modal de edición -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{$categoria->id}}">Editar</button>
                                <form id='frmDatos'action="{{route('categorias.destroy',$categoria->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="ELiminar" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición para cada categoría -->
                        <div class="modal fade" id="modalEditarCategoria{{$categoria->id}}" tabindex="-1" aria-labelledby="modalEditarCategoria{{$categoria->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarCategoria{{$categoria->id}}Label">Editar Categoría</h5>
                                        <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Contenido del formulario de edición -->
                                        <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="codigo{{$categoria->id}}" class="form-label">Código</label>
                                                <input type="text" name="codigo" id="codigo{{$categoria->id}}" class="form-control" value="{{$categoria->codigo}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre{{$categoria->id}}" class="form-label">Nombre</label>
                                                <input type="text" name="nombre" id="nombre{{$categoria->id}}" class="form-control" value="{{$categoria->nombre}}">
                                            </div>
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
