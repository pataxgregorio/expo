<?php

namespace App\Models\Participante;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Participante extends Model
{
    use HasFactory;
    protected $table = 'participante';
    protected $fillable = [
        'nombre',
        'letra',
        'rif',
        'direccion',
        'telefono',
        'telefono2',
        'email',
        'sector',
        'user_id',
        'status',
    ];
    public function total_participante(){
        try {
            $participante = DB::table('participante')->where('status', 'ACTIVO')->get();
            return $participante;
        }catch(Throwable $e){
            $solicitud = [];
            return $participante;
        }

    }
    public function total_participante2(){
        try {
            $participante = DB::table('participante')->select('id','nombre')->orderBy('id')->pluck('nombre', 'id')->toArray();
            return  $participante;
        }catch(Throwable $e){
            $participante = [];
            return  $participante;
        }

    }

    }



