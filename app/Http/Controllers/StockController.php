<?php

namespace App\Http\Controllers;

use App\Models\StockItem;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $items = StockItem::all();
        return view('stock.index', compact('items'));
    }

    public function create()
    {
        return view('stock.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|string|max:100|unique:stock,sku',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|integer|min:0',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        StockItem::create($request->only(['sku','descripcion','cantidad','ubicacion']));

        return redirect()->route('stock.index')->with('success', 'Ítem de stock creado exitosamente.');
    }

    public function show(StockItem $item)
    {
        return view('stock.show', compact('item'));
    }

    public function edit(StockItem $item)
    {
        return view('stock.edit', compact('item'));
    }

    public function update(Request $request, StockItem $item)
    {
        $request->validate([
            'sku' => 'required|string|max:100|unique:stock,sku,' . $item->id,
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|integer|min:0',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        $item->update($request->only(['sku','descripcion','cantidad','ubicacion']));

        return redirect()->route('stock.index')->with('success', 'Ítem de stock actualizado exitosamente.');
    }

    public function destroy(StockItem $item)
    {
        $item->delete();
        return redirect()->route('stock.index')->with('success', 'Ítem eliminado exitosamente.');
    }
}
