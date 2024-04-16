@include('navbar')
{{-- resources/views/ventas/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Registro de Venta')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Registrar Nueva Venta</h3>
                </div>
                <div class="card-body">
                <form action="{{ route('ventas.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="producto">Producto:</label>
                            <select name="productos[]" id="producto" class="form-control">
                                {{-- Asumiendo que $productos es una colección de objetos Producto --}}
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="form-control" required min="1" value="1">
                        </div>
                        {{-- Añade más campos según sea necesario --}}
                        <button type="submit" class="btn btn-success">Confirmar Venta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
