@extends('plantilla.madre')

@section('contenido')

@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif


    <br>
    <h2>Lista de facturas </h2>
    <a class="btn btn-primary" href="{{route('factura.nuevo')}}">Nueva Factura</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr>

            <th scope="col">Fecha Factura</th>
            <th scope="col">Cliente</th>
            <th scope="col">Detalles</th>
            <th scope="col">borrar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($facturas as $factura)
            <tr>
                
                <td>{{$factura->fecha_venta}}</td>
                <td>{{$factura->cliente->nombre}}</td>

                <td><a class="btn btn-success" href="{{route('factura.ver',['id'=>$factura->id])}}">Detalles</a></td>

                <td>
                    <form method="post" action="{{route('factura.borrar',['id'=>$factura->id])}}">
                        @csrf
                        @method('delete')

                        <button onclick="alerta()" class="btn btn-danger">Eliminar</button>

                        <script>
                            function alerta()
                                {
                                var mensaje;
                                var opcion = confirm("Desea eliminar la factura seleccionado");
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
                <th scope="row" colspan="7">no hay facturas</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$facturas->links()}}
@endsection