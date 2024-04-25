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
@component('components.alert_msg',['tipo_alert'=>$tipo_alert])
 Componentes para los mensajes de Alert, No Eliminar
@endcomponent

<div class="container-fluid">
    <div class="card">
        <div class="card-body">      
            
        <?php    
          foreach ($resultado as $row2);
        ?>
        <div style="text-align:center">
            <img src="{{ url('/images/icons/cintillo.png') }}" alt="" class="img-fluid" style="width: 100%; max-width:1200px;">
        </div> 
        <div style="text-align:center;"><h3>REPORTE TOTAL DE {{$row2->status}}</h3></div>
        <table  class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">ID</th>
            @if ($row2->status!=='DISPONIBLE')
            <th style="text-align:center;">Participante</th> 
            @endif

            <th style="text-align:center;">Stand</th>
            <th style="text-align:center;">Zona</th>
        </tr>
    </thead>
    <tbody>
   
        @foreach ($resultado as $row)
       
            <tr>
                <td style="text-align:center;">{{ $row->id }}</td>
                @if ($row->status!=='DISPONIBLE')
                    <td style="text-align:center;">{{ $row->participante }}</td>
                    @endif
                    @if ($row->status!=='DISPONIBLE')
                <td style="text-align:center;">{{ $row->stand }}</td>
                @endif
                @if ($row->status=='DISPONIBLE')
                <td style="text-align:center;">{{ $row->nombre }}</td>
                @endif
                <td style="text-align:center;">{{ $row->zona }}</td>
            </tr>
        @endforeach

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
<script src="{{ url ('/js_delete/delete_confirm.min.js') }}"></script>
@endsection  
