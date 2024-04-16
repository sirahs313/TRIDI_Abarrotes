<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('producto.index') }}">Productos</a>
            </li>
        </ul>
        @if (Auth::check())
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">Bienvenido, {{ Auth::user()->name }}</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            </ul>
        @endif
    </div>
</nav>
