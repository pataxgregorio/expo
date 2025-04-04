@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<!-- Componente Button Para todas las Ventanas de los Módulos, no Borrar.-->
@component('components.button',['titulo_modulo' =>'Participante',
                                'router_modulo_create' => route('participante.create'),
                                'id_new_modulo' => 'new_solicitud',
                                'boton_crear' => 'Particip.',
                                'route_print' => route('participante.participantesPrint'),
                                'route_download' => route('participante.participantesPrint'),
                                'route_upload' => route('participante.participantesPrint'),
                                'tooltip' => trans('message.tooltip.new_module'),
                                'color' => $array_color['group_button_color']])
Componentes para los Módulos del Sistema, (New,Print,Download and Upload)
@endcomponent


@endsection

@section('link_css_datatable')
    <link href="{{ url ('/css_datatable/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/buttons.dataTables.min.css') }}" rel="stylesheet">
@endsection


@section('main-content')
@component('components.alert_msg',['tipo_alert'=>$tipo_alert])
 Componentes para los mensajes de Alert, No Eliminar
@endcomponent
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
                <table class="table table-bordered solicitud_all">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th  style="text-align:center;">Direccion</th>
                                <th style="text-align:center;">Telefono</th>
                                <th style="text-align:center;">{{ trans('message.botones.edit') }}</th>
                                <th style="text-align:center;">{{ trans('message.botones.view') }}</th>
                                <th style="text-align:center;">Eliminar</th>
                            </tr>
                        </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection
@section('script_datatable')
<script src="{{ url ('/js_datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_delete/sweetalert.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {

    var table = $('.solicitud_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,
        ajax: "{{ route('participante.list') }}",

        columns: [
            {
                data: 'id', name: 'id',
                "render": function ( data, type, row ) {

                    return '<div style="text-align:center;"><b>'+data+'</b></div>';
                }
            },
            {data: 'nombre', name: 'nombre'},
            {data: 'direccion', name: 'nombretipo'},
            {data: 'telefono', name: 'telefono'},



            {
                data: 'edit', name: 'edit', orderable: false, searchable: false,
                "render": function ( data, type, row ) {
                    return '<div style="text-align:center;">'+data+'</div>';
                }
            },
            {
                data: 'del', name: 'del', orderable: false, searchable: false,
                "render": function ( data, type, row ) {
                    return '<div style="text-align:center;">'+data+'</div>';
                }
            },
            {
                data: 'view', name: 'view', orderable: false, searchable: false,
                "render": function ( data, type, row ) {
                    return '<div style="text-align:center;">'+data+'</div>';
                }
            },

        ],
        "language": {
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
<script src="{{ url ('/js_delete/delete_confirm.min.js') }}"></script>
@endsection
