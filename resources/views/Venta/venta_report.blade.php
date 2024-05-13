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


<!-- @foreach ($resultado as $row)
        
        
        //$fecha=$row->fecha;
       // $fecha2 = $fecha->format('d/m/Y');
    //  $id =isset($row->id) ? $row->id :"";
    //  $participante = isset($row->participante) ? $row->id :"";
        
             <tr>
                 @if($row->status=='DISPONIBLE')
                     <td style="text-align:center;">{{ $row->id }}</td>
                     <td style="text-align:center;">{{ $row->nombre }}</td>
                     <td style="text-align:center;">{{ $row->zona }}</td>
                 @endif
                 @if($row->status!=='DISPONIBLE')
                     <td style="text-align:center;">{{ $row->id }}</td>
                     @if ($row->status!=='DISPONIBLE')
                         <td style="text-align:center;">{{ $row->participante }}</td>
                         @endif
                         @if ($row->status!=='DISPONIBLE')
                         <td style="text-align:center;">{{$row->fecha}}</td>
                         @endif
                         @if ($row->status!=='DISPONIBLE')
                     <td style="text-align:center;">{{ $row->stand }}</td>
                     @endif
                     @if ($row->status=='DISPONIBLE')
                     <td style="text-align:center;">{{ $row->nombre }}</td>
                     @endif
                     <td style="text-align:center;">{{ $row->zona }}</td>
                     @if ($row->status!=='DISPONIBLE')
                     <td style="text-align:center;">{{ $row->vendedor }}</td>
                     @endif
                 @endif
             </tr>
         @endforeach -->

<div class="container-fluid">
    <div class="card">
        <div class="card-body">      
            
        <?php    
       
          foreach ($resultado as $row2);
         
         // $participante = isset($row->participante) ? $row->id :"";
        ?>
        <div style="text-align:center">
            <img src="{{ url('/images/icons/cintillo.png') }}" alt="" class="img-fluid" style="width: 100%; max-height:140px; :max-width:1000px;">
        </div> 
        <div style="text-align:center;"><h3>REPORTE TOTAL DE {{$row2->status}}</h3></div>
    <div class="table-responsive">   
        <table  class="table table-bordered solicitud_all2">
    <thead>
        <tr>
            @if($row2->status=='DISPONIBLE')
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Stand</th>
                <th style="text-align:center;">Zona</th>
            @endif
            @if($row2->status!=='DISPONIBLE')
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Participante</th>
                <th style="text-align:center;">Fecha</th>
                <th style="text-align:center;">Stand</th>
                <th style="text-align:center;">Zona</th>
                <th style="text-align:center;">Vendedor</th>
            @endif
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
    $phpValue = $row2->status;
    echo "<script> var jsValue = '" . $phpValue . "'; </script>";

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
$(document).ready(function(){
        var valueFromPHP = jsValue;
$(function () {
    
    if(valueFromPHP === "DISPONIBLE"){
        var table = $('.solicitud_all2').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
            ajax: ({
            url:"{{ route('stand.list') }}",
            type:"GET",
            dataType: 'json',
            data:{status:valueFromPHP}
            }),
        
        columns: [          
            {
                data: 'id', name: 'id',
                "render": function ( data, type, row ) {
                    return '<div style="text-align:center;"><b>'+data+'</b></div>';
                }
            },
            {data: 'nombre', name: 'stand'}, 
            {data: 'zona', name: 'zona'}, 
            
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
    }
    else{
        var table = $('.solicitud_all2').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: ({
            url:"{{ route('ventas.list') }}",
            type:"GET",
            data:{status:valueFromPHP},
            }),
        columns: [          
            {
                data: 'id', name: 'id',
                "render": function ( data, type, row ) {
                    return '<div style="text-align:center;"><b>'+data+'</b></div>';
                }
            },
            {data: 'participante', name: 'participante'},
            {data: 'fecha', name: 'fecha'},
            {data: 'stand', name: 'nombretipo'}, 
            {data: 'zona', name: 'zona'},
            {data: 'vendedor', name: 'vendedor'},        
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
    };
  });
});
</script>
@endsection  
