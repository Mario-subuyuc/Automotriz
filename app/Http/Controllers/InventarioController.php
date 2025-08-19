<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('admin.inventario.index', compact('inventarios'));
    }

    public function create()
    {
        return view('admin.inventario.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'precio'      => 'required|numeric|min:0',
            'estado'      => 'required|in:Disponible,Vendido,En mantenimiento',
            'kilometraje' => 'nullable|integer|min:0',
            'color'       => 'nullable|string|max:50',
        ]);

        Inventario::create($validatedData);

        return redirect()->route('admin.inventario.index')
            ->with([
                'mensaje' => 'Vehículo agregado al inventario correctamente',
                'icono' => 'success'
            ]);
    }

    public function show($id)
    {
        $inventario = Inventario::findOrFail($id);
        return view('admin.inventario.show', compact('inventario'));
    }

    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        return view('admin.inventario.edit', compact('inventario'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'precio'      => 'required|numeric|min:0',
            'estado'      => 'required|in:Disponible,Vendido,En mantenimiento',
            'kilometraje' => 'nullable|integer|min:0',
            'color'       => 'nullable|string|max:50',
        ]);

        $inventario = Inventario::findOrFail($id);
        $inventario->update($validatedData);

        return redirect()->route('admin.inventario.index')
            ->with([
                'mensaje' => 'Vehículo actualizado correctamente',
                'icono' => 'success'
            ]);
    }

    public function confirmDelete($id)
    {
        $inventario = Inventario::findOrFail($id);
        return view('admin.inventario.delete', compact('inventario'));
    }

    public function destroy($id)
    {
        Inventario::destroy($id);

        return redirect()->route('admin.inventario.index')
            ->with('mensaje', 'Vehículo eliminado del inventario correctamente')
            ->with('icono', 'success');
    }
}
