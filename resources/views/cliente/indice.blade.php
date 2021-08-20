@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <h2>Lista de clientes <a class="btn btn-primary" href="{{route('cliente.nuevo')}}">Crear</a></h2>
    
    <form action="{{route('cliente.index')}}" method="GET">
        <div>
            <input type="text" class="form-control" name="busqueda"
                placeholder="Busqueda" value="{{$busqueda}}">

                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
    
                <a type="button" href='cliente' class="btn btn-danger">
                Limpiar
                </a>
        </div>
    </form>
    
    <table class="table table-striped table-dark">
        <thead>
        <tr>

            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Detalles</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cliente as $clie)
            <tr>
                
                <td>{{$clie->id}}</td>
                <td>{{$clie->nombre}}</td>
                <td>{{$clie->telefono}}</td>
                


                <td><a class="btn btn-success" 
                href="{{route('cliente.ver',['id'=>$clie->id])}}">Detalles</a></td>


                <td><a class="btn btn-warning" 
                href="{{route('cliente.edit',['id'=>$clie->id])}}">Editar</a></td>
                <td>

                    <form method="post" action="{{route('cliente.borrar',['id'=>$clie->id])}}">
                        @csrf
                        @method('delete')

                        <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar el cliente seleccionado");
                                if (opcion == true) {
                                    document.submit()
                                } else {
                                
                                }
                            }
                        </script>

                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="5">no hay clientes</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$cliente->links()}}
@endsection