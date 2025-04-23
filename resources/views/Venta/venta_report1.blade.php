@extends('adminlte::layouts.app2')


@section('link_css_datatable')
    <link href="{{ url ('/css_datatable/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/buttons.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('main-content')
<div style="overflow: hidden;">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="b">
                <div class="card-body" style="">
                    <?php
                    $filas_pabellones = [
                        [
                            ['nombre' => 'PABELLON AZUL', 'color' => '#4169E1', 'stands' => range(1, 20)],
                            ['nombre' => 'PABELLON VERDE', 'color' => '#008000', 'stands' => range(1, 20)],
                            ['nombre' => 'PABELLON GRIS', 'color' => '#808080', 'stands' => range(1, 20)],
                        ],
                        [
                            ['nombre' => 'PABELLON AMARILLO', 'color' => '#FFD700', 'stands' => range(1, 20)],
                            ['nombre' => 'PABELLON MORADO', 'color' => '#800080', 'stands' => range(1, 20)],
                            ['nombre' => 'PABELLON NARANJA', 'color' => '#FFA500', 'stands' => range(1, 20)],
                        ],
                    ];
                    ?>
                   @foreach ($filas_pabellones as $index => $fila)
                   <div class="row" style="margin-left: 50px; margin-top: {{ $index === 0 ? '10px' : ($index === 1 ? '140px' : '0') }};">
                       @foreach ($fila as $pabellon)
                           <div class="">
                                {{-- <h6 class="" style="color: {{ $pabellon['color'] }};">{{ $pabellon['nombre'] }}</h6> --}}
                               <div class="">
                                   @foreach (array_chunk($pabellon['stands'], 10) as $columna_stands)
                                       <div class="">
                                           @foreach ($columna_stands as $stand)
                                               <button class="btn btn-sm stand-button" style="background-color: {{ $pabellon['color'] }}; color: white;">{{ sprintf('%02d', $stand) }}</button>
                                           @endforeach
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                       @endforeach
                   </div>
               @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('script_datatable')
<script src="{{ url ('/js_datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_delete/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_delete/delete_confirm.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_listado').click(function() {
            var fechaDesde = $('#fecha_desde').val();
            var fechaHasta = $('#fecha_hasta').val();
            var zona = $('#zona_id').val();
            var url = "{{ route('imprimirventas') }}" + "?fecha_desde=" + fechaDesde + "&fecha_hasta=" + fechaHasta + "&zona=" + zona;
            window.location.href = url;
        });

        $('#btn_filtrar').click(function() {
            // Aquí podrías agregar lógica para filtrar los pabellones visualizados
            // según la fecha y la zona seleccionada, si es necesario.
            // Por ahora, este botón no tiene una funcionalidad específica para
            // los botones de los stands.
            console.log('Filtrar botón clickeado (sin funcionalidad implementada para los botones)');
        });
    });
</script>
<style>
      section.content {
        background-image: url("{{ url('/images/icons/feria2.png') }}");
        background-size:  cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
    }

    .pabellon-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 1px solid #ccc; /* Opcional */
        padding: 0px; /* Reducimos el padding */
        width: 100%; /* Ocupa todo el ancho de la columna en pantallas pequeñas */
    }

    @media (min-width: 768px) { /* Para pantallas medianas y más grandes */
        .pabellon-container {
            width: 33.33%; /* Vuelve a tres columnas en pantallas más grandes */

        }
    }

    .stands-grid {
        display: flex;
        flex-wrap: wrap; /* Permite que los botones se envuelvan si es necesario */
        justify-content: center;
        align-items: center;
    }

    .stand-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0px; /* Pequeño margen entre los "botones" rotados */
    }

    .stand-button {
        transform: rotate(90deg) scale(0.5); /* Rotamos y reducimos el tamaño un poco más para pantallas pequeñas */
        text-align: center;
        padding: 2px;
        font-size: 0.7em; /* Reducimos el tamaño de la fuente para pantallas pequeñas */
        transform-origin: center center;
        min-width: 20px;
        min-height: 30px;
        line-height: 0.7;
        margin: 1px; /* Margen individual para los botones rotados */
    }
</style>
@endsection
