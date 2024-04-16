<form method="POST" action="{{ url('/fichajes/entrada') }}">
    @csrf
    <input type="hidden" name="empleado_id" value="{{ $empleadoId }}">
    <button type="submit">Registrar Entrada</button>
</form>
