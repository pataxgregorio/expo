<?php

namespace App\Models\Stand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Stand extends Model
{
    use HasFactory;
    protected $table = 'stand';
    protected $fillable = [
        'nombre',
        'ubicacion',        
        'costo',
        'zona',
        'status',
        
    ];
    public function total_stand1(){
        try {
            $stand = DB::table('stand')->where('zona','LANCEROS')->get();
            return $stand;
        }catch(Throwable $e){
            $solicitud = [];
            return $stand;
        }
        
    }
    
    public function total_stand2(){
        try {
            $stand = DB::table('stand')->where('zona','CENTAURO')->get();
            return $stand;
        }catch(Throwable $e){
            $solicitud = [];
            return $stand;
        }
        
    }  
    public function total_stand3(){
        try {
            $stand = DB::table('stand')->where('zona','COLEADORES')->get();
            return $stand;
        }catch(Throwable $e){
            $solicitud = [];
            return $stand;
        }
        
    }
    public function total_stand4(){
        try {
            $stand = DB::table('stand')->where('zona','GENERAL')->get();
            return $stand;
        }catch(Throwable $e){
            $solicitud = [];
            return $stand;
        }
        
    }
    public function total_pagado(){
     
            $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as pagado'))->where('zona','LANCEROS')->where('status','PAGADO')->get();
                foreach($pagado as $pagado2){
                    
                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    }else{
                        $total = 0;
                        return $total;
                    }
                }
                
            }
            public function total_pagado5(){
     
                $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as pagado'))->where('status','PAGADO')->get();
                    foreach($pagado as $pagado2){
                        
                        if (property_exists($pagado2, 'pagado')) {
    
                            $total = $pagado2->pagado;
                            return $total;
                        }else{
                            $total = 0;
                            return $total;
                        }
                    }
                    
                }
                public function total_reservado5(){
       
                    $reservado = DB::table('stand') ->select(DB::raw('COUNT(id) as reservado'))->where('status','RESERVADO')->get();
                   
                        foreach($reservado as $reservado2){
                            $valor =property_exists($reservado2, 'reservado');
                          
                            if((isset($valor))){
                               
                                $total = $reservado2->reservado;
                                return $total;
                            }  else{
                                $total = 0;
                                return $total;
                            }
                           
                        }  
            }

    public function total_reservado(){
       
            $reservado = DB::table('stand') ->select(DB::raw('COUNT(id) as reservado'))->where('zona','LANCEROS')->where('status','RESERVADO')->get();
           
                foreach($reservado as $reservado2){
                    $valor =property_exists($reservado2, 'reservado');
                  
                    if((isset($valor))){
                       
                        $total = $reservado2->reservado;
                        return $total;
                    }  else{
                        $total = 0;
                        return $total;
                    }
                   
                }  
    }
    
    public function total_disponible(){
     
        $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as disponible'))->where('zona','LANCEROS')->where('status','DISPONIBLE')->get();
            foreach($pagado as $pagado2){
                
                if (property_exists($pagado2, 'disponible')) {

                    $total = $pagado2->disponible;
                    return $total;
                }else{
                    $total = 0;
                    return $total;
                }
            }
            
        }
        public function total_disponible5(){
     
            $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as disponible'))->where('status','DISPONIBLE')->get();
                foreach($pagado as $pagado2){
                    
                    if (property_exists($pagado2, 'disponible')) {
    
                        $total = $pagado2->disponible;
                        return $total;
                    }else{
                        $total = 0;
                        return $total;
                    }
                }
                
            }
        public function total_disponible2(){
     
            $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as disponible'))->where('zona','CENTAURO')->where('status','DISPONIBLE')->get();
                foreach($pagado as $pagado2){
                    
                    if (property_exists($pagado2, 'disponible')) {
    
                        $total = $pagado2->disponible;
                        return $total;
                    }else{
                        $total = 0;
                        return $total;
                    }
                }
                
            }
            public function total_disponible3(){
     
                $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as disponible'))->where('zona','COLEADORES')->where('status','DISPONIBLE')->get();
                    foreach($pagado as $pagado2){
                        
                        if (property_exists($pagado2, 'disponible')) {
        
                            $total = $pagado2->disponible;
                            return $total;
                        }else{
                            $total = 0;
                            return $total;
                        }
                    }
                    
                }
    public function total_pagado2(){
        $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as pagado'))->where('zona','CENTAURO')->where('status','PAGADO')->get();
        foreach($pagado as $pagado2){
            
            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            }else{
                $total = 0;
                return $total;
            }
        }
        
        
    }
    public function total_reservado2(){
        $reservado = DB::table('stand') ->select(DB::raw('COUNT(id) as reservado'))->where('zona','CENTAURO')->where('status','RESERVADO')->get();
        
        foreach($reservado as $reservado2){
            $valor =property_exists($reservado2, 'reservado');
            
            if((isset($valor))){
               
                $total = $reservado2->reservado;
                return $total;
            }  else{
                $total = 0;
                return $total;
            }
           
        }
      
        
    }
    public function total_pagado3(){
        $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as pagado'))->where('zona','COLEADORES')->where('status','PAGADO')->get();
        foreach($pagado as $pagado2){
            
            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            }else{
                $total = 0;
                return $total;
            }
        }
        
    }
    public function total_reservado3(){
        $reservado = DB::table('stand') ->select(DB::raw('COUNT(id) as reservado'))->where('zona','COLEADORES')->where('status','RESERVADO')->get();
           
        foreach($reservado as $reservado2){
            $valor =property_exists($reservado2, 'reservado');
          
            if((isset($valor))){
               
                $total = $reservado2->reservado;
                return $total;
            }  else{
                $total = 0;
                return $total;
            }
           
        }
    }
    public function total_disponible4(){
     
        $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as disponible'))->where('zona','GENERAL')->where('status','DISPONIBLE')->get();
            foreach($pagado as $pagado2){
                
                if (property_exists($pagado2, 'disponible')) {

                    $total = $pagado2->disponible;
                    return $total;
                }else{
                    $total = 0;
                    return $total;
                }
            }
            
        }
    public function total_pagado4(){
        $pagado = DB::table('stand') ->select(DB::raw('COUNT(id) as pagado'))->where('zona','GENERAL')->where('status','PAGADO')->get();
        foreach($pagado as $pagado2){
            
            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            }else{
                $total = 0;
                return $total;
            }
        }
        
    }
    public function total_reservado4(){
        $reservado = DB::table('stand') ->select(DB::raw('COUNT(id) as reservado'))->where('zona','GENERAL')->where('status','RESERVADO')->get();
           
        foreach($reservado as $reservado2){
            $valor =property_exists($reservado2, 'reservado');
          
            if((isset($valor))){
               
                $total = $reservado2->reservado;
                return $total;
            }  else{
                $total = 0;
                return $total;
            }
           
        }
    }
    }
   


