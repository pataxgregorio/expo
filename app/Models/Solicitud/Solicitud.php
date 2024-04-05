<?php

namespace App\Models\Solicitud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Solicitud extends Model
{
    use HasFactory;
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
        'codigo_control',
        'status_id',
        'nombre',
        'cedula',
        'sexo',
        'email',
        'direccion',
        'fecha',
        'telefono',
        'telefono2',
        'organismo',
        'edocivil',
        'asignacion',
        'fechaNacimiento',
        'nivelestudio',
        'profesion',
        'recaudos',
        'beneficiario',
        'quejas',
        'reclamo',
        'sugerecia',
        'asesoria',
        'denuncia',
        'denunciado',
        
    ];
    public function getSolicitudList_DataTable(){
        try {
            $solicitud = DB::table('solicitud')
            ->join('tipo_solicitud', 'solicitud.tipo_solicitud_id', '=', 'tipo_solicitud.id')
            ->join('direccion', 'solicitud.direccion_id', '=', 'direccion.id')
            ->join('status', 'solicitud.status_id', '=', 'status.id')
            ->select('solicitud.id','solicitud.nombre AS solicitante','tipo_solicitud.nombre AS nombretipo','direccion.nombre AS direccionnombre','status.nombre AS nombrestatus')
            ->where ('status_id',1)->get();
            return $solicitud;
        }catch(Throwable $e){
            $solicitud = [];
            return $solicitud;
        }
        
    }
    public function getSolicitudList_DataTable2(){
        try {
            $solicitud = DB::table('solicitud')
            ->join('tipo_solicitud', 'solicitud.tipo_solicitud_id', '=', 'tipo_solicitud.id')
            ->join('direccion', 'solicitud.direccion_id', '=', 'direccion.id')
            ->join('status', 'solicitud.status_id', '=', 'status.id')
            ->select('solicitud.id','solicitud.nombre AS solicitante','tipo_solicitud.nombre AS nombretipo','direccion.nombre AS direccionnombre','status.nombre AS nombrestatus')
            ->where ('tipo_solicitud.id', '!=',4)
            ->where ('tipo_solicitud.id', '!=',5)
            ->where ('status_id', '!=',5)->get();
            return $solicitud;
        }catch(Throwable $e){
            $solicitud = [];
            return $solicitud;
        }
        
    }
    public function count_solictud(){        
        return DB::table('solicitud')
            ->join('tipo_solicitud', 'solicitud.tipo_solicitud_id', '=', 'tipo_solicitud.id')
            ->select('tipo_solicitud.nombre AS SOLICITUD_NOMBRE',
                DB::raw('COUNT(solicitud.tipo_solicitud_id) AS TOTAL_SOLICITUD'))
            ->groupBy('tipo_solicitud.id')
            ->orderByDesc('TOTAL_SOLICITUD')->get();
    }
    
    public function count_total_solictud(){        
        return DB::table('solicitud')
            ->select(DB::raw('COUNT(solicitud.tipo_solicitud_id) AS TOTAL_SOLICITUD'))
            ->orderByDesc('TOTAL_SOLICITUD')->get();
    }


}
