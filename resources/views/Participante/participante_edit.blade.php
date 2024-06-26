@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">EDITAR PARTICIPANTE</h2>
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
                             {!! Form::text('nombre',$participante_edit->nombre,['placeholder' => trans('message.solicitud_action.nombre'),'class' => 'form-control','id' => 'nombre_user']) !!}
                        </div>  
                        <div style="text-align:left;">
                         {!! Form::label('letra','RIF', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('letra',$letra, $participante_edit->letra, ['placeholder' => 'RIF','class' => 'form-control','id' => 'edocivil_id']) !!}
                        
                        </div>    
                        <div style="text-align:left;">
                            {!! Form::label('rif',trans('message.solicitud_action.cedula'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('rif',$participante_edit->rif,['placeholder' => trans('message.solicitud_action.cedula'),'class' => 'form-control','id' => 'cedula_user']) !!}
                         </div>   
                        <div style="text-align:left;">
                            {!! Form::label('telefono',trans('message.solicitud_action.telefono'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('telefono',$participante_edit->telefono,['placeholder' => trans('message.solicitud_action.telefono'),'class' => 'form-control','id' => 'telefono_user']) !!}
                         </div>    
                         <div style="text-align:left;">
                            {!! Form::label('telefono2',trans('message.solicitud_action.telefono2'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('telefono2',$participante_edit->telefono2,['placeholder' => trans('message.solicitud_action.telefono2'),'class' => 'form-control','id' => 'telefono2_user']) !!}
                         </div>  
                         <div style="text-align:left;">
                            {!! Form::label('email','CORREO', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::email('email',$participante_edit->email,['placeholder' => 'CORREO','class' => 'form-control','id' => 'email_user']) !!}
                         </div>  
                         <div style="text-align:left;">
                            {!! Form::label('direccion','DIRECCION', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('direccion',$participante_edit->direccion,['placeholder' => trans('message.users_action.mail_ejemplo'),'class' => 'form-control','id' => 'email_user']) !!}
                             </div>   
                        <div style="text-align:left;">
                         {!! Form::label('sector','SECTOR', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('sector',$sector, $participante_edit->sector, ['placeholder' => 'SECTOR','class' => 'form-control','id' => 'edocivil_id']) !!}
                        
                        </div>    
                        <br>
                        <br>
                {!! Form::submit('ACTUALIZAR',['class'=> 'form-control btn btn-primary','title' => 'ACTUALIZAR','data-toggle' => 'tooltip','style' => 'background-color:'.$array_color['group_button_color'].';']) !!}                     
                <input type="hidden" name="id_participante" value="{{$participante_edit->id}}">
                {!!  Form::close() !!}       
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