<?php

namespace App\Models\Ventas;

use App\Models\Stand\Stand;
use App\Models\Participante\Participante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Venta extends Model
{
    use HasFactory;
    protected $table = 'venta';
    protected $fillable = [
        'participante_id',
        'stand_id',  
        'user_id',      
        'montocancelado',
        'observacion',
        'negociacion',
        'fecha',
    ];
    public function total_Venta(){
        try {
            $venta = DB::table('venta')->get();
            return $venta;
        }catch(Throwable $e){
            $solicitud = [];
            return $venta;
        }
    
    }
    public function obtenerVenta($status){
       
        if($status=='DISPONIBLE'){
            
            $resultado = DB::table('stand')->where('status', $status)->get();
        }else{
           
            $resultado = DB::table('venta') ->join('stand', 'venta.stand_id', '=', 'stand.id')
            ->join('participante', 'venta.participante_id', '=', 'participante.id')
            ->select('participante.nombre AS participante', 'venta.id AS id', 'stand.nombre AS stand', 'stand.zona AS zona','stand.status AS status')
            ->where('status', $status)->get();

        }
        return $resultado;
    }
    public function obtenerparticipante($stand_id){
    $resultados = DB::table('venta')->where('stand_id', $stand_id)
                ->get();
           
            return $resultados;
        }
    }
   


