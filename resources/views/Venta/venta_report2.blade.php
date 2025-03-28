@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<!-- Componente Button Para todas las Ventanas de los Módulos, no Borrar.-->


@endsection

@section('link_css_datatable')
    <link href="{{ url ('/css_datatable/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/buttons.dataTables.min.css') }}" rel="stylesheet">
@endsection


@section('main-content')


<div class="container-fluid">
    <div class="card">
        <div class="card-body">

        <?php


         // $participante = isset($row->participante) ? $row->id :"";
        ?>
        <div style="text-align:center">
            <img src="{{ url('/images/logo.png') }}" alt="" class="img-fluid" style="with: 100%; max-height:270px;max-width:270px;">
        </div>
        <div style="text-align:center;"><h3>REPORTE TOTAL DE VENTAS</h3></div>
        <div class="row">
            <div class="col-md-2">
                <label for="fecha_desde">Fecha Desde:</label>
                <input type="date" class="form-control" id="fecha_desde">
            </div>
            <div class="col-md-2">
                <label for="fecha_hasta">Fecha Hasta:</label>
                <input type="date" class="form-control" id="fecha_hasta">
            </div>
            <div class="col-md-2">
                <label for="direcciones">Zona:</label>
                {!! Form::select('direcciones', [NULL => 'Seleccionar'] + $standArray, NULL, ['class' => 'form-control', 'id' => 'zona_id']) !!}
            </div>

        </div>
    <div class="table-responsive">

   <table  class="table table-bordered solicitud_all2">

    <thead>
        <tr>
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Stand</th>
                <th style="text-align:center;">Zona</th>
                <th style="text-align:center;">Participante</th>
                <th style="text-align:center;">Fecha</th>
                <th style="text-align:center;">Vendedor</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
        </div>
    </div>
</div>
<?php
  //  $phpValue = $row2->status;
   // echo "<script> var jsValue = '" . $phpValue . "'; </script>";

?>
@endsection
@section('script_datatable')
<script src="{{ url ('/js_datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_delete/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_delete/delete_confirm.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('.solicitud_all2').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: "{{ route('stand2.list') }}",
            type: "GET",
            dataType: 'json',
            data: function(d) {
                d.status = window.valueFromPHP; // Asegúrate de que valueFromPHP esté definido globalmente o correctamente
            }
        },
        columns: [
            {
                data: 'id',
                name: 'id',
                render: function(data, type, row) {
                    return '<div style="text-align:center;"><b>' + data + '</b></div>';
                }
            },
            { data: 'stand', name: 'stand' },
            { data: 'zona', name: 'zona' },
            { data: 'participante', name: 'participante' },
            { data: 'fecha', name: 'fecha' },
            { data: 'status', name: 'status' },
            { data: 'vendedor', name: 'vendedor' },
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado !!! - disculpe",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Registros no disponible",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            }
        }
    });
});
</script>
@endsection
