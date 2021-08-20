<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $busqueda = trim($request->get('busqueda'));

        $proveedor = DB::table('proveedors')
        ->where('nombre_del_proveedor','like', '%'.$busqueda.'%')
        ->orwhere('nombre_del_contacto_proveedor','like', '%'.$busqueda.'%')
        ->paginate(10);

        return view('proveedor/indice')//vista
            ->with('proveedor', $proveedor)
            ->with('busqueda', $busqueda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor/crear');
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
            'nombre_del_proveedor' => 'required|unique:proveedors,nombre_del_proveedor',
            'correo'=>'required|unique:proveedors,correo',
            'telefono' => 'required|unique:proveedors,telefono',
            'nombre_del_contacto_proveedor'=>'required|'
            
        
        ];

        $mensaje=[
            'nombre_del_proveedor.required' => 'El campo del proveedor no puede ser vacio',
            'nombre_del_proveedor.unique' => 'El campo del proveedor debe ser único',

            'correo.required' => 'El campo del correo no puede ser vacio',
            'correo.unique' => 'El campo del correo debe ser único',

            'telefono.required' => 'El campo del telefono no puede ser vacio',
            'telefono.unique' => 'El campo del telefono debe ser único',

            'nombre_del_contacto_proveedor.required' => 'El campo del nombre de contacto no puede ser vacio'
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoProveedor = new Proveedor();
        $nuevoProveedor->nombre_del_proveedor = $request->input('nombre_del_proveedor');
        $nuevoProveedor->correo = $request->input('correo');
        $nuevoProveedor->telefono = $request->input('telefono');
        $nuevoProveedor->nombre_del_contacto_proveedor= $request->input('nombre_del_contacto_proveedor');
        

            $creado = $nuevoProveedor->save();

        if ($creado) {
            return redirect()->route('proveedor.index')
                ->with('mensaje', 'El proveedor fue agregado exitosamente!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor/mostrar')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor/editar')->with('proveedor', $proveedor);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombre_del_proveedor' => 'required',
            'correo'=>'required',
            'telefono' => 'required',
            'nombre_del_contacto_proveedor'=>'required|'
            
        
        ];

        $mensaje=[
            'nombre_del_proveedor.required' => 'El campo del proveedor no puede ser vacio',

            'correo.required' => 'El campo del correo no puede ser vacio',
            'telefono.required' => 'El campo del telefono no puede ser vacio',

            'nombre_del_contacto_proveedor.required' => 'El campo del nombre de contacto no puede ser vacio'
          
        ];

        $this->validate($request,$rules,$mensaje);
        

        $EditProveedor = Proveedor::findOrFail($id);;
        $EditProveedor->nombre_del_proveedor = $request->input('nombre_del_proveedor');
        $EditProveedor->correo= $request->input('correo');
        $EditProveedor->telefono = $request->input('telefono');
        $EditProveedor->nombre_del_contacto_proveedor = $request->input('nombre_del_contacto_proveedor');

        
            $creado = $EditProveedor->save();

        if ($creado) {
            return redirect()->route('proveedor.index')
                ->with('mensaje', 'El proveedor fue editado exitosamente!');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::destroy($id);

        return redirect()->route('proveedor.index')->with('mensaje', 'El proveedor fue eliminado exitosamente!');;
    }
}
