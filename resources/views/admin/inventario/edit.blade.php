@extends('layouts.admin')

@section('content')
    <div class="row">
    <!-- Titulo de la ventana Editar, Muestra el ID del vehiculo que se editará -->
        <h1>Editar Vehículo: {{ $inventario->id }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Actualice los datos del vehículo</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.inventario.update', $inventario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Muestra los datos del Vehiculo según el ID seleccionado -->
                            {{-- Marca --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="marca">Marca</label><b>*</b>
                                    <input type="text" name="marca" value="{{ old('marca', $inventario->marca) }}"
                                        class="form-control" required>
                                    @error('marca')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- Modelo --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label><b>*</b>
                                    <input type="text" name="modelo" value="{{ old('modelo', $inventario->modelo) }}"
                                        class="form-control" required>
                                    @error('modelo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- Año --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="anio">Año</label><b>*</b>
                                    <input type="number" name="anio" value="{{ old('anio', $inventario->anio) }}"
                                        class="form-control" required>
                                    @error('anio')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Precio --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio">Precio</label><b>*</b>
                                    <input type="number" step="0.01" name="precio"
                                        value="{{ old('precio', $inventario->precio) }}" class="form-control" required>
                                    @error('precio')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- Desglosa los posibles estados del vehículo -->

                            {{-- Estado --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label><b>*</b>
                                    <select name="estado" class="form-control" required>
                                        <option value="" disabled>Seleccionar...</option>
                                        <option value="Disponible"
                                            {{ old('estado', $inventario->estado) == 'Disponible' ? 'selected' : '' }}>
                                            Disponible</option>
                                        <option value="Vendido"
                                            {{ old('estado', $inventario->estado) == 'Vendido' ? 'selected' : '' }}>Vendido
                                        </option>
                                        <option value="En mantenimiento"
                                            {{ old('estado', $inventario->estado) == 'En mantenimiento' ? 'selected' : '' }}>
                                            En mantenimiento</option>
                                    </select>
                                    @error('estado')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- Kilometraje --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kilometraje">Kilometraje</label><b>*</b>
                                    <input type="number" name="kilometraje"
                                        value="{{ old('kilometraje', $inventario->kilometraje) }}" class="form-control"
                                        required>
                                    @error('kilometraje')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Color --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="color">Color</label><b>*</b>
                                    <input type="text" name="color" value="{{ old('color', $inventario->color) }}"
                                        class="form-control" required>
                                    @error('color')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- Boton que cancela la eliminación -->
                                    <a href="{{ route('admin.inventario.index') }}" class="btn btn-secondary">Cancelar</a>
<!-- Boton que envia los nuevos datos del vehiculo segun el id a la ruta -->
                                    <button type="submit" class="btn btn-primary">Actualizar Vehículo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
