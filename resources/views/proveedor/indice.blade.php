@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

    <br>
    <h2>Lista de proveedores <a class="btn btn-primary" href="{{route('proveedor.nuevo')}}">Crear</a></h2>
    
    <form action="{{route('proveedor.index')}}" method="GET">
        <div>
            <input type="text" class="form-control" name="busqueda"
                placeholder="Busqueda" value="{{$busqueda}}">

                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
    
                <a type="button" href='proveedor' class="btn btn-danger">
                Limpiar
                </a>
        </div>
    </form>
    
    <table class="table table-striped table-dark">
        <thead>
        <tr>

            <th scope="col">Id</th>
            <th scope="col">Nombre del Proveedor</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Nombre del Contacto</th>
            <th scope="col">detalles</th>
            <th scope="col">editar</th>
            <th scope="col">borrar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($proveedor as $prov)
            <tr>
                
                <td>{{$prov->id}}</td>
                <td>{{$prov->nombre_del_proveedor}}</td>
                <td>{{$prov->correo}}</td>
                <td>{{$prov->telefono}}</td>
                <td>{{$prov->nombre_del_contacto_proveedor}}</td>
                
                <td><a class="btn btn-success" 
                href="{{route('proveedor.ver',['id'=>$prov->id])}}">Detalles</a></td>


                <td><a class="btn btn-warning" 
                href="{{route('proveedor.edit',['id'=>$prov->id])}}">Editar</a></td>
                <td>

                    <!-- Button trigger modal -->
                    

                    <form method="post" action="{{route('proveedor.borrar',['id'=>$prov->id])}}">
                        @csrf
                        @method('delete')

                        <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar el proveedor seleccionado");
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
                <th scope="row" colspan="9">no hay proveedores</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$proveedor->links()}}
@endsection