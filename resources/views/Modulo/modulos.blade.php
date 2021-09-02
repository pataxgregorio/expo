@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('message.home_1') }}
@endsection

@section('contentheader_title')
    <!-- Componente Button Para todas las Ventanas de los Módulos, no Borrar.--> 
@component('components.button',['titulo_modulo' => trans('message.menu_modulo'),
                                'router_modulo_create' => route('users.create'),
                                'id_new_modulo' => 'new_modulos',
                                'boton_crear' => trans('message.menu_modulo'),
                                'route_print' => route('users.usersPrint'),
                                'route_download' => route('users.create'),
                                'route_upload' => route('users.create'),
                                'tooltip' => trans('message.tooltip.new_module')])
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
<div class="container-fluid">
<div class="card" id="mostar_ocultar_permisos">
    <div class="card-body">            
        <table class="table table-bordered modulos_all">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ trans('message.datadatable_user.nombre') }}</th>                    
                    <th>{{ trans('message.description') }}</th>                    
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
<script type="text/javascript">
  $(function () {
    
    var table = $('.modulos_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: "{{ route('modulos.list') }}",        
        columns: [             
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},            
            {data: 'description', name: 'description'},
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
@endsection
