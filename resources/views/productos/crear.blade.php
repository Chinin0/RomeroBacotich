@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Agregar Producto</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        {!! Form::open(['route' => 'productos.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <select name="idcategoria" id="categoria" class="form-control">
                                        @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- Oferta --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="oferta">Oferta</label>
                                    <select name="idoferta" id="oferta" class="form-control">
                                        <option value="" data-porcentaje="0">Sin Oferta</option>
                                        @foreach ($ofertas as $oferta)
                                        <option value="{{ $oferta->id }}" data-porcentaje="{{ $oferta->porcentaje }}">{{ $oferta->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- Precio con descuento --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="precio_venta">Precio de venta</label>
                                    {!! Form::number('precio_venta', null, ['class' => 'form-control', 'step' => '0.01', 'id' => 'precio_venta']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="precio_descuento">Precio con descuento</label>
                                    <input type="number" id="precio_descuento" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Otros campos --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    {!! Form::file('imagen', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ofertaSelect = document.getElementById('oferta');
        const precioVentaInput = document.getElementById('precio_venta');
        const precioDescuentoInput = document.getElementById('precio_descuento');

        function calcularDescuento() {
            const precioVenta = parseFloat(precioVentaInput.value);
            const porcentaje = parseFloat(ofertaSelect.selectedOptions[0].getAttribute('data-porcentaje')) || 0;
            const descuento = (precioVenta * porcentaje) / 100;
            const precioConDescuento = precioVenta - descuento;
            precioDescuentoInput.value = precioConDescuento.toFixed(2);
        }

        ofertaSelect.addEventListener('change', calcularDescuento);
        precioVentaInput.addEventListener('input', calcularDescuento);
    });
</script>

@endsection
