<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Detalles;
use Illuminate\Http\Request;

class DetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $factura = Factura::findOrFail($id);
        $productos = Producto::all();
        $detalles = Detalles::all();
        return view('factura/agregar')->with('productos', $productos)->with('factura', $factura)->with('detalles', $detalles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){
        
        $rules=[
            'productoid' => 'required|exists:productos,id',
            'cantidad' => 'required|numeric|min:1',
        ];

        $mensaje=[
            'productoid.required' => 'El campo del producto no puede ser vacio',
            'productoid.exists' => 'El campo del producto no es valido',
            'cantidad.required' => 'El campo del cantidad no puede ser vacio',
            'cantidad.numeric' => 'El campo del cantidad debe de ser numerico', 
            'cantidad.min' => 'El campo del cantidad debe de ser un numero positivo mayor a 1', 
        ];

        $this->validate($request,$rules,$mensaje);
        
        $detalles = new Detalles();

        $detalles ->facturaid = $id;
        $detalles ->productoid = $request->input('productoid');
        $detalles ->cantidad = $request->input('cantidad');

        $creado = $detalles->save();

        if ($creado) {
            return redirect()->route('factura.agregar',['id'=>$id]);
        } else {

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function show(Detalles $detalles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalles $detalles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalles $detalles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalles  $detalles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalles $detalles)
    {
        //
    }
}
