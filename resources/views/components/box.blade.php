<div class="card">   
    <div class="small-box {{$color}} card-body" style="width :120px; height:100px " >             
    <!--   <div class="small-box bg-blue card-body">  -->
        <div class="inner">                         
            <h3 style ="font-size:12px;">{{$titulo}} : {{$nombre}}</h3>
            <div class="form-group form-inline" style = "font-size:12px;">
                Status:{{$status}}
            </div>
        </div>
        @if ($status=='DISPONIBLE')
     
        <a href="{{ route('pago', ['id' => $codigo]) }}">     <button type="button" data-id="{{$codigo}}"  id="{{$codigo}}" name ="comprar" class="{{$color}} btn btn-primary comprar" style="border: none; font-weight: bold; border-radius: 81px; width:75px;margin-top:-24px;margin-left: 20px;">COMPRAR</button>   </a>    
      
       @endif
       @if ($status=='RESERVADO')
       <a href="{{ route('abonado', ['id' => $codigo]) }}">   <button id ="{{$codigo}}"  data-id="{{$codigo}}" type="button" name ="abonar" class=" {{$color}} btn btn-primary abonar" style=" border: none; font-weight: bold; border-radius: 81px; width:75px;margin-top:-24px;margin-left: 20px;">ABONAR</button>      </a>      
       @endif
       @if ($status=='PAGADO')
       <a href="{{ route('abonado2', ['id' => $codigo]) }}">   <button id ="{{$codigo}}"  data-id="{{$codigo}}" type="button" name ="abonar" class=" {{$color}} btn btn-primary abonar" style=" border: none; font-weight: bold; border-radius: 81px; width:75px;margin-top:-24px;margin-left: 20px;">VER</button>      </a>      
       @endif
    </div>
</div>

