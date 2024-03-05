<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/

namespace App\Models\Solicitud;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Auth;

class Solicitud extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'solicitud';
    protected $fillable = [
        'users_id',
        'direccion_id',        
        'coordinacion_id',
        'tipo_solicitud_id',
        'enter_descentralizados_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'comuna_id',
        'comunidad_id',
        'comuna_id',
        'Nombre',
        'Cedula',
        'Sexo',
        'email',
        'Organizacion',
        'Fecha',
        'Telefono',
        'organismo',
        'edocivil',
        'fechaNacimiento',
        'profesion',
        'recaudos',
        'beneficiario',
        'quejas',
        'reclamo',
        'denunciado',

    ];

    public function getSolicitudList_DataTable(){        
        return DB::table('solicitud')->select('id','users_id','direccion_id','coordinacion_id','tipo_solicitud_id','enter_descentralizados_id',
               'estado_id','municipio_id','parroquia_id','comuna_id','comunidad_id','comuna_id','Nombre',
               'Cedula','Sexo','email','Organizacion','Fecha','Telefono','organismo','edocivil','fechaNacimiento','profesion',
               'recaudos','beneficiario','quejas','reclamo','denunciado')->get();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}