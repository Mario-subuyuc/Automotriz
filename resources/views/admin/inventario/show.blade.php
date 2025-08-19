@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Detalle de Vehículo: {{ $inventario->id }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detalles del Vehículo</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                    <input type="text" value="{{ $inventario->marca }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" value="{{ $inventario->modelo }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="anio">Año</label>
                                    <input type="text" value="{{ $inventario->anio }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="text" value="{{ number_format($inventario->precio, 2, '.', ',') }} $"
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" value="{{ $inventario->estado }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kilometraje">Kilometraje</label>
                                    <input type="text" value="{{ number_format($inventario->kilometraje) }} km"
                                        class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" value="{{ $inventario->color }}" class="form-control" readonly>
                                </div>
                            </div>

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label>Creado el:</label>
                                    <input type="text" class="form-control"
                                        value="{{ $inventario->created_at->format('d/m/Y H:i') }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Última actualización:</label>
                                    <input type="text" class="form-control"
                                        value="{{ $inventario->updated_at->format('d/m/Y H:i') }}" disabled>
                                </div>
                            </div>

                        </div>

                        <!-- Nueva sección para timestamps con estética de form-control -->
                        <div class="row">

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('admin/inventario') }}" class="btn btn-secondary">Volver a la lista</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
