@include('laravelpwa::meta')
{{-- @include('adminlte::layouts.partials.html_landing') --}}
<section>
    <div style="text-align: center;">
        <h1><b>Usted no esta conectado a (Internet)</b></h1>
    </div>
    <div style="text-align: center;">
        <h1>Consulte con su Administrador de Sistemas.</h1>
    </div>    
    <div style="text-align: center;">
        <h1>Gracias.</h1>
    </div>
</section>
    <!-- Fixed navbar -->
@include('adminlte::layouts.partials.nav')
    <!-- Fin de la barra de navegación fija -->
    <!--==========================
    Intro Section
    ============================-->
@include('adminlte::layouts.partials.section_landing')



 {{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

<!--    <h1>You are currently not connected to any networks.</h1> -->

{{-- @endsection --}}