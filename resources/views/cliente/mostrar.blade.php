@extends('plantilla.madre')

@section('contenido')
    <br>
    <h2>Detalles del cliente: </h2>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Nombre:</th>
            <td>{{$cliente->nombre}}</td>
        </tr>
        
        <tr>
            <th scope="row">Telefono: </th>
            <td>{{$cliente->telefono}}</td>
        </tr>


        </tbody>
    </table>

    <a class="btn btn-primary" href="/cliente">Volver</a>

@endsection