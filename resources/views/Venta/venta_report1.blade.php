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
        <div style="text-align:center" >
          <a href="{{ url('/standvendidos') }}"><img src="{{ url('/images/mapa.png') }}" alt="" class="img-fluid" style="with: 100%; max-height:250px;max-width:300px; margin-top: 50px;"></a>
        <div style="text-align:center;"><h3>REPORTE STAND VENDIDOS</h3></div>

        </div>

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

        // Inicializa la variable table en el ámbito global
        var table;
        $('#btn_listado').click(function() {
            var fechaDesde = $('#fecha_desde').val();
            var fechaHasta = $('#fecha_hasta').val();
            var zona = $('#zona_id').val();

            // Validación básica de fechas (puedes agregar validaciones más robustas)


            var url = "{{ route('imprimirventas') }}" + "?fecha_desde=" + fechaDesde + "&fecha_hasta=" + fechaHasta + "&zona=" + zona;
            window.location.href = url;
        });

        $('#btn_filtrar').click(function() {

            var fechaDesde = $('#fecha_desde').val();
            var fechaHasta = $('#fecha_hasta').val();

            if (!$.fn.DataTable.isDataTable('.solicitud_all2')) {
                // Inicializar la tabla solo si no está inicializada
                table = $('.solicitud_all2').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    autoWidth: false,
                    ajax: {
                        url: "{{ route('stand2.list') }}",
                        type: "GET",
                        dataType: 'json',
                        data: function(d) {
                            d.zona = $('#zona_id').val();
                            d.fecha_desde = $('#fecha_desde').val();
                            d.fecha_hasta = $('#fecha_hasta').val();
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
            } else {
                // Recarga la tabla si ya está inicializada.
                table.ajax.reload();
            }
        });


    });
    </script>
@endsection
