@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">CREAR PARTICIPANTE</h2>
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
                     {!! Form::open(array('route' => array('participante.store'),
                     'method'=>'POST','id' => 'form_participante_id','enctype' =>'multipart/form-data')) !!}

                        {{ csrf_field() }}  
                    <div class="form-group ">
                        <div style="text-align:left;">
                            {!! Form::label('nombre',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('nombre',old('nombre'),['placeholder' => trans('message.users_action.nombre'),'class' => 'form-control','required' => 'required','id' => 'nombre_user']) !!}
                        </div>   
                        <div style="text-align:left;">
                          <label>RIF*</label>
                         <select  name="letra"  id="letra" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins">
                         <option value="SELECCIONE UNA OPCION">SELECCIONE UNA OPCION</option>
                         <option value="J">J</option>
                            <option value="V">V</option>
                         <option value="G">G</option>
                        </select>
                        </div>             
                        <div style="text-align:left;">
                            {!! Form::label('rif','RIF', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('rif',old('rif'),['placeholder' => 'RIF O CEDULA','class' => 'form-control','required' => 'required','id' => 'cedula_user']) !!}
                        </div>  
                       
                        <div style="text-align:left;">
                            {!! Form::label('telefono',trans('message.solicitud_action.telefono'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('telefono',old('telefono'),['placeholder' => trans('message.solicitud_action.telefono'),'class' => 'form-control','required' => 'required','id' => 'telefono_user']) !!}
                        </div>     
                        <div style="text-align:left;">
                            {!! Form::label('telefono2','TELEFONO2', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('telefono2',old('telefono2'),['placeholder' => 'TELEFONO2','class' => 'form-control','required' => 'required','id' => 'telefono2_user']) !!}
                        </div>   
                        <div style="text-align:left;">
                            {!! Form::label('email','CORREO', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::email('email',old('email'),['placeholder' => 'CORREO','class' => 'form-control','required' => 'required','id' => 'email_user']) !!}
                        </div>   
                        <div style="text-align:left;">
                            {!! Form::label('direccion','DIRECCION', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('direccion',old('direccion'),['placeholder' => 'DIRECCION','class' => 'form-control','required' => 'required','id' => 'telefono2_user']) !!}
                        </div>    
                        <div style="text-align:left;">
                          <label>SECTOR*</label>
                         <select required name="sector"  id="sector" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins">
                         <option value="SELECCIONE UNA OPCION">SELECCIONE UNA OPCION</option>
                         <option value="AGRICOLA">AGRICOLA</option>
                         <option value="COMERCIO">COMERCIO</option>
                        <option value="SALUD">SALUD</option>
                        <option value="SOCIAL">SOCIAL</option>
                        <option value="TECNOLOGIA">TECNOLOGIA</option>
                        </select>
                        </div>                      
                    </div>   
            
                        {!! Form::submit('PARTICIPANTE',['class'=> 'form-control btn btn-primary','PARTICIPANTE','data-toggle' => 'tooltip','style' => 'background-color:'.$array_color['group_button_color'].';']) !!}                     
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection
@section('script_datatable')
   
    
    <script type="text/javascript">


 
    </script>

<script src="{{ url ('/js_users/js_users.min.js') }}" type="text/javascript"></script>
@endsection  