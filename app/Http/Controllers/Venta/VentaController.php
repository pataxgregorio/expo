<?php

namespace App\Http\Controllers\Venta;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Models\Ventas\Venta;
use App\Models\Stand\Stand;
use App\Models\Participante\Participante;
use App\Http\Requests\User\StoreUser;
use App\Http\Requests\User\UpdateUser;
use App\Models\Security\Rol;
use App\Models\Estados\Estados;
use App\Models\Municipio\Municipio;
use App\Models\Parroquia\Parroquia;
use App\Models\Comuna\Comuna;
use App\Models\Comunidad\Comunidad;
use App\Models\Direccion\Direccion;
use App\Models\Enter\Enter;
use App\Models\Coordinacion\Coordinacion;
use App\Models\Tipo_Solicitud\Tipo_Solicitud;
use Auth;
use Dompdf\Dompdf;
use App\Notifications\WelcomeUser;
use App\Notifications\RegisterConfirm;
use App\Notifications\NotificarEventos;
use Carbon\Carbon;
use App\Http\Controllers\User\Colores;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Tarsicio Carrizales telecom.com.ve@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index(){        
        $count_notification = (new User)->count_noficaciones_user();
        $tipo_alert = "";
        if(session('delete') == true){
            $tipo_alert = "Delete";
            session(['delete' => false]);
        }        
        if(session('update') == true ){
            $tipo_alert = "Update";
            session(['update' => false]);
        }        
        $array_color = (new Colores)->getColores();
        return view('Participante.participante',compact('count_notification','tipo_alert','array_color'));
    }

    public function getVentas(Request $request) {
        try {
          if ($request->ajax()) {
            $data = (new Venta)->obtenerVenta($request["status"]);
            $recordTotal = count($data);
      
            // Implement pagination logic here if needed
            // Based on request parameters like 'start' and 'length'
            // ...
      
            $draw = $request->input('draw');
      
            return response()->json([
              'data' => $data, // Assuming no filtering needed
              'recordfilter' => $request->input('recordfilter'),
              'recordtotal' => $recordTotal,
              'draw' => $draw,
            ]);
          }
        } catch (Throwable $e) {
          return response()->json(['error' => 'Captured Throwable: ' . $e->getMessage()]);
        }
      } 

    public function getStand(Request $request){
        try {
            if ($request->ajax()) {
                $data = (new Venta)->obtenerVenta($request["status"]);
    
                // Assuming 'recordfilter' is a boolean value for filtering logic
                $filteredData = $data; // Replace with your filtering logic based on $request
    
                $recordTotal = count($data); // Assuming 'data' is an array of records
    
                return response()->json([
                    'data' => $filteredData,
                    'recordfilter' => isset($request['recordfilter']) ? $request['recordfilter'] : false,
                    'recordtotal' => $recordTotal,
                ]);
            }
        } catch (Throwable $e) {
            return response()->json(['error' => 'Captured Throwable: ' . $e->getMessage()]);
        }
    }

    public function getVenta(Request $request){
            $usuario_id=auth()->user()->id;
            $resultado = (new Venta)->obtenerVenta($request['status']);
            $count_notification = (new User)->count_noficaciones_user();        
            $tipo_alert = "Create";
            $array_color = (new Colores)->getColores();
            $user_total_activos = (new User)->userTotalActivo();
            $total_roles = (new User)->totalRoles();
            return view('Venta.venta_report', compact('resultado', 'count_notification','tipo_alert','array_color','user_total_activos','total_roles'));
        }

    public function profile(){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $array_color = (new Colores)->getColores();
        return view('User.profile',compact('count_notification','user','array_color'));
    }
    
    public function usersPrint($participante,$venta,$stand){


        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
        $cwd = getcwd();
      //  var_dump($cwd);
     //   exit();
        $html = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Invoice</title>
            <style>
                body {
                    font-family: sans-serif;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                th {
                    text-align: left;
                    background-color: #f0f0f0;
                }
            </style>
        </head>
        <body>
        
        <h3 style="text-align:left;">Alcadia Municipal de Paez</h3>
        <h5 style="text-align:left;">RIF G-200027304</h5>
        <h5 style="text-align:left;">EMAIL:alpaezinnovaciondigital@gmail.com</h5>
        <h5 style="text-align:left;">Direccion: Av 31 con calle 32 sector Centro</h5>
        <table class="table table-bordered" border="0">
                <tr >
                    <th class="text-primary" style="text-align:center;" >ID</th>
                    <th style="text-align:center;">Participante</th>
                    <th style="text-align:center;">Stand</th>
                    <th style="text-align:center;">SUB-Total</th>
                </tr>
                    <tr>
                        <td style="text-align:center;">$venta->id</td>
                        <td style="text-align:center;">$participante->nombre</td>
                        <td style="text-align:center;">$stand->nombre</td>
                        <td style="text-align:center;">$venta->montocancelado</td>                        
                    </tr>
                <tr>
                    <td colspan="3">Subtotal</td>
                    <td style="text-align:center;">$venta->montocancelado</td>
                </tr>
                
                <tr>
                    <td colspan="3">Total</td>
                    <td style="text-align:center;">$venta->montocancelado</td>
                </tr>
            </table>
                <h3 style="text-align:center;">Observacion</h3>
                <textarea name="" id="" cols="30" rows="10">$venta->observacion</textarea>
        </body>
        </html>
   HTML;
        $dompdf->loadHtml($html);
        $dompdf->setPaper('latter', 'portrait');
        $dompdf->render();
        $dompdf->stream("Tarsicio_Carrizales_Proyecto_Horus.pdf", array("Attachment"=>1));        
        return redirect()->back();
     /*  $vista = view('Venta.factura', compact('participante'));

        // Generar el PDF utilizando DOMPDF
        
        $pdf = PDF::loadView($vista);
    
        // Descargar el PDF
        return $pdf->download('factura.pdf');*/
       
    }    

    public function update_avatar(Request $request, $id){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $user_Update = User::find($id);
        $avatar_viejo = $user_Update->avatar; 
        $this->update_image($request,$avatar_viejo,$user_Update);
        $user_Update->updated_at = \Carbon\Carbon::now();
        $user_Update->save();
        session(['update' => true]);        
        return redirect('/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $titulo_modulo = trans('message.users_action.new_user');
        $count_notification = (new User)->count_noficaciones_user();
        $roles = (new Rol)->datos_roles();
     
        $array_color = (new Colores)->getColores();
       
        return view('Participante.participante_create',compact('count_notification','titulo_modulo','roles','array_color'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imprimir(Request $request){
        $input = $request->all();
        $participante = Participante::find( $input['participante_id']);
        $venta = Venta::find( $input['id']);
        $stand = Stand::find( $input['stand_id']);
        // var_dump($participante);
        // exit();

       $this->usersPrint($participante,$venta,$stand);
    } 
    public function store(Request $request){
        $input = $request->all();
        $negociacion =isset($input['negociacion']) ?$input['negociacion']:'off';
   $input['users_id'] = Auth::user()->id;
 //var_dump ($input);
// exit();
  $count_notification = (new User)->count_noficaciones_user();        
  $tipo_alert = "Create";
  $array_color = (new Colores)->getColores();
  $user_total_activos = (new User)->userTotalActivo();
  $total_roles = (new User)->totalRoles();
  $raiz =1;        
  $total_stand = (new Stand)->total_stand1(); 
  $cantidad_pagado = (new Stand)->total_pagado5(); 
  $cantidad_reservado = (new Stand)->total_reservado5(); 
  $cantidad_disponible = (new Stand)->total_disponible5();

  if ($input['montocancelado']<=$input['costo']){
    // se actualiza el status de la solicitud
    $venta = new Venta([
        'user_id' =>$input['users_id'],
        'participante_id' => $input['participante'],
        'stand_id' => $input['stand_id'],                        
        'montocancelado' => $input['montocancelado'],
        'observacion' => $input['observacion'],
        'negociacion'=> $negociacion,
        'fecha'  => \Carbon\Carbon::now(),
             ]);
         if ($negociacion=='off'){

        
             if ($input['montocancelado']<=$input['costo']){
                $valor ='RESERVADO';
              }  
              if ($input['montocancelado']==$input['costo']){
                $valor ='PAGADO';
              }  
            } 
            if ($negociacion=='on'){
               
                   $valor ='PAGADO';
               }     
    $venta->save(); 
    $stand_Update = Stand::find( $input['stand_id']);
    $stand_Update['status'] = $valor;
    $stand_Update->save();
   
       // $this->usersPrint();
        return view('adminlte::home',compact('count_notification','user_total_activos','total_stand',
        'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));
 }
       
 if ($input['montocancelado']>$input['costo']){
    if ($negociacion=='on'){
         $venta = new Venta([
        'user_id' =>$input['users_id'],
        'participante_id' => $input['participante'],
        'stand_id' => $input['stand_id'],                        
        'montocancelado' => $input['montocancelado'],
        'observacion' => $input['observacion'],
        'negociacion'=> $negociacion,
        'fecha'  => \Carbon\Carbon::now(),
             ]);
         if ($negociacion=='off'){

        
             if ($input['montocancelado']<=$input['costo']){
                $valor ='RESERVADO';
              }  
              if ($input['montocancelado']==$input['costo']){
                $valor ='PAGADO';
              }  
            } 
            if ($negociacion=='on'){
               
                   $valor ='PAGADO';
               }     
    $venta->save(); 

        $valor ='PAGADO';
        $stand_Update = Stand::find( $input['stand_id']);
        $stand_Update['status'] = $valor;
        $stand_Update->save();
        $total_stand = (new Stand)->total_stand1(); 
            $cantidad_pagado = (new Stand)->total_pagado5(); 
            $cantidad_reservado = (new Stand)->total_reservado5(); 
            $cantidad_disponible = (new Stand)->total_disponible5(); 
            return view('adminlte::home',compact('count_notification','user_total_activos','total_stand',
            'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));
     }
     if ($negociacion=='off'){
        return view('adminlte::home',compact('count_notification','user_total_activos','total_stand',
            'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));
       }
    }     
     
    }        
    public function store2(Request $request){
        

        $input = $request->all();
   $input['user_id'] = Auth::user()->id;
   $id =$input['id'];
   $negociacion =isset($input['negociacion']) ?$input['negociacion']:'off';
   $input['fecha'] =\Carbon\Carbon::now();

//var_dump ($input);
//exit();
  $count_notification = (new User)->count_noficaciones_user();        
  $tipo_alert = "Create";
  $array_color = (new Colores)->getColores();
  $user_total_activos = (new User)->userTotalActivo();
  $total_roles = (new User)->totalRoles();
  $raiz =1;        

  if ($input['montocancelado']<$input['costo']){
    unset($input['costo']);
    $venta_Update = Venta::find( $id);
    $venta_Update->update($input);
    $stand_Update = Stand::find( $input['stand_id']);
    $stand_Update['status'] = $negociacion == 'on'?'PAGADO':'RESERVADO';
    $stand_Update->save();
    $total_stand = (new Stand)->total_stand1(); 
    $cantidad_pagado = (new Stand)->total_pagado5();
    $cantidad_reservado = (new Stand)->total_reservado5(); 
    $cantidad_disponible = (new Stand)->total_disponible5(); 
    return view('adminlte::home',compact('count_notification','user_total_activos','total_stand',
    'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));
 }
 if ($input['montocancelado']==$input['costo']){
   unset($input['costo']);
    $venta_Update = Venta::find( $id);
    $venta_Update->update($input);
    $stand_Update = Stand::find( $input['stand_id']);
    $stand_Update['status'] = 'PAGADO';
    $stand_Update->save();

    $venta_Update = Venta::find( $id);
    $venta_Update->update($input);
    $total_stand = (new Stand)->total_stand1(); 
    $cantidad_pagado = (new Stand)->total_pagado5();
    $cantidad_reservado = (new Stand)->total_reservado5();
    $cantidad_disponible = (new Stand)->total_disponible5(); 
    return view('adminlte::home',compact('count_notification','user_total_activos','total_stand',
    'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));
 }   
 if ($input['montocancelado']>$input['costo']){
    // se actualiza el status de la solicitud
    if ($negociacion=='on'){
        $venta_Update = Venta::find( $id);
        $venta_Update->update($input);       
        $valor ='PAGADO';
        $stand_Update = Stand::find( $input['stand_id']);
        $stand_Update['status'] = $valor;
        $stand_Update->save();
        $total_stand = (new Stand)->total_stand1(); 
            $cantidad_pagado = (new Stand)->total_pagado5(); 
            $cantidad_reservado = (new Stand)->total_reservado5(); 
            $cantidad_disponible = (new Stand)->total_disponible5(); 
            return view('adminlte::home',compact('count_notification','user_total_activos','total_stand',
            'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));
     }
     if ($negociacion=='off'){
        return view('adminlte::home',compact('count_notification','tipo_alert','array_color'));
       }
 }    
    }        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id){

        $participante_edit = Participante::find($id);
        $valores = $participante_edit->all();
        $titulo_modulo = trans('message.users_action.edit_user');
        $count_notification = (new User)->count_noficaciones_user();
        $array_color = (new Colores)->getColores();
      
        $array_color = (new Colores)->getColores();
    
        $letra =  array('V'=>'V','J'=>'J','G'=>'G'); 
        $sector=  array('AGRICOLA'=>'AGRICOLA','COMERCIO'=>'COMERCIO','SALUD'=>'SALUD','SOCIAL'=>'SOCIAL','TECNOLOGIA'=>'TECNOLOGIA');
        return view('Participante.show',compact('count_notification','titulo_modulo','participante_edit','letra','sector','array_color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $participante_edit = Participante::find($id);
        $valores = $participante_edit->all();
        $titulo_modulo = trans('message.users_action.edit_user');
        $count_notification = (new User)->count_noficaciones_user();
        $array_color = (new Colores)->getColores();
      
        $array_color = (new Colores)->getColores();
    
        $letra =  array('V'=>'V','J'=>'J','G'=>'G'); 
        $sector=  array('AGRICOLA'=>'AGRICOLA','COMERCIO'=>'COMERCIO','SALUD'=>'SALUD','SOCIAL'=>'SOCIAL','TECNOLOGIA'=>'TECNOLOGIA');
        return view('Participante.participante_edit',compact('count_notification','titulo_modulo','participante_edit','letra','sector','array_color'));
    }
public function getComunas2(Request $request){
  
    var_dump($request->all());
    exit();
    $comuna = (new Comuna)->datos_comuna( $request['parroquia']);
         
    return $comuna;

}

public function getComunidad(Request $request){
  
    $comunidad = (new Comunidad)->datos_comunidad( $request['comuna']);
         
    return $comunidad;

}
public function pago(Request $request){
    $input=$request->all();
    $id = $request['id'];
    $titulo_modulo = trans('message.users_action.new_user');
    $count_notification = (new User)->count_noficaciones_user();
    $roles = (new Rol)->datos_roles();
    $stand =  Stand::find( $id);
    $array_color = (new Colores)->getColores();
    $participante = (new Participante)->total_participante2();
   // $participante = $participante->all();
   //var_dump($participante);
   //exit();
  return view('Venta.venta_create',compact('count_notification','titulo_modulo','stand','participante','array_color'));

}
public function abonado(Request $request){
    $input=$request->all();
    $id = $request['id'];
    $titulo_modulo = trans('message.users_action.new_user');
    $count_notification = (new User)->count_noficaciones_user();
    $roles = (new Rol)->datos_roles();
    $stand =  Stand::find( $id);
    $participante2 =(new Venta)->obtenerparticipante($id);
    $array_color = (new Colores)->getColores();
    $participante = (new Participante)->total_participante2();
    foreach ($participante2 as $participante3) 
   $participante2 = $participante3;
  //var_dump($participante2);
  //exit();
  return view('Venta.venta_edit',compact('count_notification','titulo_modulo','participante2','stand','participante','array_color'));

}
public function abonado2(Request $request){
   
    $input=$request->all();
    $id = $request['id'];
    $titulo_modulo = trans('message.users_action.new_user');
    $count_notification = (new User)->count_noficaciones_user();
    $roles = (new Rol)->datos_roles();
    $stand =  Stand::find( $id);
    $participante2 =(new Venta)->obtenerparticipante($id);
    $array_color = (new Colores)->getColores();
    $participante = (new Participante)->total_participante2();
    foreach ($participante2 as $participante3) 
   $participante2 = $participante3;
 
  return view('Venta.venta_edit2',compact('count_notification','titulo_modulo','participante2','stand','participante','array_color'));

}

public function getCoodinacion(Request $request){
  
    $coordinacion = (new Coordinacion)->datos_coordinacion( $request['direccion']);
         
    return $coordinacion;

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){     
       
       // $count_notification = (new User)->count_noficaciones_user();
      $input = $request->all();
    //  var_dump($input);
   //   exit();
    
    $solicitud_Update = Participante::find( $id);
    $solicitud_Update->update($input);
     
        return redirect('/participante');
    }

    private function update_image($request,$avatar_viejo,&$user_Update){
        /** Se actualizan todos los datos solicitados por el Cliente 
        *  y eliminamos del Storage/avatars, el archivo indicado.
        */
        if($request->hasFile('avatar')){
            $esta = file_exists(public_path('/storage/avatars/'.$avatar_viejo));            
            if($avatar_viejo != 'default.jpg' && $esta){                
                unlink(public_path('/storage/avatars/'.$avatar_viejo));               
            }  
            $avatar = $request->file('avatar');          
            $filename = time() . '.' . $avatar->getClientOriginalExtension();            
            \Image::make($avatar)->resize(300, 300)
            ->save( public_path('/storage/avatars/' . $filename ) );            
            $user_Update->avatar = $filename;                
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){        
        $user_delete = User::find($id);
        $nombre = $user_delete->name;
        User::destroy($id);
        $esta = file_exists(public_path('/storage/avatars/'.$user_delete->avatar));            
        if($user_delete->avatar != 'default.jpg' && $esta){                            
            unlink(public_path('/storage/avatars/'.$user_delete->avatar));
        }  
        session(['delete' => true]);
        return redirect('/users');
    }

    public function usuarioRol(Request $request){
      if($request->ajax()){
        $countUserRol = (new User)->count_User_Rol();        
        return response()->json($countUserRol);
      }
    }

    public function notificationsUser(Request $request){
      if($request->ajax()){
        $countNotificationsUsers = (new User)->count_User_notifications();        
        return response()->json($countNotificationsUsers);
      }
    }
    public function solicitudTipo(Request $request){
        if($request->ajax()){
          $countSolicitud = (new Solicitud)->count_solictud();     
          
          return response()->json($countSolicitud);
        }
      }
      public function solicitudTotalTipo(Request $request){
        if($request->ajax()){
          $countTotalSolicitud = (new Solicitud)->count_total_solictud();     
          
          return response()->json($countTotalSolicitud);
        }
      }
    public function colorView(){
        $titulo_modulo = trans('message.users_action.cambiar_colores');
        $count_notification = (new User)->count_noficaciones_user();
        $array_color = (new Colores)->getColores();
        return view('User.color_view',compact('count_notification','titulo_modulo','array_color'));
    }

    public function colorChange(Request $request){
        $id = auth()->user()->id;            
        $user = User::find($id);            
        $colores = $user->colores;            
        if($request->dafault_color_01 == 'NO'){            
            $colores['encabezado'] = $request->encabezado_user;
            $colores['menu'] = $request->menu_user;
            $colores['group_button'] = $request->group_button;
            $colores['back_button'] = $request->back_button;                        
            $user->colores = $colores;            
            $user->save();
            session(['menu_color' => $request->menu_user]);
            session(['encabezado_color' => $request->encabezado_user]);
            session(['group_button_color' => $request->group_button]);
            session(['back_button_color' => $request->back_button]);            
        }elseif($request->dafault_color_01 == 'YES'){
            $colores['encabezado'] = '#5333ed';
            $colores['menu'] = '#0B0E66';
            $colores['group_button'] = '#5333ed';
            $colores['back_button'] = '#5333ed';                        
            $user->colores = $colores;            
            $user->save();
            session(['menu_color' => '#0B0E66']);
            session(['encabezado_color' => '#5333ed']);
            session(['group_button_color' => '#5333ed']);
            session(['back_button_color' => '#5333ed']);
        }elseif($request->dafault_color_01 == 'BLUE'){
            $colores['encabezado'] = '#81898f';
            $colores['menu'] = '#3e5f8a';
            $colores['group_button'] = '#474b4e';
            $colores['back_button'] = '#474b4e';                        
            $user->colores = $colores;            
            $user->save();
            session(['menu_color' => '#3e5f8a']);
            session(['encabezado_color' => '#81898f']);
            session(['group_button_color' => '#474b4e']);
            session(['back_button_color' => '#474b4e']);
        }elseif($request->dafault_color_01 == 'GREEN'){
            $colores['encabezado'] = '#0b9a93';
            $colores['menu'] = '#198c86';
            $colores['group_button'] = '#008080';
            $colores['back_button'] = '#008080';                        
            $user->colores = $colores;            
            $user->save();
            session(['menu_color' => '#198c86']);
            session(['encabezado_color' => '#0b9a93']);
            session(['group_button_color' => '#008080']);
            session(['back_button_color' => '#008080']);
        }else{
            $colores['encabezado'] = '#000000';
            $colores['menu'] = '#000000';
            $colores['group_button'] = '#000000';
            $colores['back_button'] = '#000000';                        
            $user->colores = $colores;            
            $user->save();
            session(['menu_color' => '#000000']);
            session(['encabezado_color' => '#000000']);
            session(['group_button_color' => '#000000']);
            session(['back_button_color' => '#000000']);
        }    
        return redirect('/dashboard');    
    }

}