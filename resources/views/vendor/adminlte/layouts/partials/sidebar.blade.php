<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background-color: {{$array_color['menu_color']}};">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                  <!--  <img src="{{-- Gravatar::get($user->email) --}}" class="img-circle" alt="User Image" /> -->
                    @if (Auth::user()->avatar == 'default.jpg' || is_null(Auth::user()->avatar))
                        <img src="{{ url('/storage/avatars/default.jpg') }}" class="img-circle" alt="User Image"/>
                    @else
                        <img src="{{ url('/storage/avatars/'.Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('/dashboard') }}"><i class='fa fa-link'></i> <span>Inicio</span></a></li> 
            <li><a href="{{ url('/dashboard1') }}"><i class='fa fa-link'></i> <span>Lanceros</span></a></li> 
            <li><a href="{{ url('/dashboard2') }}"><i class='fa fa-link'></i> <span>Centauro</span></a></li> 
            <li><a href="{{ url('/dashboard3') }}"><i class='fa fa-link'></i> <span>Coleadores</span></a></li> 
            <li><a href="{{ url('/dashboard4') }}"><i class='fa fa-link'></i> <span>General</span></a></li> 
            <li><a href="{{ url('/participante') }}"><i class='fa fa-link'></i> <span>Participante</span></a></li> 
            <li class="treeview">
             
               
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
