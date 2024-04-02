@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.home_1') }}
@endsection

@section('contentheader_title')
    <h2 class="mb-4">{{ trans('message.dashboard') }}</h2> 
@endsection

@section('main-content')

 
<div class="row">        
    <div class="col-lg-4 col-md-6 col-xs-12">            
		<x-box titulo="{{ trans('message.dashboard_user.user_allow') }}" cantidad="{{$user_total_activos}}" name="{{ trans('message.dashboard_user.user_allow') }}" color="bg-yellow"></x-box>		
	</div>
	<div class="col-lg-4 col-md-6 col-xs-12">            		
		<x-box titulo="{{ trans('message.dashboard_user.rols_allow') }}" cantidad="{{$total_roles}}" name="{{ trans('message.dashboard_user.rols_allow') }}" ></x-box>
	</div>
	<div class="col-lg-4 col-md-6 col-xs-12">            		
		<x-box titulo="{{ trans('message.dashboard_user.user_deny') }}" cantidad="{{$user_total_Deny}}" name="{{ trans('message.dashboard_user.user_deny') }}" color="bg-red"></x-box>
	</div>
</div>
	<!--  CANVAS de las Metricas Para User, Rol y Notificaciones, para View-->
        <div class="row justify-content-center">
          <div class="col-sm-12 align-self-center">
            <div class="row">
              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading"><b>Total de Solicitudes</b></div>
                  <div class="panel-body" id="contenedor_01">
                    <canvas style="width: 684px; height: 400px;" id="solicitudTotalTipo"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading"><b>Total por Tipo de Solicitudes</b></div>
                  <div class="panel-body" id="contenedor_02">
                    <canvas style="width: 684px; height: 400px;" id="solicitudTipo"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr/>
     
@endsection

@section('script_Chart')
<script src="{{ url ('/js_Chart/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_dashboard/graficos_dashboard.min.js') }}" type="text/javascript"></script>
@endsection
