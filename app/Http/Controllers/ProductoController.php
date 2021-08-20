<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $busqueda = trim($request->get('busqueda'));

        $producto = DB::table('productos')
        ->select('productos.id','nombre',
        'categoria','precio_de_compra', 'precio_de_venta','nombre_del_proveedor')
        ->join('proveedors', 'proveedors.id','productos.proveedorid')
        ->where('nombre','like', '%'.$busqueda.'%')
        ->orwhere('categoria','like', '%'.$busqueda.'%')
        ->orwhere('nombre_del_proveedor','like', '%'.$busqueda.'%')
        ->paginate(10);

        return view('producto/indice')//vista
            ->with('producto', $producto)
            ->with('busqueda', $busqueda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        return view('producto/crear')->with('proveedor', $proveedor);
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
            'nombre' => 'required|unique:productos,nombre',
            'categoria'=>'required|unique:productos,categoria',
            'precio_de_compra' => 'required|numeric|min:1',
            'precio_de_venta'=>'required|numeric|min:1',
            'proveedorid'=>'required|exists:proveedors,id'         
        
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',
            'nombre.unique' => 'El campo del nombre debe de ser unico',

            'categoria.required' => 'El campo de la categoria no puede ser vacio',
            'categoria.unique' => 'El campo de la categoria  debe ser único',

            'precio_de_compra.required' => 'El campo del precio de compra no puede ser vacio',
            'precio_de_compra.numeric' => 'El campo del precio de compra debe de ser numeros',
            'precio_de_compra.min' => 'El campo del precio de compra tiene que ser mayor a cero',
            
            'precio_de_venta.required' => 'El campo del precio de venta no puede ser vacio',
            'precio_de_venta.numeric' => 'El campo del precio de venta debe de ser numeros',
            'precio_de_venta.min' => 'El campo del precio de venta tiene que ser mayor a cero',

            'proveedorid.required'=>'El campo proveedor no es valido',
            'proveedorid.exists'=>'El valor proveedor no es valido'
          
        ];

        $this->validate($request,$rules,$mensaje);

        $nuevoProducto = new Producto();
        $nuevoProducto->nombre = $request->input('nombre');
        $nuevoProducto->categoria= $request->input('categoria');
        $nuevoProducto->precio_de_compra = $request->input('precio_de_compra');
        $nuevoProducto->precio_de_venta= $request->input('precio_de_venta');
        $nuevoProducto->proveedorid= $request->input('proveedorid');
        

            $creado = $nuevoProducto->save();

        if ($creado) {
            return redirect()->route('producto.index')
                ->with('mensaje', 'El producto fue agregado exitosamente!');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto/mostrar')->with('prod', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $proveedor = Proveedor::all();
        return view('producto/editar')->with('producto', $producto)->with('proveedor', $proveedor);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'nombre' => 'required',
            'categoria'=>'required',
            'precio_de_compra' => 'required|numeric|min:1',
            'precio_de_venta'=>'required|numeric|min:1',
            'proveedorid'=>'required|exists:proveedors,id'         
        
        ];

        $mensaje=[
            'nombre.required' => 'El campo del nombre no puede ser vacio',

            'categoria.required' => 'El campo de la categoria no puede ser vacio',

            'precio_de_compra.required' => 'El campo del precio de compra no puede ser vacio',
            'precio_de_compra.numeric' => 'El campo del precio de compra debe de ser numeros',
            'precio_de_compra.min' => 'El campo del precio de compra tiene que ser mayor a cero',
            
            'precio_de_venta.required' => 'El campo del precio de venta no puede ser vacio',
            'precio_de_venta.numeric' => 'El campo del precio de venta debe de ser numeros',
            'precio_de_venta.min' => 'El campo del precio de venta tiene que ser mayor a cero',

            'proveedorid.required'=>'El campo proveedor no es valido',
            'proveedorid.exists'=>'El valor proveedor no es valido'
          
        ];

        $this->validate($request,$rules,$mensaje);
        

        $EditProducto = Producto::findOrFail($id);;
        $EditProducto->nombre = $request->input('nombre');
        $EditProducto->categoria= $request->input('categoria');
        $EditProducto->precio_de_compra = $request->input('precio_de_compra');
        $EditProducto->precio_de_venta = $request->input('precio_de_venta');
        $EditProducto->proveedorid= $request->input('proveedorid');

        
            $creado = $EditProducto->save();

        if ($creado) {
            return redirect()->route('producto.index')
                ->with('mensaje', 'El producto fue editado exitosamente!');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect()->route('producto.index')->with('mensaje', 'El producto fue eliminado exitosamente!');
    }
}
