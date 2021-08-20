@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <h2>Lista de productos <a class="btn btn-primary" href="{{route('producto.nuevo')}}">Crear</a></h2>
    <form action="{{route('producto.index')}}" method="GET">
        <div>
            <input type="text" class="form-control" name="busqueda"
                placeholder="Busqueda" value="{{$busqueda}}">

                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
    
                <a type="button" href='producto' class="btn btn-danger">
                Limpiar
                </a>
        </div>
    </form>
    
    <table class="table table-striped table-dark">
        <thead>
        <tr>

            <th scope="col">Id</th>                                                     
            <th scope="col">Nombre</th>
            <th scope="col">Categoria</th>
            <th scope="col">Precio de compra</th>
            <th scope="col">Precio de venta</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Detalles</th>
            <th scope="col">editar</th>
            <th scope="col">borrar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($producto as $prod)
            <tr>
                
                <td>{{$prod->id}}</td>
                <td>{{$prod->nombre}}</td>
                <td>{{$prod->categoria}}</td>
                <td>{{$prod->precio_de_compra}}</td>
                <td>{{$prod->precio_de_venta}}</td>
                <td>{{$prod->nombre_del_proveedor}}</td>
          

                  
            </td>

            <td><a class="btn btn-success" 
                href="{{route('producto.ver',['id'=>$prod->id])}}">Detalles</a></td>

                <td><a class="btn btn-warning" 
                href="{{route('producto.edit',['id'=>$prod->id])}}">Editar</a></td>
                <td>

                    <form method="post" action="{{route('producto.borrar',['id'=>$prod->id])}}">
                        @csrf
                        @method('delete')

                        <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar el producto seleccionado");
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
                <th scope="row" colspan="7">no hay productos</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$producto->links()}}
@endsection