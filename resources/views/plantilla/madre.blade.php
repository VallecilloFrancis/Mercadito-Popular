<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
       Mercado El Popular
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <a class="navbar-brand" href="#">Mercado El Popular</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active btn btn-success" href="{{route('cliente.index')}}">Clientes <span class="sr-only">(current)</span></a>
                </li>
                <li>&nbsp&nbsp&nbsp</li>
                <li class="nav-item active">
                    <a class="nav-link active btn btn-success" href="{{route('proveedor.index')}}">Proveedor <span class="sr-only">(current)</span></a>
                </li>
                <li>&nbsp&nbsp&nbsp</li>
                <li class="nav-item active">
                    <a class="nav-link active btn btn-success" href="{{route('producto.index')}}">Producto <span class="sr-only">(current)</span></a>
                </li>
                <li>&nbsp&nbsp&nbsp</li>
                <li class="nav-item active">
                    <a class="nav-link active btn btn-success" href="{{route('factura.index')}}">Facturas <span class="sr-only">(current)</span></a>
                </li>

                <li>&nbsp&nbsp&nbsp</li>
                <li class="nav-item active">
                    <a class="nav-link active btn btn-success" href="{{route('factura.nuevo')}}">Nueva Facturas <span class="sr-only">(current)</span></a>
                </li>
            </ul>


        </div>
</nav>

    <main role="main" class="">
        <div class="container">
            @yield('contenido')
        </div>
    </main>

</header>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


</body>

</html>