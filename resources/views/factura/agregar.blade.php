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

    <label for="">Fecha y hora de factura:</label>
    <input type="text" value="{{$factura->fecha_venta}}" disabled>

    <label for="">cliente:</label>
    <input type="text" value="{{$factura->cliente->nombre}}" disabled>

    <form method="post" action="">
    @csrf

    <label for="">Seleccione un producto:</label>
    <select name="productoid" id="productoid" style="width: 18%;">
    <option value="" style="display: none;">Elija una opcion</option>
    @foreach($productos as $producto)
    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
    @endforeach
    </select>

    <label for="">Seleccione la cantidad:</label>
    <input type="number" min=1 id="cantidad" name="cantidad" placeholder="Ingrese la cantidad">

    <button type="submit" id="agg" class="btn btn-dark">Agregar</button>
    </form>


    <form method="post" action="{{route('factura.borrar',['id'=>$factura->id])}}">
        @csrf
        @method('delete')
        <?php $val = 0?> 
    @forelse($detalles as $detalle)
        @if($detalle->facturaid === $factura->id)
            <?php $val = 1?>
        @endif
    @empty 
    
    @endforelse
        @if($val === 1)
        <a class="btn btn-info" href="{{route('factura.index')}}">Guardar Factura</a>
        @endif
    <button type="submit" class="btn btn-danger">Cancelar Factura</button>

    </form>
<br>
    <table class="table table-bordered">
        <thead>
            <th style="text-align:center">Producto</th>
            <th style="text-align:center">Precio</th>
            <th style="text-align:center">Cantidad</th>
            <th style="text-align:center">Total</th>
        </thead>
        <tbody>
            <?php $total = 0?>
            @forelse($detalles as $detalle)
            @if($detalle->facturaid === $factura->id)
            <tr> 
                <td>{{$detalle->producto->nombre}}</td>
                <td style="text-align:right">Lps. {{number_format($detalle->producto->precio_de_venta,2);}}</td>
                <td style="text-align:right">{{$detalle->cantidad}}</td>
                <td style="text-align:right">Lps. {{number_format($detalle->producto->precio_de_venta * $detalle->cantidad,2);}}</td>
                <?php $total = $total + $detalle->producto->precio_de_venta * $detalle->cantidad?>
            </tr>
            @endif    
            @empty
            <tr>
                <td colspan="4">No hay productos</td>
            </tr>
            @endforelse
            
            <tr>
                <td colspan="3">Sub Total</td>
                <td style="text-align:right">Lps. {{number_format($total,2)}}</td>
            </tr>
            <tr>
                <td colspan="3">Impuesto</td>
                <td style="text-align:right">Lps. {{number_format($total*0.15,2)}}</td>
            </tr>
            <tr>
                <td colspan="3">Total</td>
                <td style="text-align:right">Lps. {{number_format($total*1.15,2);}}</td>
            </tr>
        </tbody>
    </table>

@endsection