<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\User\Colores;
use App\Models\Stand\Stand;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $confirmation_code = auth()->user()->confirmation_code;
        $confirmed_at = auth()->user()->confirmed_at;
        session(['menu_color' => auth()->user()->colores['menu']]);
        session(['encabezado_color' => auth()->user()->colores['encabezado']]);
        session(['group_button_color' => auth()->user()->colores['group_button']]);
        session(['back_button_color' => auth()->user()->colores['back_button']]);
        session(['process_button_color' => auth()->user()->colores['process_button']]);
        session(['create_button_color' => auth()->user()->colores['create_button']]);
        session(['update_button_color' => auth()->user()->colores['update_button']]);
        session(['edit_button_color' => auth()->user()->colores['edit_button']]);
        session(['view_button_color' => auth()->user()->colores['view_button']]);
        if(is_null($confirmation_code) && isset($confirmed_at)){
            return redirect('/dashboard');
        }else{
            auth()->logout();
            return redirect('/check_your_mail');
        }
    }

    /**
    * Realizado por @author Tarsicio Carrizales
    */
    public function dashboard(){

        $count_notification = (new User)->count_noficaciones_user();
        $user_total_activos = (new User)->userTotalActivo();
        $total_roles = (new User)->totalRoles();
        $user_total_Deny = (new User)->userTotalDeny();
        $array_color = (new Colores)->getColores();
        $total_stand = (new Stand)->total_stand1();
        $cantidad_pagado = intval((new Stand)->total_pagado5());
        $cantidad_reservado = intval((new Stand)->total_reservado5());
        $cantidad_disponible = intval((new Stand)->total_disponible5());
        $cantidad_full = (new Stand)->totalesfull();

        $raiz =1;
        return view('adminlte::home',compact('count_notification','user_total_activos','cantidad_full','total_stand',
                                              'total_roles','cantidad_pagado','cantidad_reservado','raiz','cantidad_disponible','array_color'));

}
    public function dashboard1(){

            $count_notification = (new User)->count_noficaciones_user();
            $user_total_activos = (new User)->userTotalActivo();
            $total_roles = (new User)->totalRoles();
            $user_total_Deny = (new User)->userTotalDeny();
            $array_color = (new Colores)->getColores();
            $total_stand = (new Stand)->total_stand1();
            $cantidad_pagado = (new Stand)->total_pagado();
            $cantidad_reservado = (new Stand)->total_reservado();
            $cantidad_disponible = (new Stand)->total_disponible();
            $fila1 ="A";
            $fila2 ="B";
            $raiz =0;
            $nombre = 'LANCERO';
        $cantidad_full = (new Stand)->totalesfull();

            return view('adminlte::home',compact('count_notification','user_total_activos','total_stand','cantidad_full',
                                                  'total_roles','cantidad_pagado','raiz','cantidad_reservado','cantidad_disponible','fila1','fila2','array_color','nombre'));

    }
    public function dashboard2(){

        $count_notification = (new User)->count_noficaciones_user();
        $user_total_activos = (new User)->userTotalActivo();
        $total_roles = (new User)->totalRoles();
        $user_total_Deny = (new User)->userTotalDeny();
        $array_color = (new Colores)->getColores();
        $total_stand = (new Stand)->total_stand2();
        $cantidad_pagado = (new Stand)->total_pagado2();
        $cantidad_reservado = (new Stand)->total_reservado2();
        $cantidad_disponible = (new Stand)->total_disponible2();
        $raiz =0;
        $fila1 ="C";
        $fila2 ="D";
        $nombre = 'CENTAURO';
        $cantidad_full = (new Stand)->totalesfull();

        return view('adminlte::home',compact('count_notification','cantidad_pagado','raiz','cantidad_reservado','fila1','fila2','cantidad_full','cantidad_disponible','user_total_activos','total_stand',
        'total_roles','array_color','nombre'));


    }
    public function dashboard3(){

        $count_notification = (new User)->count_noficaciones_user();
        $user_total_activos = (new User)->userTotalActivo();
        $total_roles = (new User)->totalRoles();
        $user_total_Deny = (new User)->userTotalDeny();
        $array_color = (new Colores)->getColores();
        $total_stand = (new Stand)->total_stand3();
        $cantidad_pagado = (new Stand)->total_pagado3();
        $cantidad_reservado = (new Stand)->total_reservado3();
        $cantidad_disponible = (new Stand)->total_disponible3();
        $raiz =0;
        $fila1 ="E";
        $fila2 ="F";
        $nombre = 'COLEADORES';
        $cantidad_full = (new Stand)->totalesfull();

        return view('adminlte::home',compact('count_notification','cantidad_pagado','fila1','fila2','raiz','cantidad_reservado','cantidad_full','cantidad_disponible','user_total_activos','total_stand',
        'total_roles','array_color','nombre'));

} public function dashboard4(){

    $count_notification = (new User)->count_noficaciones_user();
    $user_total_activos = (new User)->userTotalActivo();
    $total_roles = (new User)->totalRoles();
    $user_total_Deny = (new User)->userTotalDeny();
    $array_color = (new Colores)->getColores();
    $total_stand = (new Stand)->total_stand4();
    $cantidad_pagado = (new Stand)->total_pagado4();
    $cantidad_reservado = (new Stand)->total_reservado4();
    $cantidad_disponible = (new Stand)->total_disponible4();
    $raiz =0;
    $fila1 ="G";
    $fila2 ="H";
    $nombre = 'GENERAL EN JEFE';
    $cantidad_full = (new Stand)->totalesfull();

    return view('adminlte::home',compact('count_notification','cantidad_pagado','fila1','fila2','raiz','cantidad_reservado','cantidad_disponible','cantidad_full','user_total_activos','total_stand',
    'total_roles','array_color','nombre'));

}
public function dashboard8(){

    $count_notification = (new User)->count_noficaciones_user();
    $user_total_activos = (new User)->userTotalActivo();
    $total_roles = (new User)->totalRoles();
    $user_total_Deny = (new User)->userTotalDeny();
    $array_color = (new Colores)->getColores();
    $total_stand = (new Stand)->total_stand10();
    $cantidad_pagado = (new Stand)->total_pagado10();
    $cantidad_reservado = (new Stand)->total_reservado10();
    $cantidad_disponible = (new Stand)->total_disponible10();
    $raiz =0;
    $fila1 ="I";
    $fila2 ="J";
    $nombre = 'ESPIGA';
    $cantidad_full = (new Stand)->totalesfull();

    return view('adminlte::home',compact('count_notification','cantidad_pagado','fila1','fila2','raiz','cantidad_reservado','cantidad_full','cantidad_disponible','user_total_activos','total_stand',
    'total_roles','array_color','nombre'));

}
public function dashboard9(){

    $count_notification = (new User)->count_noficaciones_user();
    $user_total_activos = (new User)->userTotalActivo();
    $total_roles = (new User)->totalRoles();
    $user_total_Deny = (new User)->userTotalDeny();
    $array_color = (new Colores)->getColores();
    $total_stand = (new Stand)->total_stand11();
    $cantidad_pagado = (new Stand)->total_pagado11();
    $cantidad_reservado = (new Stand)->total_reservado11();
    $cantidad_disponible = (new Stand)->total_disponible11();
    $raiz =0;
    $fila1 ="K";
    $fila2 ="L";
    $nombre = 'CATIRE PAEZ';
    $cantidad_full = (new Stand)->totalesfull();

    return view('adminlte::home',compact('count_notification','cantidad_pagado','fila1','fila2','raiz','cantidad_reservado','cantidad_full','cantidad_disponible','user_total_activos','total_stand',
    'total_roles','array_color','nombre'));

}

public function dashboard5(Request $request){

    $valornumero = $request['numero'];
    $count_notification = (new User)->count_noficaciones_user();
    $user_total_activos = (new User)->userTotalActivo();
    $total_roles = (new User)->totalRoles();
    $user_total_Deny = (new User)->userTotalDeny();
    $array_color = (new Colores)->getColores();
    $total_stand = (new Stand)->total_stand5($valornumero);
    $cantidad_pagado = (new Stand)->total_pagado6($valornumero);
    $cantidad_reservado = (new Stand)->total_reservado6($valornumero);
    $cantidad_disponible = (new Stand)->total_disponible6($valornumero);
    $raiz =3;
    $cantidad_full = (new Stand)->totalesfull();

    return view('adminlte::home',compact('count_notification','cantidad_pagado','valornumero','raiz','cantidad_reservado','cantidad_full','cantidad_disponible','user_total_activos','total_stand',
    'total_roles','array_color'));

}  public function dashboard6(Request $request){

    $valornumero = $request['numero'];
    $count_notification = (new User)->count_noficaciones_user();
    $user_total_activos = (new User)->userTotalActivo();
    $total_roles = (new User)->totalRoles();
    $user_total_Deny = (new User)->userTotalDeny();
    $array_color = (new Colores)->getColores();
    $total_stand = (new Stand)->total_stand6($valornumero);
    $cantidad_pagado = (new Stand)->total_pagado7($valornumero);
    $cantidad_reservado = (new Stand)->total_reservado8($valornumero);
    $cantidad_disponible = (new Stand)->total_disponible7($valornumero);
    $raiz = 4;

    return view('adminlte::home',compact('count_notification','cantidad_pagado','valornumero','raiz','cantidad_reservado','cantidad_disponible','user_total_activos','total_stand',
    'total_roles','array_color'));

} public function dashboard7(Request $request){

    $count_notification = (new User)->count_noficaciones_user();
            $user_total_activos = (new User)->userTotalActivo();
            $total_roles = (new User)->totalRoles();
            $user_total_Deny = (new User)->userTotalDeny();
            $array_color = (new Colores)->getColores();
            $total_stand = (new Stand)->total_stand8();
            $cantidad_pagado = (new Stand)->total_pagado8();
            $cantidad_reservado = (new Stand)->total_reservado9();
            $cantidad_disponible = (new Stand)->total_disponible8();
            $raiz =5;
            $cantidad_full = (new Stand)->totalesfull();

            return view('adminlte::home',compact('count_notification','user_total_activos','cantidad_full','total_stand',
                                                  'total_roles','cantidad_pagado','raiz','cantidad_reservado','cantidad_disponible', 'array_color'));


}
}
