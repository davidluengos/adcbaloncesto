<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate();

        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $producto = new Producto();
        return view('admin.productos.create', compact('producto'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|max:3048',
            'imagen2' => 'nullable|image|max:2048',
            'precio_original' => 'nullable|numeric|min:0',
        ]);

        $producto = new Producto($data);
        $producto->disponible = $request->has('disponible');
        $producto->agotado = $request->has('agotado');
        $producto->tiene_tallas = $request->has('tiene_tallas');
        $producto->prioritario = $request->has('prioritario');
        $producto->save();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();

            $producto->imagen = '/storage/img/productos/'.$producto->id.'/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/productos/' . $producto->id.'/' , $nombreOriginal);
        }

        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombreOriginal = $file->getClientOriginalName();

            $producto->imagen2 = '/storage/img/productos/'.$producto->id.'/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/productos/' . $producto->id.'/' , $nombreOriginal);
        }

        if ($request->hasFile('imagen') || $request->hasFile('imagen2')) {
            $producto->save();
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|max:2048',
            'imagen2' => 'nullable|image|max:2048',
            'precio_original' => 'nullable|numeric|min:0',
        ]);

        $producto->fill($data);
        $producto->disponible = $request->has('disponible');
        $producto->agotado = $request->has('agotado');
        $producto->tiene_tallas = $request->has('tiene_tallas');
        $producto->prioritario = $request->has('prioritario');

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreOriginal = $file->getClientOriginalName();

            $producto->imagen = '/storage/img/productos/'.$producto->id.'/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/productos/' . $producto->id.'/' , $nombreOriginal);
        }

        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombreOriginal = $file->getClientOriginalName();

            $producto->imagen2 = '/storage/img/productos/'.$producto->id.'/' . $nombreOriginal;
            $file->move(public_path() . '/storage/img/productos/' . $producto->id.'/' , $nombreOriginal);
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        //unlink images
        if ($producto->imagen) {
            unlink(public_path($producto->imagen));
        }
        if ($producto->imagen2) {
            unlink(public_path($producto->imagen2));
        }
        //borramos también la carpeta
        rmdir(public_path('/storage/img/productos/' . $producto->id));
        
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
