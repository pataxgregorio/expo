@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.home_1') }}
@endsection

@section('contentheader_title')
@endsection

@section('main-content')
<?php 
   $color ='bg-white';
   $color2 ='bg-write';
   $cantidad =3;
  
   
 ?> 
     <div class="row">
        @if ($raiz==1)
          
             <div style="text-align:center">
               <img src="{{ url('/images/icons/2.png') }}" alt="" class="img-fluid" style="width: 100%; max-width:300px;">
            </div>  
               
         @endif
             <div class="col-lg-4 col-md-6 col-xs-12">
               <x-box2 titulo2="Total pagado"  color2="{{$color}}" status="PAGADO" cantidad="{{$cantidad_pagado}}" raiz="{{$raiz}}"></x-box2>
            </div>
             <div class="col-lg-4 col-md-6 col-xs-12">
                  <x-box2 titulo2="Total Reservado" color2="{{$color2}}" status="RESERVADO" cantidad="{{$cantidad_reservado}}" raiz="{{$raiz}}"></x-box2>
             </div> 
          <div class="col-lg-4 col-md-6 col-xs-12">
              <x-box2 titulo2="Total Disponible" color2="{{$color2}}" status="DISPONIBLE" cantidad="{{$cantidad_disponible}}" raiz="{{$raiz}}"></x-box2>
         </div>
      
      </div>
        <?php 
       use Illuminate\Support\Collection;
       $arreglo1 = new Collection();
       $arreglo2 = new Collection();
    $cont =1;
    $cont2 =1;
       
       foreach($total_stand as $total_stand3){
         if ($cont2<=10){
            $arreglo1->push($total_stand3);
         }
         if ($cont2>10){
            $arreglo2->push($total_stand3);
         }
        $cont2++;
       }
   //    var_dump($arreglo1);
     //  var_dump($arreglo2);
      // exit();

        ?>
   <div class="container" style="display:flex; justify-content:center;align-items:center;">
        <div class="container" style="">
            <div class="">
             
            @if ($raiz==0)
            
            <div> <h3>Stand A</h3></div>
               @foreach($arreglo1 as $total_stand2)  
                  <?php 
                  
                  //  var_dump($total_stand);
                     if ($total_stand2->status=='DISPONIBLE'){
                     $color ='bg-green';
                     }
                     if ($total_stand2->status=='PAGADO'){
                        $color ='bg-red';
                        }
                     if ($total_stand2->status=='RESERVADO'){
                           $color ='bg-yellow';
                     }
                     
                  ?> 
                     
                           <div  style="margin: 0 auto 0 auto">
      
                              <x-box titulo="Stand" status="{{ $total_stand2->status }}" name="Solitudes Registradas"  color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                           </div>
         
                  

            @endforeach
           
         @endif
         </div> 
        </div>
        
        <div class="container d-flex align-items-center" style="margin-left:px;">
            <div class="">
          
            @if ($raiz==0)
            <div> <h3>Stand B</h3></div>
            
               @foreach($arreglo2 as $total_stand2)  
                  <?php 
                  
                  //  var_dump($total_stand);
                     if ($total_stand2->status=='DISPONIBLE'){
                     $color ='bg-green';
                     }
                     if ($total_stand2->status=='PAGADO'){
                        $color ='bg-red';
                        }
                     if ($total_stand2->status=='RESERVADO'){
                           $color ='bg-yellow';
                     }
                     
                  ?> 
                     
                           <div  style="margin: 0 auto 0 auto">
      
                              <x-box titulo="Stand" status="{{ $total_stand2->status }}" name="Solitudes Registradas"  color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                           </div>
         
                  

            @endforeach
           
         @endif
         </div> 
        </div>
   </div>
 
	<!--  CANVAS de las Metricas Para User, Rol y Notificaciones, para View-->
      
  
     
@endsection

@section('script_Chart')

@endsection
