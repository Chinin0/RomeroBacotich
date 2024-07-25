<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class OfertaController extends Controller
{
    //

    function _construct(){
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only'=>['index']]);
        $this->middleware('permission:crear-producto', ['only'=>['create','store']]);
        $this->middleware('permission:editar-producto', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-producto', ['only'=>['destroy']]);
    }



    public function index()
    {
        $ofertas = \DB::table('ofertas')->paginate(10);
        return view('ofertas.index', compact('ofertas'));
    }

    public function create(Request $request)
    {
       $descripcion = $request->input('descripcion');
       $porcentaje = $request->input('porcentaje');

       \DB::table('ofertas')->insert([
        'porcentaje' => $porcentaje,
        'descripcion' => $descripcion,
        'fecha_inicial' => $request->input('fecha_inicial'),
        'fecha_final' => $request->input('fecha_final'),
       ]);


       return redirect()->route('ofertas.index')->with('success', 'Oferta creada exitosamente.');
    }



    public function delete($id)
    {
        \DB::table('ofertas')->where('id', $id)->delete();

        return redirect()->route('ofertas.index')->with('success', 'Oferta creada exitosamente.');
    }

    

}
