<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Oferta;

class ProductoController extends Controller
{
    // Constructor para aplicar middleware
    public function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    public function index()
    {
        $productos = Producto::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $ofertas = Oferta::all();
        return view('productos.crear', compact('categorias', 'ofertas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idcategoria' => 'required',
            'idoferta' => 'nullable|exists:ofertas,id',
            'codigo' => 'nullable',
            'nombre' => 'required|unique:productos',
            'precio_venta' => 'required|numeric',
            'stock' => ['required', 'numeric', 'min:2'],
            'descripcion' => 'nullable',
            'estado' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Procesa la imagen y guárdala en tu sistema de archivos
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $ruta = 'img/productos';
        $imagen->move(public_path($ruta), $nombreImagen);

        $precioVenta = $request->input('precio_venta');
        $oferta = Oferta::find($request->input('idoferta'));
        $precioConDescuento = $precioVenta;

        if ($oferta) {
            $descuento = ($precioVenta * $oferta->porcentaje) / 100;
            $precioConDescuento = $precioVenta - $descuento;
        }

        Producto::create(array_merge(
            $request->all(),
            ['imagen' => $ruta . '/' . $nombreImagen, 'precio_venta' => $precioConDescuento]
        ));

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $ofertas = Oferta::all();
        return view('productos.editar', compact('producto', 'categorias', 'ofertas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idcategoria' => 'required',
            'idoferta' => 'nullable|exists:ofertas,id',
            'codigo' => 'nullable',
            'nombre' => 'required|unique:productos,nombre,' . $id,
            'precio_venta' => 'required|numeric',
            'stock' => 'required|numeric|min:2',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = Producto::findOrFail($id);

        // Procesa la nueva imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $ruta = 'img/productos';
            $imagen->move(public_path($ruta), $nombreImagen);
            $request['imagen'] = $ruta . '/' . $nombreImagen;
        } else {
            $request['imagen'] = $producto->imagen;
        }

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function buscar(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $demandas = Producto::whereHas('detalleVentas', function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        })
            ->withCount(['detalleVentas as demanda_total' => function ($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('fecha', [$fechaInicio, $fechaFin]);
            }])
            ->orderByDesc('demanda_total')
            ->get();

        return view('productos.buscar', compact('demandas'));
    }
}
