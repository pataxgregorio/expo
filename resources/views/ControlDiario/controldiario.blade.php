@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<!-- Componente Button Para todas las Ventanas de los Módulos, no Borrar.--> 
@component('components.button',['titulo_modulo' => trans('message.daily_check'),
                                'router_modulo_create' => route('controldiario.create'),
                                'id_new_modulo' => 'new_control',
                                'boton_crear' => trans('message.new_control'),
                                'route_print' => route('controldiario.controldiarioPrint'),
                                'route_download' => route('controldiario.create'),
                                'route_upload' => route('controldiario.create'),
                                'tooltip' => trans('message.tooltip.new_control'),
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
                <table class="table table-bordered users_all">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ trans('message.datadatable_control.name') }}</th>
                                <th>{{ trans('message.datadatable_control.date') }}</th>
                                <th style="text-align:center;">{{ trans('message.datadatable_control.cedula') }}</th>
                                <th>{{ trans('message.datadatable_control.asunto') }}</th>
                                <th style="text-align:center;">{{ trans('message.botones.edit') }}</th>
                                <th style="text-align:center;">{{ trans('message.botones.view') }}</th>
                                <th style="text-align:center;">{{ trans('message.botones.delete') }}</th>
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
    
    var table = $('.users_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: "{{ route('users.list') }}",        
        columns: [             
            {
                data: 'id', name: 'id',
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;"><b>'+data+'</b></div>';
                }
            },
            {data: 'name', name: 'name'},
            {data: 'rol', name: 'rol'},
            {
                data: 'avatar',name: 'avatar',
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;"><img src="{{ url('storage/avatars/') }}/'+data+'" class="img-circle" alt="User Image" style="width:30px; height:30px;"></div>';
                }
            },
            {data: 'email', name: 'email'},
          
          
            {
                data: 'edit', name: 'edit', orderable: false, searchable: false,
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
            {
                data: 'del', name: 'del', orderable: false, searchable: false,                
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
