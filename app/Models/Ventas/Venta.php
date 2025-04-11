<?php

namespace App\Models\Ventas;
use App\Models\User\User;
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
        'state',
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
            ->join('users', 'venta.user_id', '=', 'users.id')
            ->select( 'venta.id AS id', 'participante.nombre AS participante', 'stand.nombre AS stand', 'stand.zona AS zona','stand.status AS status','users.name AS vendedor','venta.fecha AS fecha')
            ->where('stand.status', $status)->get();
        }
        return $resultado;
    }
    public function obtenerVenta20(){


        $resultado = DB::table('venta')
        ->join('stand', 'venta.stand_id', '=', 'stand.id')
        ->join('participante', 'venta.participante_id', '=', 'participante.id')
        ->select(
            'venta.id AS id',
            'participante.nombre AS participante',
            'stand.nombre AS stand',
            'stand.zona AS zona',
            'stand.status AS status',
            'venta.fecha AS fecha'
        )
        ->where('stand.status', '!=', 'ELIMINADO')
        ->orderBy('stand.zona')   // Luego ordena por la zona del stand dentro de cada stand
        ->get();
var_dump($resultado);
exit();
        return $resultado;
    }
    public function obtenerVenta2(){


            $resultado = DB::table('stand')->get();

        return $resultado;
    }
    public function obtenerVenta4(){


        $resultado = DB::table('stand')->select( 'zona')->distinct()
        ->get();

    return $resultado;
}
    public function obtenerVenta3($fechadesde,$fechahasta,$zona){
     $fechadesde = isset($fechadesde) ? $fechadesde :"";
     $fechahasta = isset($fechahasta) ? $fechahasta :"";
     $zona = isset($zona) ? $zona :"";

        $resultado = DB::table('venta') ->join('stand', 'venta.stand_id', '=', 'stand.id')
            ->join('participante', 'venta.participante_id', '=', 'participante.id')
            ->join('users', 'venta.user_id', '=', 'users.id')
            ->select( 'venta.id AS id', 'stand.nombre AS stand', 'stand.zona AS zona','participante.nombre AS participante', 'stand.status AS status','users.name AS vendedor','venta.fecha AS fecha')
            ->where(function ($query) use ($fechadesde, $fechahasta, $zona) {
                if (!empty($fechaDesde)) {
                    $query->where('venta.fecha', '>=', $fechaDesde);
                }
                if (!empty($fechahasta)) {
                    $query->where('venta.fecha', '<=', $fechahasta);
                }
                if (!empty($zona)) {
                    $query->where('stand.zona', '=', $zona);
                }

            })
            ->distinct()
            ->get();
    return $resultado;
}

    public function obtenerparticipante($stand_id){
    $resultados = DB::table('venta')->where('stand_id', $stand_id)
                ->get();

            return $resultados;
        }
    }



