@extends('layouts.admin')
@section('links')
    <!-- ChartJS -->
    <script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
@endsection
@section('content')
    <div class="row d-flex justify-content-between align-items-center">
        <h1>Bienvenido : {{ Auth::user()->name }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4 col-4">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{$total_inventarios}}</h3>
                    <p>Inventario</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-car-front-fill"></i>
                </div>
                <a href="{{ url('admin/inventario') }}" class="small-box-footer">Más Información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="small-box bg-indigo">
                <div class="inner">
                    <h3>{{ $total_usuarios }}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-people"></i>
                </div>
                <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Más Información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="small-box bg-cyan">
                <div class="inner">
                    <h3>{{$total_online}}</h3>
                    <p>En linea</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-wifi"></i>
                </div>
                <a href="{{ url('admin/sesiones') }}" class="small-box-footer">Más Información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!--
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="bi bi-graph-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ventas del Día<br><small>(unidades vendidas)</small></span>
                    <span class="info-box-number">{{ $productoEstrella ?? 'Ninguno' }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="bi bi-star-fill"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Producto Estrella<br><small>(más vendido)</small></span>
                    <span class="info-box-number">{{ $productoEstrella ?? 'Ninguno' }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="bi bi-cash-coin"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ingreso del dia<br><small>(cantidad monetaria)</small></span>
                    <span class="info-box-number">Q{{  $productoEstrella ?? 'Ninguno' }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
                <span class="info-box-icon"><i class="bi bi-receipt-cutoff"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Transacciones <br><small>(movimientos)</small></span>
                    <span class="info-box-number">{{  $productoEstrella ?? 'Ninguno' }}</span>
                </div>
            </div>
        </div>
    </div>
    -->
    <hr>
    <div class="watermark">
    <img src="{{ asset('dist/img/mecanico.png') }}" alt="Logo de carro">
    </div>

    <style>
    .watermark {
        position: relative;
        text-align: center;
        margin-top: 20px;
        opacity: 0.5; /* transparencia para efecto marca de agua */
    }

    .watermark img {
        max-width: 500px; /* ajusta el tamaño */
        height: auto;
    }
</style>

@endsection
