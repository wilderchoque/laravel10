<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos'] = producto::paginate(10);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//mesajes de validacion
    {
        $datos = request()->all();
        // hay un arc img
        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        producto::create($datos);
        return redirect('producto')->with("mensaje","producto agregado con exito");
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $producto = producto::findOrfail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = producto::findOrFail($id);
        $datos = $request->all();// recolecta todos los datos

        if ($request->hasFile('imagen')) {
            Storage::delete('public/' . $producto->imagen);// borado existente
            $datos['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        $producto->update($datos);
        return redirect('producto')->with("mensaje","producto modificado con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = producto::findOrFail($id);
        Storage::delete("public/" . $producto->imagen);
        $producto->delete();
        return redirect('producto')->with("mensaje","producto eliminado con exito");
    }
}
