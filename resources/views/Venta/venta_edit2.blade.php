@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">ABONO VENTAS</h2>
    @component('components.boton_back',['ruta' => route('dashboard.dashboard'),'color' => $array_color['back_button_color']])
        Botón de retorno
    @endcomponent
</div>

@endsection


@section('main-content')

<div class="container-fluid w-50" style="max-width:640px">
    <div class="card">
        <div class="card-body">
            <div class="col-lg-12 col-xs-12">
                     @if ($errors->any())
                        <div class="alert alert-danger">
                              <ul>
                                @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                        </div>
                      @endif

                        {{ csrf_field() }}

                     {!! Form::open(array('route' => array('venta.imprimir'),
                     'method'=>'POST','id' => 'form_participante_id','enctype' =>'multipart/form-data')) !!}

                    <div class="form-group">
                        <div style="text-align:left;">

                         <h3>Datos de Stand</h3>
                         <input type="hidden" name="stand_id" value="{{$stand->id}}">
                         <input type="hidden" name="costo" value="{{$stand->costo}}">
                         <input type="hidden" name="id" value="{{ $participante2->id}}"> <!-- id de la venta -->
                         <input type="hidden" name="participante_id" value="{{ $participante2->participante_id}}">

                        <div style="text-align:left;">
                            {!! Form::label('nombre',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('nombre',$stand->nombre,['placeholder' => trans('message.solicitud_action.nombre'),'class' => 'form-control','id' => 'nombre','disabled' => 'true']) !!}
                        </div>

                        <div style="text-align:left;">
                            {!! Form::label('ubicacion','UBICACION', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('ubicacion',$stand->ubicacion,['placeholder' => 'UBICACION','class' => 'form-control','id' => 'ubicacion','disabled' => 'true']) !!}
                         </div>
                        <div style="text-align:left;">
                            {!! Form::label('zona','ZONA', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('zona',$stand->zona,['placeholder' => 'ZONA','class' => 'form-control','id' => 'zona','disabled' => 'true']) !!}
                         </div>
                         <div style="text-align:left;">
                            {!! Form::label('costo','COSTO $', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('costo',$stand->costo,['placeholder' => 'COSTO','class' => 'form-control','id' => 'costo','disabled' => 'true']) !!}
                         </div>
                         <div style="text-align:left;">
                            <h3>Datos del Cliente</h3>
                         </div>
                         <div style="text-align:left;">
                         {!! Form::label('participante','PARTICIPANTE', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('participante',$participante,  $participante2->participante_id, ['placeholder' => 'PARTICIPANTE','required' => 'required','class' => 'form-control required','id' => 'participante_id','disabled'=>'true']) !!}
                        </div>

                        <div style="text-align:left;">
                            {!! Form::label('montocancelado','MONTO A CANCELAR $', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::number('montocancelado',$participante2->montocancelado,['placeholder' => 'MONTO A CANCELAR','required' => 'required','class' => 'form-control','id' => 'montocancelado','disabled'=>'true']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('observacion','OBSERVACION', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::textarea('observacion',$participante2->observacion,['placeholder' => 'OBSERVACION','required' => 'required','class' => 'form-control','id' => 'observacion','disabled'=>'true']) !!}
                        </div>
                        <div style="display: flex; justify-content: right; margin-top: 1rem;"; >
                            {!! Form::submit('IMPRIMIR',['class'=> 'form-control btn btn-primary','IMPRIMIR','data-toggle' => 'tooltip','style' => 'background-color:'.$array_color['group_button_color'].';']) !!}
                            {!! Form::button('ELIMINAR', ['id' => 'eliminar', 'class' => 'form-control btn btn-primary','onclick' => 'eliminarVenta(' . $participante2->id . ')','style' => 'background-color:' . $array_color['group_button_color'] . ';']) !!}


                            {!!  Form::close() !!}
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script_datatable')


<script type="text/javascript">
    function eliminarVenta(id) {
     alert(id);
     if (confirm('¿Estás seguro de que deseas eliminar esta venta?')) {
         $.ajax({
             url: '/eliminar', // Cambiado a '/eliminar'
             type: 'GET',
             data: { id: id },
             success: function(response) {
                 window.location.href = '/home';
             },
             error: function(xhr, status, error) {
                 console.error('Error al eliminar la venta:', error);
                 alert('Ocurrió un error al eliminar la venta.');
             }
         });
     }
 }


     </script>

<script src="{{ url ('/js_users/js_users.min.js') }}" type="text/javascript"></script>
@endsection
