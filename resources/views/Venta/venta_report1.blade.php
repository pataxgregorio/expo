@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
@endsection

@section('link_css_datatable')
    <link href="{{ url ('/css_datatable/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/buttons.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php
                        $pabellones_disposicion = [
                            [
                                'nombre' => 'PABELLON CENTAURO',
                                'color' => '#4169E1',
                                'stands' => range(1, 20),
                            ],
                            [
                                'nombre' => 'PABELLON GENERAL EN JEFE',
                                'color' => '#008000',
                                'stands' => range(1, 22),
                            ],
                            [
                                'nombre' => 'PABELLON COLEADORES',
                                'color' => '#808080',
                                'stands' => range(1, 20),
                            ],
                            [
                                'nombre' => 'PABELLON LANCEROS',
                                'color' => '#FFD700',
                                'stands' => range(1, 20),
                            ],
                            [
                                'nombre' => 'PABELLON ESPIGA',
                                'color' => '#800080',
                                'stands' => range(1, 20),
                            ],
                            [
                                'nombre' => 'PABELLON CATIRE PAEZ',
                                'color' => '#FFA500',
                                'stands' => range(1, 20),
                            ],
                        ];
                        ?>
                        @foreach ($pabellones_disposicion as $pabellon)
                            <div class="col-sm-12 col-md-4 pabellon-container mb-3 d-flex flex-column align-items-center">
                                <h6 class="font-weight-bold text-center" style="color: {{ $pabellon['color'] }};">{{ $pabellon['nombre'] }}</h6>
                                <div class="stands-grid d-flex">
                                    @foreach (array_chunk($pabellon['stands'], 10) as $columna_stands)
                                        <div class="stand-col d-flex flex-column align-items-center">
                                            @foreach ($columna_stands as $stand)
                                                <button class="btn btn-sm stand-button" style="background-color: {{ $pabellon['color'] }}; color: white;">{{ sprintf('%02d', $stand) }}</button>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
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
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
    }

    .pabellon-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ccc; /* Opcional */
        padding: 10px; /* Opcional */
    }

    .stands-grid {
        display: flex;
    }

    .stand-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Eliminamos el margin-right para quitar la separación */
    }

    .stand-button {
        transform: rotate(90deg);
        margin-bottom: 5px;
        text-align: center;
        padding: 5px;
        font-size: 0.8em;
        transform-origin: center center;
        width: auto; /* Ajustamos el ancho */
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 20px; /* Asegura un ancho mínimo */
        min-height: 20px; /* Asegura una altura mínima */
    }
</style>
@endsection
