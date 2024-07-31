@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ofertas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('ofertas.crear') }}"> Nueva </a>


                            <table id="data-table" class = "table table-striped mt-2">
                                <thead >
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Porcentaje</th>
                                    <th> Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($ofertas as $oferta)
                                    <tr>
                                        <td>{{ $oferta->id }}</td>
                                        <td>{{ $oferta->nombre }}</td>
                                        <td>{{ $oferta->descripcion }}</td>
                                        <td>{{ $oferta->porcentaje }}</td>
                                        <td>
                                            {{-- <a class = "btn btn-info" href="{{ route('ofertas.edit',$oferta->id) }}"> Editar </a> --}}
                                            {!! Form::open(['method' => 'DELETE','route' => ['ofertas.delete', $oferta->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('borrar', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $ofertas->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


