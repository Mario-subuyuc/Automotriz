@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Usuario: {{ $usuario->name }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                    <form action= "{{ url('/admin/usuarios/' . $usuario->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for = " ">Nombre del usuario</label>
                                    <input type ="text" value= "{{ $usuario->name }}" name= "name" class="form-control"
                                        disabled>
                                    @error('name')
                                        <small style = "color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for = " ">Email</label>
                                    <input type ="email" value= "{{ $usuario->email }}" name="email" class="form-control"
                                        disabled>
                                    @error('email')
                                        <small style = "color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Nueva sección para timestamps con estética de form-control -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Creado el:</label>
                                    <input type="text" class="form-control"
                                        value="{{ $usuario->created_at->format('d/m/Y H:i') }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Última actualización:</label>
                                    <input type="text" class="form-control"
                                        value="{{ $usuario->updated_at->format('d/m/Y H:i') }}" disabled>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/usuarios') }}" class= "btn btn-secondary">Cancelar</a>
                                    <button type ="submit" class= "btn btn-danger">Eliminar Usuario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
