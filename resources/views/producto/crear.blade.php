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

    

    <h2>Crear Producto</h2>
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for=" ">Nombre del producto:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" 
            placeholder="Ingrese el nombre">
        </div>
       
        <div class="form-group">
            <label for=" ">Categoria:</label>
            <input type="text" class="form-control" name="categoria" id="categoria" 
            placeholder="Ingrese la categoria">
        </div>

        <div class="form-group">
            <label for=" ">Precio de compra:</label>
            <input type="decimal" class="form-control" name="precio_de_compra" id="precio_de_compra" 
            placeholder="Ingrese el precio de compra" min=0>
        </div>

        <div class="form-group">
            <label for=" ">Precio de venta:</label>
            <input type="decimal" class="form-control" name="precio_de_venta" id="precio_de_venta" 
            placeholder="Ingrese el precio de venta" min=0>
        </div>

        <div class="form-group">
            <label for=" ">Proveedor:</label>
            <select name="proveedorid" id="proveedorid" class="form-control">
                <option style="display: none;" value=""> Seleccione un proveedor</option>
                @foreach($proveedor as $prov)
                <option value="{{$prov->id}}">{{$prov->nombre_del_proveedor}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-danger">borrar</button>
        <a class="btn btn-success" href="/producto">Volver</a>

    </form>

@endsection