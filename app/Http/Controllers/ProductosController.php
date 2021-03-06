<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use App\Models\Sucursal;

class ProductosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar()
    {
        $productos = Producto::paginate(8);
        return view('productos.listar')
            ->with('productos', $productos);
    }

    public function agregar()
    {
        $sucursales = Sucursal::all();
        return view('productos.agregar')
            ->with('sucursales', $sucursales);
    }

    public function guardar(Request $request)
    {

        $validateData = $this->validate($request, [
            'codigo' => 'required|min:2',
            'nombre' => 'required|min:3',
            'categoria' => 'required|min:4',
            'precio' => 'integer',
            'descripcion' => 'required|min:10',
            'sucursal' => 'required'
        ]);
        $producto = new Producto();
        if ($producto) {
            $producto->codigo = $request->input('codigo');
            $producto->nombre = $request->input('nombre');
            $producto->categoria = $request->input('categoria');
            $producto->precio = $request->input('precio');
            $producto->descripcion = $request->input('descripcion');
            $producto->sucursal_id = $request->input('sucursal');


            //cargar Imagen
            $imagen = $request->file('imagen');
            if ($imagen) {
                $imagen_path = time() . '-' . $imagen->getClientOriginalName();
                \Storage::disk('imagenes')->put($imagen_path, \File::get($imagen));
                $producto->imagen = $imagen_path;
            }

            $producto->save();
            $message = "Producto agregado correctamente";
        } else {
            $message = "El producto no se pudo agregar";
        }

        $productos = Producto::paginate(8);
        return view('productos.listar')
            ->with(
                array(
                    'message' => $message,
                    'productos' => $productos
                )
            );
    }

    public function getImagen($filename)
    {
        $file = \Storage::disk('imagenes')->get($filename);
        return new Response($file, 200);
    }

    public function deleteProducto($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            //Eliminar Imagen
            \Storage::disk('imagenes')->delete($producto->imagen);
            $producto->delete();
            $message1 = "Producto Eliminado Correctamente";
        } else {
            $message1 = "El producto no fue eliminado";
        }

        $productos = Producto::paginate(8);
        return view('productos.listar')
            ->with(
                array(
                    'message1' => $message1,
                    'productos' => $productos
                )
            );
    }

    public function deleteSucursal($id)
    {
        try {
            $sucursales = Sucursal::find($id);
            if ($sucursales) {
                //Eliminar Imagen
                $sucursales->delete();
                $message = "Sucursal Eliminada Correctamente";
            } else {
                $message = "El producto no fue eliminado";
            }

            $sucursales = Sucursal::paginate(8);
            return view('productos.editSu')
                ->with(
                    array(
                        'message' => $message,
                        'sucursales' => $sucursales
                    )
                );
        } catch (\Illuminate\Database\QueryException $e) {

            echo 'No puedes eliminar esta sucursal porque posee productos, a continuaci??n te mostramos el error: ', $e->getMessage(), "\n";
        }
    }

    public function agregarSu()
    {

        return view('productos.agregarSu');
    }
    public function guardarSucursal(Request $request)
    {

        $validateData = $this->validate($request, [
            'nombre' => 'required|min:3'
        ]);
        $sucursal = new Sucursal();
        if ($sucursal) {
            $sucursal->nombre = $request->input('nombre');
            $sucursal->save();
            $message1 = "Sucursal agregada correctamente";
        } else {
            $message1 = "La sucursal no se pudo agregar";
        }
        $sucursales = Sucursal::paginate(8);
        return view('productos.editSu')
            ->with(
                array(
                    'message1' => $message1,
                    'sucursales' => $sucursales
                )
            );
    }


    public function edit($id)
    {
        $productos = Producto::findOrFail($id);

        return view('productos.edit', compact('productos'));
    }

    public function editSu()
    {

        $sucursales = Sucursal::paginate(8);
        return view('productos.editSu')
            ->with('sucursales', $sucursales);


        //return view('productos.editSu',compact('sucursal'));
    }

    public function edit2($id)
    {

        $sucursales = Sucursal::findOrFail($id);

        return view('productos.edit2', compact('sucursales'));
    }

    public function updateSucursal(Request $request, $id)
    {

        $sucursales = Sucursal::findOrFail($id);
        $sucursales->nombre = $request->input('nombre');
        $sucursales->save();
        return redirect()->route('editarSucursal1');
    }

    public function updateProducto(Request $request, $id)
    {

        $productos = Producto::findOrFail($id);
        $productos->nombre = $request->input('nombre');
        $productos->precio = $request->input('precio');
        $productos->descripcion = $request->input('descripcion');

        $productos->save();
        return redirect()->route('listarProductos');
    }


    public function searchProducto($search = null)
    {

        if (is_null($search)) {
            $search = \Request::get('search');
            return redirect()->route('buscarProducto', array('search' => $search));
        }
        $productos = Producto::where('nombre', 'like', '%'. $search . '%')->paginate(8);
        return view('productos.listar')
            ->with(
                array(
                    'productos' => $productos
                )
            );
    }

    public function searchProductoC($search = null)
    {

        if (is_null($search)) {
            $search = \Request::get('search');
            return redirect()->route('buscarProductoC', array('search' => $search));
        }
        $productos = Producto::where('codigo', 'like', '%'. $search . '%')->paginate(8);
        return view('productos.listar')
            ->with(
                array(
                    'productos' => $productos
                )
            );
    }

}
