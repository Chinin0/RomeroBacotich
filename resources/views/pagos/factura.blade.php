@extends('layouts.tienda')

@section('content')
    <section class="section">
        <br>
        <br>
        <br>
        <br>
        <div class="section-header">
            <h3 class="page__heading">Nota de venta (SIN DERECHO A CREDITO FISCAL)</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Datos del cliente</h5>
                            <ul>
                                <li>Nombre: {{ $datos_cliente->name }}</li>
                                <li>E-mail: {{ $datos_cliente->email }}</li>
                                <li>Fecha: {{ $datos_cliente->fecha }}</li>
                                <li>Total: {{ $datos_cliente->total }}</li>
                            </ul>

                            <h5>Detalles</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datos_compras as $compra)
                                        <tr>
                                            <td>{{ $compra->nombre }}</td>
                                            <td>{{ $compra->cantidad }}</td>
                                            <td>{{ $compra->precio }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @section('scripts')
    <script>
        function descargarFactura(id) {
            window.location.href = "{{ url('/facturas') }}/" + id + "/descargar";
        }
    </script>
@endsection --}}
