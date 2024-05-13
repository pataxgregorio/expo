    <?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
use App\Http\Controllers\NotificarController;
use Illuminate\Support\Facades\Route;
use App\Models\User\User;
//use App\Http\Controllers\User\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('idioma/{lang}', 'Lenguaje\LenguajeController@cambioLenguaje')
            ->name('idioma.cambioLenguaje');

Route::get('/deny', function () {    
    return view('deny');
});

Route::get('/check_your_mail', function () {
    return view('adminlte::mail.check_your_mail');
});

Route::get('/', function () {
    return view('welcome');
});

/**
 * Se creó un middleware('permiso:user,view') el cual verifica antes de 
 * acceder al recurso solicitado si el usuario tiene permiso de ver dicho recurso.
 * Este middleware es parte de la seguridad de la aplicación en conjunto cn los permisos
 * asignados a cada rol. 
 * */
 // *********************************************************************************************************
    /*
    * Grupo Middleware para Autenticar y verifcar que tiene Permiso asociado a su Rol
    */
// *********************************************************************************************************
Route::group(['middleware' => 'auth'], function () {

    Route::get('/mail', 'Mail\MailController@index')->name('mail.index');
    Route::get('/homework', 'Tarea\TareaController@index')->name('homework.index');
    // *********************************************************************************************************
    /*
    * Rutas de Usuarios, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/notificaciones', 'Notification\NotificationController@index')->name('notificaciones.index');
    Route::get('/notificaciones/list', 'Notification\NotificationController@getNotifications')->name('notificaciones.list');
    Route::get('/notificaciones/read/{id}', 'Notification\NotificationController@setNotifications')->name('notificaciones.setNotifications');
    /*
    * Fin de las Rutas de Usuarios, para todas las operaciones
    */
    // *********************************************************************************************************
    // *********************************************************************************************************
    /*
    * Rutas de Usuarios, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/users', 'User\UserController@index')->name('users.index')->middleware('permiso:user,view');
    Route::get('/users/create', 'User\UserController@create')->name('users.create')->middleware('permiso:user,add');
    Route::post('/users', 'User\UserController@store')->name('users.store')->middleware('permiso:user,add');
    Route::get('/users/{user}/view', 'User\UserController@view')->name('users.view')->middleware('permiso:user,view');
    Route::get('/users/{user}/edit', 'User\UserController@edit')->name('users.edit');
    Route::post('/users/{user}', 'User\UserController@update')->name('users.update')->middleware('permiso:user,update');
    Route::get('/users/{user}/delete', 'User\UserController@destroy')->name('users.destroy')->middleware('permiso:user,delete');
    Route::get('/users/list', 'User\UserController@getUsers')->name('users.list')->middleware('permiso:user,view');
    Route::get('/users/profile', 'User\UserController@profile')->name('users.profile');
    Route::post('/users/profile/{id}', 'User\UserController@update_avatar')->name('users.profile')->middleware('permiso:user,update');
    Route::get('/users/usuarioRol', 'User\UserController@usuarioRol')->name('users.usuarioRol');
    Route::get('/users/notificationsUser', 'User\UserController@notificationsUser')->name('users.notificationsUser');
    Route::get('/users/print', 'User\UserController@usersPrint')->name('users.usersPrint')->middleware('permiso:user,print');
    Route::get('/users/color_view', 'User\UserController@colorView')->name('users.colorView');
    Route::get('/users/color_change', 'User\UserController@colorChange')->name('users.colorChange');
    /*
    * Fin de las Rutas de Usuarios, para todas las operaciones
    */
    // *********************************************************************************************************
    // *********************************************************************************************************
    /*
    * Rutas de Permiso, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/permisos', 'Permiso\PermisoController@index')
    ->name('permisos.index')->middleware('permiso:permiso,view');

    Route::get('/permisos/list', 'Permiso\PermisoController@getModulos')
    ->name('permisos.list')->middleware('permiso:permiso,view');

    Route::get('/permisos/create', 'Permiso\PermisoController@create')
    ->name('permisos.create')->middleware('permiso:permiso,add');

    Route::post('/permisos','Permiso\PermisoController@store')
    ->name('permisos.store')->middleware('permiso:permiso,add');

    Route::post('/permisos/{permiso}','Permiso\PermisoController@show')
    ->name('permisos.show')->middleware('permiso:permiso,view');

    Route::get('/permisos/{permiso}/edit','Permiso\PermisoController@edit')
    ->name('permisos.edit')->middleware('permiso:permiso,edit');
// Parte importante para Actualizar los cambios realizados a los permisos .//////////////////
    Route::post('/permisos/{id}/{accion}/{allow_deny}','Permiso\PermisoController@update')
    ->name('permisos.update')->middleware('permiso:permiso,update');

    Route::post('/permisos/{id}/{allow_deny}','Permiso\PermisoController@updateAllPermisos')
    ->name('permisos.updateAllPermisos');

    Route::get('/permisos/{modulo_id}/{rol_id}','Permiso\PermisoController@getPermisos')
    ->name('permisos.getPermisos')->middleware('permiso:permiso,view');
// Parte importante para Actualizar los cambios realizados a los permisos .//////////////////
    Route::post('/permisos/{permiso}/delete','Permiso\PermisoController@destroy')
    ->name('permisos.destroy')->middleware('permiso:permiso,delete');

    Route::get('/permisos/print', 'Permiso\PermisoController@permisoPrint')
    ->name('permisos.permisoPrint')->middleware('permiso:permiso,print');    
    /*
    * Fin de las Rutas de Permiso, para todas las operaciones
    */
    // *********************************************************************************************************
    // *********************************************************************************************************    
    /*
    * Rutas de Roles, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/rols', 'Rol\RolController@index')->name('rols.index')->middleware('permiso:rol,view');
    Route::get('/rols/create', 'Rol\RolController@create')->name('rols.create')->middleware('permiso:rol,add');
    Route::post('/rols', 'Rol\RolController@store')->name('rols.store')->middleware('permiso:rol,add');
    Route::get('/rols/{rol}/show', 'Rol\RolController@show')->name('rols.show')->middleware('permiso:rol,view');
    Route::get('/rols/{rol}/edit', 'Rol\RolController@edit')->name('rols.edit')->middleware('permiso:rol,edit');
    Route::post('/rols/{rol}', 'Rol\RolController@update')->name('rols.update')->middleware('permiso:rol,update');
    Route::get('/rols/{rol}/delete', 'Rol\RolController@destroy')->name('rols.destroy')->middleware('permiso:rol,delete');
    Route::get('/rols/list', 'Rol\RolController@getRols')->name('rols.list')->middleware('permiso:rol,view');
    Route::get('/rols/print', 'Rol\RolController@rolsPrint')->name('rols.rolsPrint')->middleware('permiso:rol,print');        
    /*
    * Fin de las Rutas de Usuarios, para todas las operaciones
    */
    // *********************************************************************************************************
    // *********************************************************************************************************
    /*
    * Rutas de Roles, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/modulos', 'Modulo\ModuloController@index')->name('modulos.index')->middleware('permiso:modulo,view');
    Route::get('/modulos/create', 'Modulo\ModuloController@create')->name('modulos.create')->middleware('permiso:modulo,add');
    Route::post('/modulos', 'Modulo\ModuloController@store')->name('modulos.store')->middleware('permiso:modulo,add');
    Route::get('/modulos/{modulo}/show', 'Modulo\ModuloController@show')->name('modulos.show')->middleware('permiso:modulo,view');
    Route::get('/modulos/{modulo}/edit', 'Modulo\ModuloController@edit')->name('modulos.edit')->middleware('permiso:modulo,edit');
    Route::post('/modulos/{modulo}', 'Modulo\ModuloController@update')->name('modulos.update')->middleware('permiso:modulo,update');
    Route::get('/modulos/{modulo}/delete', 'Modulo\ModuloController@destroy')->name('modulos.destroy')->middleware('permiso:modulo,delete');
    Route::get('/modulos/list', 'Modulo\ModuloController@getModulos')->name('modulos.list')->middleware('permiso:modulo,view');
    Route::get('/modulos/print', 'Modulo\ModuloController@modulosPrint')->name('modulos.modulosPrint')->middleware('permiso:modulo,print');               
    /*
    * Fin de las Rutas de Usuarios, para todas las operaciones
    */
    // *********************************************************************************************************
    // *********************************************************************************************************

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard.dashboard');
    Route::get('/dashboard1', 'HomeController@dashboard1')->name('dashboard.dashboard1');
    Route::get('/dashboard2', 'HomeController@dashboard2')->name('dashboard.dashboard2');
    Route::get('/dashboard3', 'HomeController@dashboard3')->name('dashboard.dashboard3');
    Route::get('/dashboard4', 'HomeController@dashboard4')->name('dashboard.dashboard4');
    Route::get('/dashboard5', 'HomeController@dashboard5')->name('dashboard.dashboard5');
    Route::get('/dashboard6', 'HomeController@dashboard6')->name('dashboard.dashboard6');
    Route::get('/dashboard7', 'HomeController@dashboard7')->name('dashboard.dashboard7');
    
});
// *********************************************************************************************************
    /*
    * FIN del Grupo Middleware para Autenticar y verifcar que tiene Permiso asociado a su Roll
    */
// *********************************************************************************************************

// La presente Ruta se encarga de validar los datos enviados al Correo de Usuario que se Registró
Route::get('register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm')->name('auth.confirm');
// *********************************************************************************************************


/* Rutas de Control Diario, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
*/
Route::get('/participante', 'Participante\ParticipanteController@index')->name('participante.index');
Route::get('/participante/create', 'Participante\ParticipanteController@create')->name('participante.create');
Route::post('/participante', 'Participante\ParticipanteController@store')->name('participante.store');
Route::get('/participante/{participante}/view', 'Participante\ParticipanteController@view')->name('participante.view');
Route::get('/participante/{participante}/edit', 'Participante\ParticipanteController@edit')->name('participante.edit');
Route::post('/participante/{participante}', 'Participante\ParticipanteController@update')->name('participante.update');
Route::get('/participante/{participante}/delete', 'Participante\ParticipanteController@destroy')->name('participante.destroy');
Route::get('/participante/getComunas', 'Participante\ParticipanteController@getComunas')->name('getComunas');
Route::get('/participante/getComunidad', 'Participante\ParticipanteController@getComunidad')->name('getComunidad');
Route::get('/participante/getCoodinacion', 'Participante\ParticipanteController@getCoodinacion')->name('getCoodinacion');
Route::get('/participante/list', 'Participante\ParticipanteController@getParticipante')->name('participante.list');
Route::get('/participante/print', 'Participante\ParticipanteController@participantesPrint')->name('participante.participantesPrint');
Route::get('/participante/solicitudTipo', 'Participante\ParticipanteController@solicitudTipo')->name('participante.solicitudTipo');
Route::get('/participante/solicitudTotalTipo', 'Participante\ParticipanteController@solicitudTotalTipo')->name('participante.solicitudTotalTipo');
/* ********************************************************************  */
Route::get('/venta/pago', 'Venta\VentaController@pago')->name('pago');
Route::get('/venta/abonado', 'Venta\VentaController@abonado')->name('abonado');
Route::get('/venta/abonado2', 'Venta\VentaController@abonado2')->name('abonado2');
Route::get('/venta', 'Venta\VentaController@index')->name('venta.index');
Route::post('/venta', 'Venta\VentaController@store')->name('venta.store');
Route::post('/venta2', 'Venta\VentaController@store2')->name('venta.store2');
Route::get('/ventaslist', 'Venta\VentaController@getVentas')->name('ventas.list');
Route::get('/standlist', 'Venta\VentaController@getStand')->name('stand.list');
Route::get('/ver', 'Venta\VentaController@getVenta')->name('ver');
Route::post('/imprimir', 'Venta\VentaController@imprimir')->name('venta.imprimir');
// Route::get('/descargarmapa', 'HomeController@descargarmapa' )->name('descargarmapa');
//Route::get('/factura', 'Venta\VentaController@imprimir')->name('factura');
//Route::get('/venta/pago', 'Venta\VentaController@edit')->name('venta.edit');
