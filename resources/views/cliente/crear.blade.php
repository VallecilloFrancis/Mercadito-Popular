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

    <h2>Crear cliente</h2>
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for=" ">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" 
            placeholder="Ingrese el nombre">
        </div>
       
        <div class="form-group">
            <label for=" ">Telefono:</label>
            <input type="tel" class="form-control" name="telefono" id="telefono" 
            placeholder="Ingrese el telefono">
        </div>
       

        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/cliente">Volver</a>

    </form>

@endsection