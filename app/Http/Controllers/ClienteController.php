<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $busqueda = trim($request->get('busqueda'));

        $cliente = DB::table('clientes')
        ->where('nombre','like', '%'.$busqueda.'%')
        ->orwhere('telefono','like', '%'.$busqueda.'%')
        ->paginate(20);

        return view('cliente/indice')//vista
            ->with('cliente', $cliente)
            ->with('busqueda', $busqueda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente/crear');
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
            'nombre' => 'required|unique:clientes,nombre',
            'telefono' => 'required|unique:clientes,telefono'
          
            
        
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',
            'nombre.unique' => 'El campo del nombre debe de ser unico',

            'telefono.required' => 'El campo del telefono no puede ser vacio',
            'telefono.unique' => 'El campo del telefono debe ser único'
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoCliente = new Cliente();
        $nuevoCliente->nombre = $request->input('nombre');
        $nuevoCliente->telefono= $request->input('telefono');
        
        

            $creado = $nuevoCliente->save();

        if ($creado) {
            return redirect()->route('cliente.index')
                ->with('mensaje', 'El cliente fue agregado exitosamente!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente/mostrar')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente/editar')->with('cliente', $cliente);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombre' => 'required',
            'telefono' => 'required'
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',

            'telefono.required' => 'El campo del telefono no puede ser vacio',
        ];

        $this->validate($request,$rules,$mensaje);
        

        $EditCliente = Cliente::findOrFail($id);;
        $EditCliente->nombre = $request->input('nombre');
        $EditCliente->telefono= $request->input('telefono');
       

        
            $creado = $EditCliente->save();

        if ($creado) {
            return redirect()->route('cliente.index')
                ->with('mensaje', 'El cliente fue editado exitosamente!');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);

        return redirect()->route('cliente.index')->with('mensaje', 'El cliente fue eliminado exitosamente!');;
    }
}
