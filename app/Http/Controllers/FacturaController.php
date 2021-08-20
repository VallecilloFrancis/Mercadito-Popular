<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Detalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factura = Factura::paginate(20);

        return view('factura/indice')->with('facturas', $factura);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('factura/crear')->with('clientes', $clientes);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'clienteid' => 'required|exists:clientes,id',
        ];

        $mensaje=[
            'clienteid.required' => 'El campo del cliente no puede ser vacio',
            'clienteid.exists' => 'El campo del cliente no es valido',          
        ];

        $this->validate($request,$rules,$mensaje);

        $factura = new Factura();

        $factura->fecha_venta = date("Y-m-d h:m:s");
        $factura->clienteid = $request->input('clienteid');

        $creado = $factura->save();

        return redirect()->route('factura.agregar',['id'=>$factura->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::findOrFail($id);
        $productos = Producto::all();
        $detalles = Detalles::all();
        return view('factura/mostrar')->with('productos', $productos)->with('factura', $factura)->with('detalles', $detalles);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factura::destroy($id);

        return redirect()->route('factura.index')->with('mensaje', 'La factura fue eliminado exitosamente!');;
    }
}
