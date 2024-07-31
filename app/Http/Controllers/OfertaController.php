<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;

class OfertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    public function index()
    {
        $ofertas = Oferta::paginate(10);
        return view('ofertas.index', compact('ofertas'));
    }

    public function create()
    {
        return view('ofertas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'porcentaje' => 'required|numeric|min:0|max:100',
        ]);

        Oferta::create($request->all());

        return redirect()->route('ofertas.index')->with('success', 'Oferta creada exitosamente.');
    }

    public function edit($id)
    {
        $oferta = Oferta::findOrFail($id);
        return view('ofertas.edit', compact('oferta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'porcentaje' => 'required|numeric|min:0|max:100',
        ]);

        $oferta = Oferta::findOrFail($id);
        $oferta->update($request->all());

        return redirect()->route('ofertas.index')->with('success', 'Oferta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        Oferta::destroy($id);

        return redirect()->route('ofertas.index')->with('success', 'Oferta eliminada exitosamente.');
    }
}
