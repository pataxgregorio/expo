@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.home_1') }}
@endsection

@section('contentheader_title')
@endsection

@section('main-content')
<div style="display:flex; flex-direction: row-reverse; margin-top:15px;">
   <button id="btnDescargar" style="border: none;font-size: 12px; font-weight: bold; border-radius: 81px; width:75px ; margin-top:-24px;margin-left: 75px; background: #e1dede;
  color: black;" >Mapa</button>
</div>
        <?php
            $color = 'bg-white';
            $color2 = 'bg-write';
            $cantidad = 3;


        ?>
 <div class="row">
    @if ($raiz == 1)

        <div style="text-align:center">
        <img src="{{ url('/images/logo2.png') }}" alt="" class="img-fluid" style="width: 150px;">
        </div>
        <h2 style="text-align: center;"><strong>PABELLONES</strong></h2>
    @endif
    <div class="col-lg-4 col-md-4 col-xs-4">
        <x-box2 titulo2="LANCEROS"  color2="{{$color}}" status="PAGADO" cantidad="{{$cantidad_pagado}}" raiz=20></x-box2>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <x-box2 titulo2="CENTAURO" color2="{{$color2}}" status="RESERVADO" cantidad="{{$cantidad_reservado}}" raiz=20></x-box2>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <x-box2 titulo2="COLEADORES" color2="{{$color2}}" status="DISPONIBLE" cantidad="{{$cantidad_disponible}}" raiz=20></x-box2>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <x-box2 titulo2="GENERAL"  color2="{{$color}}" status="PAGADO" cantidad="{{$cantidad_pagado}}" raiz=20></x-box2>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4">
                <x-box2 titulo2="ESPIGA" color2="{{$color2}}" status="RESERVADO" cantidad="{{$cantidad_reservado}}" raiz=20></x-box2>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4">
                <x-box2 titulo2="CATIRE PAEZ" color2="{{$color2}}" status="DISPONIBLE" cantidad="{{$cantidad_disponible}}" raiz=20></x-box2>
            </div>
    <div class="col-lg-4 col-md-4 col-xs-4">
        <x-box2 titulo2="Total pagado"  color2="{{$color}}" status="PAGADO" cantidad="{{$cantidad_pagado}}" raiz="{{$raiz}}"></x-box2>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <x-box2 titulo2="Total Reservado" color2="{{$color2}}" status="RESERVADO" cantidad="{{$cantidad_reservado}}" raiz="{{$raiz}}"></x-box2>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <x-box2 titulo2="Total Disponible" color2="{{$color2}}" status="DISPONIBLE" cantidad="{{$cantidad_disponible}}" raiz="{{$raiz}}"></x-box2>
        </div>

</div>

      @if ($raiz == 0)
      <div style="display:flex;justify-content:center;align-items:center;">
        <h2> <strong>PABELLON {{$nombre}}</strong> </h2>
      </div>

      @endif
      <br>
      <br>
        <?php
          use Illuminate\Support\Collection;

        if ($raiz == 0) {
        $arreglo1 = new Collection();
        $arreglo2 = new Collection();
        $cont = 1;
        $cont2 = 1;

        foreach ($total_stand as $total_stand3) {
            if ($cont2 <= 10) {
                $arreglo1->push($total_stand3);
            }
            if ($cont2 > 10) {
                $arreglo2->push($total_stand3);
            }
            $cont2++;
        }
        }

//    var_dump($arreglo1);
//  var_dump($arreglo2);
// exit();

    ?>
   <div class="container" style="display:flex; justify-content:center;align-items:center;">
        <div class="container" style="">
            <div class="col-lg-6 col-md-6 col-xs-6" style="margin-left: 36px; margin-bottom: 0px; margin-top: -21px; margin-right: 50px;">

                    @if ($raiz == 0)

                        {{-- <div> <h3>Stand {{$fila1}}</h3></div> --}}
                    @foreach($arreglo1 as $total_stand2)
                        <?php

                        //  var_dump($total_stand);
                            if ($total_stand2->status == 'DISPONIBLE') {
                                    $color = '';
                                }
                            if ($total_stand2->status == 'PAGADO') {
                                $color = '';
                                }
                            if ($total_stand2->status == 'RESERVADO') {
                                $color = '';
                                }

                        ?>

                            <div  style="margin: 0 auto 0 auto">

                                <x-box titulo="Stand" status="{{ $total_stand2->status }}" name="Solitudes Registradas"  raiz=0 color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                            </div>


                        @endforeach
                    @endif
          </div>
       </div>

        <div class="container d-flex align-items-center" >

            <div class="col-lg-6 col-md-6 col-xs-6" style="margin-left: 36px; margin-bottom: 0px; margin-top: -21px; margin-right: 50px;">

                        @if ($raiz == 0)
                        {{-- <div> <h3>Stand {{$fila2}}</h3></div> --}}

                        @foreach($arreglo2 as $total_stand2)
                            <?php

                            //  var_dump($total_stand);
                                    if ($total_stand2->status == 'DISPONIBLE') {
                                        $color = '';
                                    }
                                    if ($total_stand2->status == 'PAGADO') {
                                        $color = '';
                                    }
                                    if ($total_stand2->status == 'RESERVADO') {
                                        $color = '';
                                    }

                            ?>

                                <div  style="margin: 0 auto 0 auto">

                                    <x-box titulo="Stand" status="{{ $total_stand2->status }}" name="Solitudes Registradas"  raiz="{{$raiz}}" color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                                </div>

                            @endforeach
                        @endif


             </div>
        </div>
   </div>
   <div class="row">
      <div class="">
                @if ($raiz==3)
                    <div> <h2 class="text-center"><strong>Torre {{$valornumero}}</strong></h2></div>
                        <div style="align-items-center; display: flex" style="margin-left: 180px">
                                @foreach($total_stand as $total_stand2)
                                        <?php

                                            //  var_dump($total_stand);
                                            if ($total_stand2->status=='DISPONIBLE'){
                                            $color ='';
                                            }
                                            if ($total_stand2->status=='PAGADO'){
                                                $color ='';
                                                }
                                            if ($total_stand2->status=='RESERVADO'){
                                                $color ='';
                                            }

                                        ?>

                                <div class="col-lg-3 col-md-3 col-xs-3 text-center">

                                    <x-box titulo="Torre" status="{{ $total_stand2->status }}" name="Solitudes Registradas" raiz=3 color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                                </div>
                                @endforeach
                        </div>
                @endif
       </div>
  </div>

  <div class="row">
          <div class="container">
                    @if ($raiz==4)
                        @if($valornumero == 0)
                            <div> <h3 class="text-center">Arco Principal</h3></div>

                        @endif
                        <div style="margin-right: 20px; margin-left: 22px;" >
                                @if($valornumero != 0)
                                  <div> <h3 class="text-center">Arco {{$valornumero}}</h3></div>
                                    <div style="margin-right: 230px; margin-left: 92px;" >
                                @endif
                                        <div style="">
                                            <h2 style="text-align:center">Lados Frontales</h2>
                                        </div>
                                        <?php $count = 1; ?>
                                        @foreach($total_stand as $total_stand2)
                                                        <?php
                                                            //  var_dump($total_stand);
                                                                if ($total_stand2->status=='DISPONIBLE'){
                                                                $color ='';
                                                                }
                                                                if ($total_stand2->status=='PAGADO'){
                                                                    $color ='';
                                                                    }
                                                                if ($total_stand2->status=='RESERVADO'){
                                                                    $color ='';
                                                                }

                                                            ?>

                                                        @if($count == 5)
                                                            <div style="">
                                                            <h2 class="text-center">Lados Laterales</h2>
                                                            </div>
                                                        @endif
                                                    @if($count == 9 )
                                                    <div style="">
                                                        <h2 class="text-center">Lados Traseros</h2>
                                                    </div>
                                                    @endif
                                                    <div class="col-lg-6 col-md-6 col-xs-6 text-center">
                                                        <x-box titulo="Arco" status="{{ $total_stand2->status }}" name="Solitudes Registradas" cantidad=0 color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                                                    </div>
                                            <?php $count++; ?>
                                    @endforeach
                            </div>
         @endif
  </div>
</div>




        <?php

            if ($raiz == 5) {
                $arreglo1 = new Collection();
                $arreglo2 = new Collection();
                $cont = 1;
                $cont2 = 1;

                 foreach ($total_stand as $total_stand3) {
                        if ($cont2 <= 25) {
                            $arreglo1->push($total_stand3);
                        }
                        if ($cont2 > 25) {
                            $arreglo2->push($total_stand3);
                        }
                    $cont2++;
                 }
            }

        ?>
      @if ($raiz == 5)
         <div style="display:flex; justify-content:center;align-items:center;"> <h2 style="align-items:center"><strong>Stands de Comida</strong></h2></div>
             <div class="container" style="display:flex; justify-content:center;align-items:center;">

                <div class="container" style="">
                    <div class="" style="margin-left: 20px;">

                     @foreach($arreglo1 as $total_stand2)
                            <?php
                                if ($total_stand2->status == 'DISPONIBLE') {
                                $color = '';
                                }
                                if ($total_stand2->status == 'PAGADO') {
                                $color = '';
                                }
                                if ($total_stand2->status == 'RESERVADO') {
                                $color = '';
                                }
                               ?>
                             <div  style="margin: 0 auto 0 auto">
                                <x-box titulo="Stand" status="{{ $total_stand2->status }}" name="Solitudes Registradas" cantidad=0 color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                            </div>
                        @endforeach
    @endif
            </div>
        </div>

           <div class="container d-flex align-items-center" style="margin-bottom: 0px;" >
               <div class="" style="margin-left: 30px;">
                     @if ($raiz == 5)
                           @foreach($arreglo2 as $total_stand2)
                                    <?php
                                    if ($total_stand2->status == 'DISPONIBLE') {
                                        $color = '';
                                    }
                                    if ($total_stand2->status == 'PAGADO') {
                                        $color = '';
                                    }
                                    if ($total_stand2->status == 'RESERVADO') {
                                        $color = '';
                                    }
                                    ?>
                                <div  style="margin: 0 auto 0 auto">
                                    <x-box titulo="Stand" status="{{ $total_stand2->status }}" name="Solitudes Registradas" cantidad=0 color="{{$color}}" codigo="{{ $total_stand2->id }}" nombre="{{ $total_stand2->nombre }}" ></x-box>
                                </div>
                          @endforeach
                     @endif
               </div>
            </div>

</div>

	<!--  CANVAS de las Metricas Para User, Rol y Notificaciones, para View-->



@endsection

@section('script_Chart')

<script>
    $(document).ready(function() {
    $('#btnDescargar').click(function() {
        var urlArchivo = 'images/mapa.png'; // Ruta hacia el archivo que deseas descargar
        window.open(urlArchivo, '_blank'); // Abre el archivo en una nueva pestaña
    });
});

    </script>

@endsection
