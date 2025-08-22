@extends('layouts.admin')

@section('content')
    <div class="row">
    <!-- Tiitulo de la ventana Eliminar, Muestra el ID del vehiculo que se eliminará -->
        <h1>Eliminar vehículo: {{ $inventario->id }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                <!-- Muestra los datos del Vehiculo según el ID seleccionado -->    
                <form action="{{ route('admin.inventario.destroy', $inventario->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
<!-- Se desglosan los detalles como marca, modelo, año, precio, etc. -->
                        <div class="row">
                            {{-- Marca --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" value="{{ $inventario->marca }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Modelo --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <input type="text" value="{{ $inventario->modelo }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Año --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Año</label>
                                    <input type="text" value="{{ $inventario->anio }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Precio --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" value="{{ $inventario->precio }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Estado --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" value="{{ $inventario->estado }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Kilometraje --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kilometraje</label>
                                    <input type="text" value="{{ $inventario->kilometraje }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Color --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" value="{{ $inventario->color }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Creado en --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Creado en</label>
                                    <input type="text" value="{{ $inventario->created_at }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Última actualización --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Última actualización</label>
                                    <input type="text" value="{{ $inventario->updated_at }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- Botón que cancela la eliminación -->
                                    <a href="{{ route('admin.inventario.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <!-- Botón que confirma la eliminación, este envía los datos a la ruta route('admin.inventario.destroy', $inventario->id) -->
                                    <button type="submit" class="btn btn-danger">Eliminar Vehículo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
