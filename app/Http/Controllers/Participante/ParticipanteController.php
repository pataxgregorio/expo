<?php

namespace App\Http\Controllers\Participante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
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


class ParticipanteController extends Controller
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

    public function getParticipante(Request $request){
        try{
           
            if ($request->ajax()) {                
                $data =  (new Participante)-> total_participante();                
                return datatables()->of($data)
                          
                ->addColumn('edit', function ($data) {
                    $user = Auth::user();                    
                    if(($user->id != 1)){
                        $edit ='<a href="'.route('participante.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-primary disabled" style="background-color: #2962ff;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }else{
                        $edit ='<a href="'.route('participante.edit', $data->id).'" id="edit_'.$data->id.'" class="btn btn-xs btn-primary" style="background-color: #2962ff;"><b><i class="fa fa-pencil"></i>&nbsp;' .trans('message.botones.edit').'</b></a>';
                    }
                    return $edit;
                })
                ->addColumn('view', function ($data) {
                    return '<a style="background-color: #5333ed;" href="'.route('participante.view', $data->id).'" id="view_'.$data->id.'" class="btn btn-xs btn-primary"><b><i class="fa fa-eye"></i>&nbsp;' .trans('message.botones.view').'</b></a>';
                })
                
                ->rawColumns(['edit','view','del'])->toJson();  
            }
        }catch(Throwable $e){
            echo "Captured Throwable: " . $e->getMessage(), "\n";
        }        
    }

    public function profile(){
        $count_notification = (new User)->count_noficaciones_user();
        $user = Auth::user();
        $array_color = (new Colores)->getColores();
        return view('User.profile',compact('count_notification','user','array_color'));
    }
    
    public function participantesPrint() {
        // Generate some PDFs!
        $participantes = (new Participante)->total_participante();
        $participantesTotal = "";
        foreach ($participantes as $participante) {
            $participantes =<<<HTML
                <table>
                    <tr >
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                    </tr>
                    <tr>
                        <td>$participante->id</td>                    
                        <td>$participante->nombre</td>                    
                        <td>$participante->direccion</td>                    
                        <td>$participante->telefono</td> 
                    </tr>
                </table>
            HTML;
            $participantesTotal .= $participantes;
        }
        $html = 
        <<<HTML
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
                    text-align: center;
                }

                th {
                    text-align: center;
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
        
        <div>
            $participantesTotal
        </div>

        </body>
        </html>
        HTML;
        $dompdf = new DOMPDF();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('latter', 'portrait');
        $dompdf->render();
        $dompdf->stream("Tarsicio_Carrizales_Proyecto_Horus.pdf", array("Attachment"=>1));
    
        return redirect()->back();
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
    public function store(Request $request){
        $input = $request->all();
     $input['users_id'] = Auth::user()->id;
  //var_dump ($input['nombre']);
// exit();
    
        $solicitud = new Participante([
            'nombre' =>$input['nombre'],
            'letra' =>$input['letra'],
            'rif'=>$input['rif'],
            'telefono'=>$input['telefono'],
            'telefono2'=>$input['telefono2'],
            'direccion'=>$input['direccion'],
            'sector'=>$input['sector'],
            'email'=>$input['email'],
            'user_id' => $input['users_id'],
        ]);
        $solicitud->save();    
        $count_notification = (new User)->count_noficaciones_user();        
        $tipo_alert = "Create";
        $array_color = (new Colores)->getColores();
        return view('Participante.participante',compact('count_notification','tipo_alert','array_color'));
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
public function getComunas(Request $request){
  
    $comuna = (new Comuna)->datos_comuna( $request['parroquia']);
         
    return $comuna;

}

public function getComunidad(Request $request){
  
    $comunidad = (new Comunidad)->datos_comunidad( $request['comuna']);
         
    return $comunidad;

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