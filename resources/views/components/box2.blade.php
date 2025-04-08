

@if (($raiz == 0)|| ($raiz == 3) || ($raiz == 5))
<div class="card">
    <div class="small-box {{$color2}} card-body " id="{{$status}}" name ="{{$status}}" style="width :100px; height:100px; margin-left: -20px;" >
        <div class="inner">
            <h6 style ="font-size:12px;text-align: center;"><strong>{{$titulo2}}</strong></h6>
            <div class="form-group form-inline" style = "">
                <p >
                    <strong style="font-size:10px;">
                        Cantidad : {{$cantidad}}
                    </strong>
                </p>
            </div>
        </div>
    </div>
</div>
@endif

@if (($raiz == 20 ) || ($raiz == 1 ))
<div class="card">
    <div class="small-box {{$color2}} card-body" id="{{$titulo2}}" name ="{{$titulo2}}" style="width :100px; height:100px; margin-left: -20px;" >
        <div class="inner">
            <h6 style ="font-size:12px;text-align: center;"><strong>{{$titulo2}}</strong></h6>
            <div class="form-group form-inline" style = "">
                @if (($raiz==1 ))
                <p >
                    <strong style="font-size:10px;">
                        Cantidad : {{$cantidad}}
                    </strong>
                </p>
                @endif

                @if ($raiz==20 )
                <p >
                    <strong style="font-size:10px;">
                        Rersevado : {{$reservado}}
                    </strong>
                </p>
                <p >
                    <strong style="font-size:10px;">
                        Comprado : {{$pagado}}
                    </strong>
                </p>
                @endif
            </div>
        </div>
        @if ($raiz==1 )
        @if ($cantidad > 0)
            <a href="{{ route('ver', ['status' => $status]) }}">
                <button type="button"  id="{{$status}}" name ="{{$status}}" class="{{$color2}} btn comprar" style="border: none; font-weight: bold; border-radius: 81px; width:75px;margin-top:25px;margin-left: 23px; background: #e1dede; color: black;">LISTAR</button>
            </a>
        @endif
        @endif
    </div>
</div>
@endif
@if (($raiz == 20 ) || ($raiz == 1 ))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("GENERAL").style.display = "block"; // o el estilo que necesites
        document.getElementById("COLEADORES").style.display = "block";
        document.getElementById("CATIRE PAEZ").style.display = "block";
        document.getElementById("CENTAURO").style.display = "block";
        document.getElementById("ESPIGA").style.display = "block";
        document.getElementById("LANCERO").style.display = "block";
    });
</script>
@endif
@if (($raiz == 0)|| ($raiz == 3) || ($raiz == 5))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("GENERAL").style.display = "none"; // o el estilo que necesites
        document.getElementById("COLEADORES").style.display = "none";
        document.getElementById("CATIRE PAEZ").style.display = "none";
        document.getElementById("CENTAURO").style.display = "none";
        document.getElementById("ESPIGA").style.display = "none";
        document.getElementById("LANCEROS").style.display = "none";
    });
</script>
@endif
</style>
