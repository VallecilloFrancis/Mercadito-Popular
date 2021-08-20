@extends('plantilla.madre')

@section('contenido')
    <br>
    <h2>Detalles del producto: </h2>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
    
        <tr>                                                
            <th scope="col">Nombre</th>
            <td>{{$prod->nombre}}</td>
        </tr>

        <tr>
            <th scope="col">Categoria</th>
            <td>{{$prod->categoria}}</td>
        </tr>

        <tr>
            <th scope="col">Precio de compra</th>
            <td>{{$prod->precio_de_compra}}</td>
        </tr>

        <tr>
            <th scope="col">Precio de venta</th>
            <td>{{$prod->precio_de_venta}}</td>
        </tr>

        <tr>
            <th scope="col">Nombre Proveedor</th>
            <td>{{$prod->proveedor->nombre_del_proveedor}}</td>
        </tr>

        <tr>
            <th scope="col">Contacto Proveedor</th>
            <td>{{$prod->proveedor->nombre_del_contacto_proveedor}}</td>
        </tr>

        <tr>
            <th scope="col">Telefono Proveedor</th>
            <td>{{$prod->proveedor->telefono}}</td>
        </tr>

        <tr>
            <th scope="col">Correo Proveedor</th>
            <td>{{$prod->proveedor->correo}}</td>
        </tr>

       
        </tbody>
    </table>

    <a class="btn btn-primary" href="/producto">Volver</a>

@endsection