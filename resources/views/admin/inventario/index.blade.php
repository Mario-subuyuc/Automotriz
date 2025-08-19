@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Inventario</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Vehiculos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/inventario/create') }}" class="btn btn-primary">
                            Registrar Nueva Veiculo
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover  table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Marca</th>
                                <th scope="col" style="text-align: center">Modelo</th>
                                <th scope="col" style="text-align: center">Año</th>
                                <th scope="col" style="text-align: center">Precio</th>
                                <th scope="col" style="text-align: center">Estado</th>
                                <th scope="col" style="text-align: center">Kilometraje</th>
                                <th scope="col" style="text-align: center">Color</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($inventarios as $inventario)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{  $inventario->marca}}</td>
                                    <td style="text-align: center">{{ $inventario->modelo}}</td>
                                    <td style="text-align: center">{{ $inventario->anio}}</td>
                                    <td style="text-align: center">Q {{ number_format($inventario->precio, 2, '.', ',') }}</td>
                                    <td style="text-align: center">{{ $inventario->estado}}</td>
                                    <td style="text-align: center">{{ number_format($inventario->kilometraje) }} km</td>
                                    <td style="text-align: center">{{ $inventario->color}}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('admin/inventario/' . $inventario->id) }}" type="button"
                                                class="btn btn-info btn-sm"><i class="bi bi-eye">Ver</i></a>
                                            <a href="{{ url('admin/inventario/' . $inventario->id . '/edit') }}" type="button"
                                                class="btn btn-success btn-sm"><i class="bi bi-pencil"></i>Editar</a>
                                            <a href="{{ url('admin/inventario/' . $inventario->id . '/confirm-delete') }}"
                                                type="button" class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash3"></i>Borrar</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        $(function() {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "lengthMenu": [
                                    [5, 10, 20, -1],
                                    [5, 10, 20, "Todos"]
                                ], // Configura las opciones de filas por página
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_inventarios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 inventarios",
                                    "infoFiltered": "(Filtrado de _MAX_ total de inventarios)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_inventarios  ",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true,
                                "lengthChange": true,
                                "autoWidth": false,
                                "order": [[2, 'desc']],
                                buttons: [{
                                        extend: 'collection',
                                        text: '<i class="bi bi-file-earmark-text"></i> Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: '<i class="bi bi-clipboard"></i> Copiar',
                                            extend: 'copy',
                                            exportOptions: { columns: ':visible:not(.no-export)' }
                                        }, {
                                            text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                                            extend: 'pdf',
                                            exportOptions: { columns: ':visible:not(.no-export)' }
                                        }, {
                                            text: '<i class="bi bi-file-earmark-spreadsheet"></i> CSV',
                                            extend: 'csv',
                                            exportOptions: { columns: ':visible:not(.no-export)' }
                                        }, {
                                            text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                                            extend: 'excel',
                                            exportOptions: { columns: ':visible:not(.no-export)' }
                                        }, {
                                            text: '<i class="bi bi-printer"></i> Imprimir',
                                            extend: 'print',
                                            exportOptions: { columns: ':visible:not(.no-export)' }
                                        }]
                                    },
                                    {
                                        extend: 'colvis',
                                        text: '<i class="bi bi-eye"></i> Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
