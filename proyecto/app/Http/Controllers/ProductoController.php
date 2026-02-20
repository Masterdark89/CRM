<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->query('show', 'active');
        $q = $request->query('q');

        $query = Producto::query();

        if ($q) {
            $query->where('nombre', 'like', "%{$q}%")
                  ->orWhere('sku', 'like', "%{$q}%")
                  ->orWhere('descripcion', 'like', "%{$q}%");
        }

        if ($show === 'trashed') {
            $query = $query->onlyTrashed();
        }

        $productos = $query->orderBy('nombre')->paginate(15);

        return view('productos.index', compact('productos', 'show', 'q'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(StoreProductoRequest $request)
    {
        $data = $request->validated();
        
        // Debug: Log para ver qué se está recibiendo
        \Log::info('Datos recibidos en productos store:', [
            'has_image' => $request->hasFile('imagen'),
            'has_pdf' => $request->hasFile('archivo_pdf'),
            'all_files' => $request->allFiles(),
            'validated_data' => $data
        ]);
        
        // Manejar subida de imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('uploads/productos'), $nombreImagen);
            $data['imagen'] = 'uploads/productos/' . $nombreImagen;
        }
        
        // Manejar subida de PDF
        if ($request->hasFile('archivo_pdf')) {
            $pdf = $request->file('archivo_pdf');
            $nombrePdf = time() . '_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('uploads/productos/pdfs'), $nombrePdf);
            $data['archivo_pdf'] = 'uploads/productos/pdfs/' . $nombrePdf;
        }
        
        Producto::create($data);
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $data = $request->validated();
        
        // Manejar subida de nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
            }
            
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('uploads/productos'), $nombreImagen);
            $data['imagen'] = 'uploads/productos/' . $nombreImagen;
        }
        
        // Manejar subida de nuevo PDF
        if ($request->hasFile('archivo_pdf')) {
            // Eliminar PDF anterior si existe
            if ($producto->archivo_pdf && file_exists(public_path($producto->archivo_pdf))) {
                unlink(public_path($producto->archivo_pdf));
            }
            
            $pdf = $request->file('archivo_pdf');
            $nombrePdf = time() . '_' . $pdf->getClientOriginalName();
            $pdf->move(public_path('uploads/productos/pdfs'), $nombrePdf);
            $data['archivo_pdf'] = 'uploads/productos/pdfs/' . $nombrePdf;
        }
        
        $producto->update($data);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado (borrado lógico).');
    }

    public function restore($id)
    {
        $producto = Producto::onlyTrashed()->findOrFail($id);
        $producto->restore();
        return redirect()->route('productos.index')->with('success', 'Producto restaurado.');
    }

    public function forceDelete($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->forceDelete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado permanentemente.');
    }
}
