@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">CREAR SOLICITUD</h2>
    @component('components.boton_back',['ruta' => route('solicitud.index'),'color' => $array_color['back_button_color']])
        Botón de retorno
    @endcomponent   
</div>
    
@endsection

    
@section('main-content')

<div class="container-fluid">
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
                {!! Form::open(array('route' => array('solicitud.store'),
                'method'=>'POST','id' => 'form_solicitud_id','enctype' =>'multipart/form-data')) !!}
                <div class="form-group">
        
                <div class="col-lg-6 col-xs-6">                    
                        <div style="text-align:left;">
                            {!! Form::label('nombre',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('nombre',old('nombre'),['placeholder' => trans('message.users_action.nombre'),'class' => 'form-control','id' => 'nombre_user']) !!}
                        </div>      
                        <div style="text-align:left;">
                            {!! Form::label('cedula',trans('message.solicitud_action.cedula'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('cedula',old('cedula'),['placeholder' => trans('message.solicitud_action.cedula'),'class' => 'form-control','id' => 'cedula_user']) !!}
                        </div>                   
                        <div style="text-align:left;">
                            {!! Form::label('email',trans('message.users_action.email_user'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::email('email',old('email'),['placeholder' => trans('message.users_action.mail_ejemplo'),'class' => 'form-control','id' => 'email_user']) !!}
                        </div>
                      
                        <div style="text-align:left;">
                            {!! Form::label('sexo_id',trans('message.solicitud_action.sexo'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('sexo', $roles, old('rols_id'), ['placeholder' => trans('message.permisos_rol.opcion'),'class' => 'form-control','id' => 'sexo_id']) !!}
                        </div>
                       
                        <div style="text-align:left;">
                            {!! Form::label('edocivil_id',trans('message.solicitud_action.edocivil'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('edocivil', $roles, old('rols_id'), ['placeholder' => trans('message.permisos_rol.opcion'),'class' => 'form-control','id' => 'edocivil_id']) !!}
                        </div>            
                </div>        
                <hr>
                        {!! Form::submit(trans('message.solicitud_action.new_solicitud'),['class'=> 'form-control btn btn-primary','title' => trans('message.solicitud_action.new_solicitud'),'data-toggle' => 'tooltip','style' => 'background-color:'.$array_color['group_button_color'].';']) !!}                     
                </div>      
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection
@section('script_datatable')
    <script src="{{ url ('/js_users/js_users.min.js') }}" type="text/javascript"></script>
@endsection  