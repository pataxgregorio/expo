<div class="card">
    @if ($raiz == 3)
    <div class="small-box {{$color}} card-body" style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; padding: 0; display: flex; align-items: center; justify-content: center;">
    @endif
    @if ($raiz !== 3)
    <div class="small-box {{$color}} card-body" style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; padding: 0; display: flex; align-items: center; justify-content: center;">
    @endif

    <div class="inner" style="width: 100%;height: 100%;margin-bottom: 15px;margin-right: 0px;margin-left: -23px;">
            @if ($raiz == 0)
            @if ($status=='DISPONIBLE')
            <a href="{{ route('pago', ['id' => $codigo]) }}">        <img src="{{ url('/images/icons/tv.png') }}" alt="" class="img-fluid" style="width: 140%;height: 140%;object-fit: cover;"> </a>
            @endif
            @if ($status=='RESERVADO')
            <a href="{{ route('abonado', ['id' => $codigo]) }}">     <img src="{{ url('/images/icons/ta.png') }}" alt="" class="img-fluid" style="width: 140%;height: 140%;object-fit: cover;"></a>
            @endif
            @if ($status=='PAGADO')
            <a href="{{ route('abonado2', ['id' => $codigo]) }}">       <img src="{{ url('/images/icons/tr.png') }}" alt="" class="img-fluid" style="width: 140%;height: 140%;object-fit: cover;"></a>
            @endif
            @endif
            @if ($raiz == 3)
            @if ($status=='DISPONIBLE')
            <a href="{{ route('pago', ['id' => $codigo]) }}">        <img src="{{ url('/images/icons/torreverde.png') }}" alt="" class="img-fluid" style="width: 140%;height: 140%;object-fit: cover;"> </a>
            @endif
            @if ($status=='RESERVADO')
            <a href="{{ route('abonado', ['id' => $codigo]) }}">     <img src="{{ url('/images/icons/torreamarilla.png') }}" alt="" class="img-fluid" style="width: 140%;height: 140%;object-fit: cover;"></a>
            @endif
            @if ($status=='PAGADO')
            <a href="{{ route('abonado2', ['id' => $codigo]) }}">       <img src="{{ url('/images/icons/torreroja.png') }}" alt="" class="img-fluid" style="width: 140%;height: 140%;object-fit: cover;"></a>
            @endif
            @endif
        </div>

    </div>
    @if ($raiz == 0)
    <div class="inner" style="margin-left: 30px">
    @endif
    @if ($raiz == 3)
    <div class="inner" style="margin-left: 40px">
    @endif
    @if ($raiz == 5)
    <div class="inner" style="margin-left: 16px">
    @endif
        <h5 style ="font-size:14px;">{{$nombre}}</h5>
    </div>
</div>

<style>
   .inner {
  margin-left: 60px; /* Estilo para móviles */
}

/* Media query para pantallas de escritorio (ancho mínimo de 768px, por ejemplo) */
@media (min-width: 768px) {
  .inner {
    margin-left: 120px; /* Estilo para escritorio */
  }
}
  </style>
