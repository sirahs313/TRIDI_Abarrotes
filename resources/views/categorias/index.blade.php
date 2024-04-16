@extends('template.plantilla')

@section('Contenedor')
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
@endsection