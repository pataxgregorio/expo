@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">MOSTRAR PARTICIPANTE</h2>
    @component('components.boton_back',['ruta' => route('participante.index'),'color' => $array_color['back_button_color']])
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
                {!! Form::open(array('route' => array('participante.update',$participante_edit->id),
                'method'=>'POST','id' => 'form_users_id','enctype' =>'multipart/form-data')) !!}
              

            
                <div class="form-group">
                      <div style="text-align:left;">
                            {!! Form::label('nombre',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('nombre',$participante_edit->nombre,['placeholder' => trans('message.solicitud_action.nombre'),'class' => 'form-control','id' => 'nombre','disabled' => 'true']) !!}
                        </div>  
                        <div style="text-align:left;">
                         {!! Form::label('letra','RIF', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('letra',$letra, $participante_edit->letra, ['placeholder' => 'RIF','class' => 'form-control','id' => 'letra','disabled' => 'true']) !!}
                        
                        </div>    
                        <div style="text-align:left;">
                            {!! Form::label('rif',trans('message.solicitud_action.cedula'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('rif',$participante_edit->rif,['placeholder' => trans('message.solicitud_action.cedula'),'class' => 'form-control','id' => 'cedula','disabled' => 'true']) !!}
                         </div>   
                        <div style="text-align:left;">
                            {!! Form::label('telefono',trans('message.solicitud_action.telefono'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('telefono',$participante_edit->telefono,['placeholder' => trans('message.solicitud_action.telefono'),'class' => 'form-control','id' => 'telefono' ,'disabled' => 'true']) !!}
                         </div>    
                         <div style="text-align:left;">
                            {!! Form::label('telefono2',trans('message.solicitud_action.telefono2'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('telefono2',$participante_edit->telefono2,['placeholder' => trans('message.solicitud_action.telefono2'),'class' => 'form-control','id' => 'telefono2' ,'disabled' => 'true']) !!}
                         </div>  
                         <div style="text-align:left;">
                            {!! Form::label('email',trans('message.users_action.email_user'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::email('email',$participante_edit->direccion,['placeholder' => trans('message.users_action.mail_ejemplo'),'class' => 'form-control','id' => 'email' ,'disabled' => 'true']) !!}
                             </div>   
                        <div style="text-align:left;">
                         {!! Form::label('sector','SECTOR', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('sector',$sector, $participante_edit->sector, ['placeholder' => 'SECTOR','class' => 'form-control','id' => 'sector','disabled' => 'true']) !!}
                        
                        </div>    
                        <br>
                        <br>
              
                </div>   

                </div>   
              
            </div>     
        </div>
    </div>
</div>
@endsection
@section('script_datatable')
    <script src="{{ url ('/js_users/js_users.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        
   
</script>
@endsection  