@extends('layouts.tienda')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <h1>Productos Reservados</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach ($reservations as $reservation)
            @foreach ($reservation->detalleVentas as $detalle)
                <li>{{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }}</li>
            @endforeach
        @endforeach
    </ul>

    <form action="{{ route('reservations.pay') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>

    <footer class="main-footer">
        @include('layouts.footer')
    </footer>
</div>
@endsection
