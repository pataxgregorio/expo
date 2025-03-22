<div class="card">
    <div class="small-box {{$color2}} card-body" style="width :100px; height:100px; margin-left: -20px;" >
    <!--   <div class="small-box bg-blue card-body">  -->
        <div class="inner">
            <h6 style ="font-size:10px; padding-left: 18px;"><strong>{{$titulo2}}</strong></h6>
            <div class="form-group form-inline" style = "font-size:10px; padding-left: 25px;">
            <p >
            <strong>
                Cantidad : {{$cantidad}}
            </strong>
            </p>
            </div>
        </div>

    @if ($raiz==1 )
    @if ($cantidad > 0)
        <a href="{{ route('ver', ['status' => $status]) }}">     <button type="button"  id="boton" name ="comprar" class="{{$color2}} btn comprar" style="border: none; font-weight: bold; border-radius: 81px; width:75px;margin-top:4px;margin-left: 23px; background: #e1dede;
         color: black;">LISTAR</button>   </a>
    @endif
    @endif
    </div>

</div>
