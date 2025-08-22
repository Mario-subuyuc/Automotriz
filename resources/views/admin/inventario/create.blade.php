@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Registro de un nuevo vehículo en inventario</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Ingrese los datos del vehículo</h3>
            </div>
            <div class="card-body">
                <!-- formulario para Guardar vehículo -->
                <form action="{{ route('admin.inventario.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Campo para agregar marca del vehiculo -->
                        {{-- Marca --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Marca</label><b>*</b>
                                <input type="text" name="marca" value="{{ old('marca') }}"
                                       class="form-control" required>
                                @error('marca')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Campo para modelo del vehículo -->
                        {{-- Modelo --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Modelo</label><b>*</b>
                                <input type="text" name="modelo" value="{{ old('modelo') }}"
                                       class="form-control" required>
                                @error('modelo')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Campo para modelo del vehículo -->
                        {{-- Año --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Año</label><b>*</b>
                                <input type="number" name="anio" value="{{ old('anio') }}"
                                       class="form-control" min="1900" max="{{ date('Y')+1 }}" required>
                                @error('anio')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
<!-- Campo para modelo del vehículo -->
                    <div class="row">
                        {{-- Precio --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio</label><b>*</b>
                                <input type="number" name="precio" value="{{ old('precio') }}"
                                       class="form-control" min="0" step="0.01" required>
                                @error('precio')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Campo para modelo del vehículo -->
                        {{-- Estado --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Estado</label><b>*</b>
                                <select name="estado" class="form-control" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Disponible" {{ old('estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="Vendido" {{ old('estado') == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                                    <option value="En mantenimiento" {{ old('estado') == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
                                </select>
                                @error('estado')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- Kilometraje --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kilometraje</label>
                                <input type="number" name="kilometraje" value="{{ old('kilometraje') }}"
                                       class="form-control" min="0">
                                @error('kilometraje')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Color --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" name="color" value="{{ old('color') }}"
                                       class="form-control">
                                @error('color')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.inventario.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar vehículo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

