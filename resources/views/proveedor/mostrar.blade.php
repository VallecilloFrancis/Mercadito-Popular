@extends('plantilla.madre')

@section('contenido')
    <br>
    <h2>Detalles del proveedor: </h2>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="col">Nombre Proveedor</th>
            <td>{{$proveedor->nombre_del_proveedor}}</td>
        </tr>

        <tr>
            <th scope="col">Contacto Proveedor</th>
            <td>{{$proveedor->nombre_del_contacto_proveedor}}</td>
        </tr>

        <tr>
            <th scope="col">Telefono Proveedor</th>
            <td>{{$proveedor->telefono}}</td>
        </tr>

        <tr>
            <th scope="col">Correo Proveedor</th>
            <td>{{$proveedor->correo}}</td>
        </tr>

       
        </tbody>
    </table>

    <a class="btn btn-primary" href="/proveedor">Volver</a>

@endsection