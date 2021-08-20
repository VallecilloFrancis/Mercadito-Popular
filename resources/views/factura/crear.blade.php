@extends('plantilla.madre')

@section('contenido')

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


<h1>Nueva Factura</h1>

<form method="post" action="">
    @csrf

    <label for="">Fecha y hora de factura</label>
    <input type="text" value="{{date("d/m/Y h:m:s A")}}" disabled>

    <label for="">Seleccione un cliente:</label>
    <select name="clienteid" id="clienteid" style="width: 18%;">
    <option value=" " style="display: none;">Elija una opcion</option>
    @foreach($clientes as $cliente)
    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
    @endforeach
    </select>

    <button type="submit" id="agg" class="btn btn-dark">Agregar</button>
</form>

@yield('factura')

@endsection