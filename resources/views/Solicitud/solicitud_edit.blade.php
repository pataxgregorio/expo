@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">EDITAR SOLICITUD</h2>
    @component('components.boton_back',['ruta' => route('solicitud.index'),'color' => $array_color['back_button_color']])
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
                {!! Form::open(array('route' => array('solicitud.update',$solicitud_edit->id),
                'method'=>'POST','id' => 'form_users_id','enctype' =>'multipart/form-data')) !!}
              

            
                <div class="form-group">
                    <div style="text-align:left;">
                            {!! Form::label('nombre',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('nombre',$solicitud_edit->nombre,['placeholder' => trans('message.solicitud_action.nombre'),'class' => 'form-control','id' => 'nombre_user']) !!}
                    </div>   
                    <div style="text-align:left;">
                            {!! Form::label('cedula',trans('message.solicitud_action.cedula'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('cedula',$solicitud_edit->cedula,['placeholder' => trans('message.solicitud_action.cedula'),'class' => 'form-control','id' => 'cedula_user']) !!}
                    </div>   
                    <div style="text-align:left;">
                            {!! Form::label('telefono',trans('message.solicitud_action.telefono'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('telefono',$solicitud_edit->telefono,['placeholder' => trans('message.solicitud_action.telefono'),'class' => 'form-control','id' => 'telefono_user']) !!}
                    </div>    
                    <div style="text-align:left;">
                            {!! Form::label('telefono2',trans('message.solicitud_action.telefono2'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::text('telefono2',$solicitud_edit->telefono2,['placeholder' => trans('message.solicitud_action.telefono2'),'class' => 'form-control','id' => 'telefono2_user']) !!}
                    </div>  
                    <div style="text-align:left;">
                            {!! Form::label('email',trans('message.users_action.email_user'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::email('email',$solicitud_edit->email,['placeholder' => trans('message.users_action.mail_ejemplo'),'class' => 'form-control','id' => 'email_user']) !!}
                     </div>   
                     <div style="text-align:left;">
                     {!! Form::label('estado_id',trans('message.solicitud_action.estado'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                    {!! Form::select('sexo_id',$sexo, $solicitud_edit->sexo, ['placeholder' => trans('message.solicitud_action.sexo'),'class' => 'form-control','id' => 'sexo_id']) !!}
                    </div> 
                         <div style="text-align:left;">
                         {!! Form::label('edocivil_id',trans('message.solicitud_action.edocivil'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('edocivil_id',$edocivil, $solicitud_edit->edocivil, ['placeholder' => trans('message.solicitud_action.edocivil'),'class' => 'form-control','id' => 'edocivil_id']) !!}
                        
                    </div>   
                    <div style="text-align:left;">
                    {!! Form::label('fechaNacimiento','FECHA DE NACIMIENTO', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::date('fechaNacimiento',$solicitud_edit->fechaNacimiento,['placeholder' => 'FECHA DE NACIMIENTO','class' => 'form-control','id' => 'fechaNacimiento_user']) !!}  
                    </div>  
                    <div style="text-align:left;">
                         {!! Form::label('nivelestudio','NIVEL EDUCATIVO', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('nivelestudio',$nivelestudio, $solicitud_edit->nivelestudio, ['placeholder' => 'NIVEL EDUCATIVO','class' => 'form-control','id' => 'nivelestudio_user']) !!}
                     </div>   
                     <div style="text-align:left;">
                        {!! Form::label('profesion','OCUPACION O/U OFICIO', ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('profesion',$profesion, $solicitud_edit->profesion, ['placeholder' => 'OCUPACION O/U OFICIO','class' => 'form-control','id' => 'profesion_user']) !!}
                </div>   
                <div style="text-align:left;">
                    {!! Form::label('estado_id',trans('message.solicitud_action.estado'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                    {!! Form::select('estado_id',$estado, $solicitud_edit->estado_id, ['placeholder' => trans('message.solicitud_action.estado'),'class' => 'form-control','id' => 'estado_id']) !!}
                </div> 
                        <div style="text-align:left;">
                            {!! Form::label('municipio_id',trans('message.solicitud_action.municipio'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('municipio_id',  $municipio,  $solicitud_edit->municipio_id, ['placeholder' => trans('message.solicitud_action.municipio'),'class' => 'form-control','id' => 'municipio_id']) !!}
                        </div>    
                        <div style="text-align:left;">
                            {!! Form::label('parroquia_id',trans('message.solicitud_action.parroquia'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('parroquia_id', $parroquia, $solicitud_edit->parroquia_id, ['placeholder' => trans('message.solicitud_action.parroquia'),'class' => 'form-control','id' => 'parroquia_id']) !!}
                        </div>   
                        <div style="text-align:left;">
                        {!! Form::label('comuna_id',trans('message.solicitud_action.comuna'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('comuna_id', $comuna, $solicitud_edit->comuna_id, ['placeholder' => trans('message.solicitud_action.comuna'),'class' => 'form-control','id' => 'comuna_id']) !!}
                        </div>  
                        <div style="text-align:left;">
                            {!! Form::label('comunidad_id',trans('message.solicitud_action.comunidad'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('comunidad_id', $comunidad, $solicitud_edit->comunidad_id, ['placeholder' => trans('message.solicitud_action.comunidad'),'class' => 'form-control','id' => 'comunidad_id']) !!}
                        </div>  
                        <div style="text-align:left;">
                            {!! Form::label('direccion',trans('message.solicitud_action.direccion'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('direccion',$solicitud_edit->direccion,['placeholder' => trans('message.solicitud_action.direccion'),'class' => 'form-control','id' => 'direccion_user']) !!}
                        </div>    
                        
                        <div style="text-align:left;">
                            {!! Form::label('tipo_solicitud_id',trans('message.solicitud_action.tipo_solicitud'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('tipo_solicitud_id', $tipo_solicitud,$solicitud_edit->tipo_solicitud_id, ['placeholder' => trans('message.solicitud_action.tipo_solicitud'),'class' => 'form-control','id' => 'tipo_solicitud_id']) !!}
                        </div>  
                        
                        <div id = "denunciado" >
                            <h3>Datos de Denuncia, Reclamo o Queja </h3>
                              <br>
                                <div style="text-align:left;">
                                   {!! Form::label('ceduladenunciado',trans('message.solicitud_action.ceduladenunciado'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                 {!! Form::text('ceduladenunciado',old('ceduladenunciado'),['placeholder' => trans('message.solicitud_action.ceduladenunciado'),'class' => 'form-control','id' => 'ceduladenunciado_user']) !!}
                                </div>    
                            <div style="text-align:left;">
                                {!! Form::label('nombredenunciado',trans('message.solicitud_action.nombredenunciado'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                 {!! Form::text('nombredenunciado',old('nombredenunciado'),['placeholder' => trans('message.solicitud_action.nombredenunciado'),'class' => 'form-control','id' => 'nombredenunciado_user']) !!}
                              </div>    
                             <div style="text-align:left;">
                                {!! Form::label('testigo',trans('message.solicitud_action.testigo'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                 {!! Form::text('testigo',old('testigo'),['placeholder' => trans('message.solicitud_action.testigo'),'class' => 'form-control','id' => 'testigo_user']) !!}
                                </div>    
                                <h3>Descripcion de Hechos </h3>
                               <br>
                      
                            <div style="text-align:left;">
                            {!! Form::label('relato',trans('message.solicitud_action.relato'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::text('relato',old('relato'),['placeholder' => trans('message.solicitud_action.relato'),'class' => 'form-control','id' => 'relato_user']) !!}
                             </div> 
                            <div style="text-align:left;">
                                 {!! Form::label('observacion',trans('message.solicitud_action.observacion'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                {!! Form::text('observacion',old('observacion'),['placeholder' => trans('message.solicitud_action.observacion'),'class' => 'form-control','id' => 'observacion_user']) !!}
                            </div>  
                             <div style="text-align:left;">
                                 <label>DENUNCIA PRESENTADA*</label>
                                 <select required name="presentada"  id="presentada" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="SELECCIONE UNA OPCION">SELECCIONE UNA OPCION</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                              </select>
                              </div>
                              <div style="text-align:left;">
                                 {!! Form::label('explique',trans('message.solicitud_action.explique'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                {!! Form::text('explique',old('observacion'),['placeholder' => trans('message.solicitud_action.explique'),'class' => 'form-control','id' => 'explique_user']) !!}
                            </div>  
                            <div style="text-align:left;">
                                 <label>COMPETENCIA*</label>
                                 <select required name="competencia"  id="competencia" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins">
                                <option value="SELECCIONE UNA OPCION">SELECCIONE UNA OPCION</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                              </select>
                              </div>
                              <div style="text-align:left;">
                                 {!! Form::label('explique2',trans('message.solicitud_action.explique'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                {!! Form::text('explique2',old('observacion'),['placeholder' => trans('message.solicitud_action.explique'),'class' => 'form-control','id' => 'explique_user']) !!}
                             </div> 
                            <h3>Recuados de la Solicitud</h3>
                            <br>
                            <div class ="col">
                            <div style="text-align:left;">
                                     <input  type="checkbox" id="checkcedula" name ="checkcedula" >
                                     <label class="form-check-label" for="defaultCheck1">Copia Cedula</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkmotivo" name ="checkmotivo">
                                     <label class="form-check-label" for="defaultCheck1">Exposicion de Motivo</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkvideo" name ="checkvideo">
                                     <label class="form-check-label" for="defaultCheck1">Video</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkfoto" name ="checkfoto">
                                     <label class="form-check-label" for="defaultCheck1">Fotos</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkgrabacion" name ="checkgrabacion">
                                     <label class="form-check-label" for="defaultCheck1">Grabacion</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checktestigo" name ="checktestigo">
                                     <label class="form-check-label" for="defaultCheck1">Cedula Testigo</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkresidencia" name ="checkresidencia">
                                     <label class="form-check-label" for="defaultCheck1">Carta Residencia</label>
                                 </div>
                            </div>
                     </div>  
                     <div id="sugerencia">
                            <h3>Sugerencia o Asesoria</h3>
                                <div style="text-align:left;">
                                 {!! Form::label('observacion2',trans('message.solicitud_action.observacion'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                {!! Form::text('observacion2',old('observacion'),['placeholder' => trans('message.solicitud_action.observacion'),'class' => 'form-control','id' => 'observacion_user']) !!}
                                 </div> 
                             <h3>Recuados de la Solicitud</h3>
                             <br>
                             <div style="text-align:left;">
                                     <input  type="checkbox" id="checkmotivo2" name ="checkmotivo2">
                                     <label class="form-check-label" for="defaultCheck1">Exposicion de Motivo</label>
                                 </div>
                        </div> 
                        <div id="beneficiario"> 
                                <h3>Peticion</h3>
                                     <div style="text-align:left;">
                                        {!! Form::label('nombrebeneficiario',trans('message.solicitud_action.nombrebeneficiario'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                         {!! Form::text('nombrebeneficiario',old('nombrebeneficiario'),['placeholder' => trans('message.solicitud_action.nombrebeneficiario'),'class' => 'form-control','id' => 'nombrebeneficiario_user']) !!}
                                     </div> 
                                     <div style="text-align:left;">
                                        {!! Form::label('cedulabeneficiario',trans('message.solicitud_action.cedulabeneficiario'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                         {!! Form::text('cedulabeneficiario',old('cedulabeneficiario'),['placeholder' => trans('message.solicitud_action.cedulabeneficiario'),'class' => 'form-control','id' => 'cedulabeneficiario_user']) !!}
                                     </div> 
                                     <div style="text-align:left;">
                                        {!! Form::label('direccionbeneficiario',trans('message.solicitud_action.direccionbeneficiario'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                                         {!! Form::text('direccionbeneficiario',old('direccionbeneficiario'),['placeholder' => trans('message.solicitud_action.direccionbeneficiario'),'class' => 'form-control','id' => 'direccionbeneficiario_user']) !!}
                                     </div> 
                                     <h3>Recuados de la Peticion</h3>
                                    <br>
                                    <div style="text-align:left;">
                                         <input  type="checkbox" id="checkcedula2" name ="checkcedula2">
                                         <label class="form-check-label" for="defaultCheck1">Copia Cedula</label>
                                    </div>
                                    <div style="text-align:left;">
                                     <input  type="checkbox" id="checkmotivo3" name ="checkmotivo3">
                                     <label class="form-check-label" for="defaultCheck1">Exposicion de Motivo</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkinforme" name ="checkcedula">
                                     <label class="form-check-label" for="defaultCheck1">Informe Medico</label>
                                 </div>
                                 <div style="text-align:left;">
                                     <input  type="checkbox" id="checkcedulabeneficiario" name ="checkcedula">
                                     <label class="form-check-label" for="defaultCheck1">Cedula Beneficiario</label>
                                 </div> 
                        </div>  
                    <div style="text-align:left;">
                        <label>ASIGNACION*</label>
                        <select required name="asignacion"  id="asignacion" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins">
                            <option value="SELECCIONE UNA OPCION">SELECCIONE UNA OPCION</option>
                            <option value="DIRECCION">DIRECCION</option>
                            <option value="ENTER">ENTER</option>
                        </select>
                    </div>   
                    <div id="direccion">  
                        <div style="text-align:left;">
                            {!! Form::label('direcciones_id',trans('message.solicitud_action.direcciones'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                             {!! Form::select('direcciones_id', $direcciones, old('direcciones_id'), ['placeholder' => trans('message.solicitud_action.direcciones'),'class' => 'form-control','id' => 'direcciones_id']) !!}
                         </div> 
                        <div style="text-align:left;">
                            {!! Form::label('coordinacion_id',trans('message.solicitud_action.coordinacion'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                            {!! Form::select('coordinacion_id', $coordinacion, old('coordinacion_id'), ['placeholder' => trans('message.solicitud_action.coordinacion'),'class' => 'form-control','id' => 'coordinacion_id']) !!}
                        </div> 
                    </div> 
                    <div id="enter">
                        <div style="text-align:left;">
                         {!! Form::label('enter_id',trans('message.solicitud_action.enter'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                         {!! Form::select('enter_id', $enter, old('enter_id'), ['placeholder' => trans('message.solicitud_action.enter'),'class' => 'form-control','id' => 'enter_id']) !!}
                         </div> 
                    </div>                   
                    <?php  
                    $variable =$solicitud_edit->tipo_solicitud_id;
                   if($variable == 1){
                    echo '<script>document.getElementById("sugerencia").style.display = "none";</script>';
                    echo '<script>document.getElementById("beneficiario").style.display = "none";</script>';
                         }
                    if($variable == 2){
                    echo '<script>document.getElementById("sugerencia").style.display = "none";</script>';
                    echo '<script>document.getElementById("beneficiario").style.display = "none";</script>';
                        }
                 if($variable == 3){
                    echo '<script>document.getElementById("sugerencia").style.display = "none";</script>';
                    echo '<script>document.getElementById("beneficiario").style.display = "none";</script>';
                     }
                if($variable == 4){
                    echo '<script>document.getElementById("denunciado").style.display = "none";</script>';
                    echo '<script>document.getElementById("beneficiario").style.display = "none";</script>';
                }
                if($variable == 5){
                    echo '<script>document.getElementById("denunciado").style.display = "none";</script>';
                    echo '<script>document.getElementById("beneficiario").style.display = "none";</script>';
                }
                if($variable == 6){
                    echo '<script>document.getElementById("sugerencia").style.display = "none";</script>';
                     echo '<script>document.getElementById("denunciado").style.display = "none";</script>';
                        }
                   ?>
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
        
    $(document).ready(function(){
        // $("#comuna_id").empty()
      //  $("#comuna_id").html('<option value="">COMUNA<option/>')

   // const comuna = $('#parroquia_id')
   
 //  $("#denunciado").hide();
   //$("#sugerencia").hide();
  // $("#beneficiario").hide();
   $("#enter").hide();
  $("#direccion").hide();
   $('#municipio_id').change(function(){
    $("#parroquia_id").prop('disabled', false);
   
   

   });
   $('#estado_id').change(function(){
    $("#municipio_id").prop('disabled', false);

   });
    $('#parroquia_id').change(function(){
        var parroquia= $('#parroquia_id').val();
        $("#comuna_id").prop('disabled', false);
        $.ajax({

            url:"{{ route('getComunas') }}",
            type:"GET",
            data:{parroquia:parroquia}

            }).done(function(data){
                // alert(JSON.stringify(data));
                
                $("#comuna_id").empty();
                $("#comuna_id").html('<option value="">COMUNA<option/>');
            for (let c in data){
               
                $("#comuna_id").append(`<option value="${c}">${data[c]}<option/>`);
            
            }
          //  $("#comuna_id").find("option[value='']").remove();
           // $("#comuna_id").change();
            
        })   
   
    });
    $('#asignacion').change(function(){

        var asignacion = $("#asignacion").val();
        if (asignacion =="DIRECCION"){
            $("#enter").hide();
            $("#direccion").show();

        }
        if (asignacion =="ENTER"){
            $("#enter").show();
            $("#direccion").hide();

        }
      }) 


    $('#comuna_id').change(function(){
        var comuna= $('#comuna_id').val();
        $("#comunidad_id").prop('disabled', false);
        $.ajax({

            url:"{{ route('getComunidad') }}",
            type:"GET",
            data:{comuna:comuna}

            }).done(function(data){
                // alert(JSON.stringify(data));
                
                $("#comunidad_id").empty();
              //  $("#comunidad_id").html('<option value="">COMUNA<option/>');
            for (let c in data){
               
                $("#comunidad_id").append(`<option value="${c}">${data[c]}<option/>`);
            
            }
          //  $("#comuna_id").find("option[value='']").remove();
           // $("#comuna_id").change();
            
        })   
   
    });

    $('#direcciones_id').change(function(){
        var direccion= $('#direcciones_id').val();
      
        $.ajax({

            url:"{{ route('getCoodinacion') }}",
            type:"GET",
            data:{direccion:direccion}

            }).done(function(data){
                // alert(JSON.stringify(data));
                
                $("#coordinacion_id").empty();
                $("#coordinacion_id").html('<option value="">COORDINACION<option/>');
            for (let c in data){
               
                $("#coordinacion_id").append(`<option value="${c}">${data[c]}<option/>`);
            
            }
          //  $("#comuna_id").find("option[value='']").remove();
           // $("#comuna_id").change();
            
        })   
   
    });


   $('#tipo_solicitud_id').change(function(){ 

        var tipo = $('#tipo_solicitud_id').val();
        alert(tipo);
        if (tipo == 0){
            $("#denunciado").hide();
            $("#sugerencia").hide();
            $("#beneficiario").hide();
        }

        if (tipo == 1){
            $("#denunciado").show();
            $("#sugerencia").hide();
            $("#beneficiario").hide();
        }

        if (tipo == 2){
            $("#denunciado").show();
            $("#sugerencia").hide();
            $("#beneficiario").hide();
        }
        if (tipo == 3){
            $("#denunciado").show();
            $("#sugerencia").hide();
            $("#beneficiario").hide();
        }
        if (tipo == 4){
            $("#denunciado").hide();
            $("#sugerencia").show();
            $("#beneficiario").hide();
        }
        if (tipo == 5){
            $("#denunciado").hide();
            $("#sugerencia").show();
            $("#beneficiario").hide();
        }
        if (tipo == 6){
            $("#denunciado").hide();
            $("#sugerencia").hide();
            $("#beneficiario").show();
        }
       
    });
  })
</script>
@endsection  