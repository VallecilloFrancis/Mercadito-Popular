@extends('plantilla.madre')

@section('contenido')

<br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Crear proveedor</h2>
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for=" ">Nombre del Proveedor:</label>
            <input type="text" class="form-control" name="nombre_del_proveedor" id="nombre_del_proveedor" 
            placeholder="Ingrese el nombre del proveedor">
        </div>
       

        <div class="form-group">
            <label for=" ">Correo:</label>
            <input type="text" class="form-control" name="correo" id="correo" 
            placeholder="Ingrese el correo">
        </div>

        <div class="form-group">
            <label for=" ">Telefono:</label>
            <input type="tel" class="form-control" name="telefono" id="telefono" 
            placeholder="Ingrese el telefono">
        </div>

        <div class="form-group">
            <label for=" ">Nombre del Contacto del Proveedor:</label>
            <input type="text" class="form-control" name="nombre_del_contacto_proveedor" id="nombre_del_contacto_proveedor" 
            placeholder="Ingrese el nombre del contacto del proveedor">
        </div>
       

        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/proveedor">Volver</a>

    </form>

@endsection