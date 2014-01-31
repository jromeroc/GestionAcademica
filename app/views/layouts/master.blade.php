<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            @section('title')
            Colegio colombo hebreo
            @show
        </title>

        <!-- CSS -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-responsive.css') }}
        {{ HTML::style('css/jquery-ui-1.10.3.custom.css') }}
        {{ HTML::style('css/estilos.css') }}
    </head>

    <body>
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" id="bartop">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target="#principal-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Colegio Colombo Hebreo</a>
                    <div class="nav pull-right">
                        <ul class="nav">
                            @if ( Auth::guest() )
                            <li>{{ HTML::link('login', 'Iniciar sesión') }}</li>
                            @else
                            <li>{{ HTML::link('', 'Perfil') }}</li>
                            <li>{{ HTML::link('logout', 'Cerrar sesión') }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container -->
        <div id="main" class="row">
            @if ( !Auth::guest() )
            <section class="span3">
                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <div class="nav-collapse collapse" id="principal-menu">
                    <ul class="nav nav-tabs nav-stacked">
                        <?php
                        $control = Request::segment(1);
                        if ($control)
                        {
                            $menu = new Menu;
                            $idmenu = $menu->idMenu($control);
                            $submenu = new Submenu();
                            $drawsubmenu = $submenu->filterlist($idmenu);
                        }

                        $permisos_role = new PermisosRole();
                        $permisos = $permisos_role->permisoRole();
                        ?>
                        @foreach($permisos as $item)
                        <li><a href="{{{ URL::to($item['url'])}}}">{{$item['item_name']}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Success-Messages -->
                @if ($message = Session::get('ok'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Sesión iniciada</h4>
                    {{{ $message }}}
                </div>
                @endif
            </section>
            <section class="span9">
                @else
                <section class="container">
                    @endif

                    <!-- Contenido -->
                    <article>
                        <div class="page-header">
                            @yield('modulo')
                        </div>
                        @if(isset($drawsubmenu))
                        <div>
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <ul class="nav">
                                        @foreach ($drawsubmenu as $subitem)
                                        <li><a href="{{{ URL::to(Request::segment(1))}}}/{{ $subitem['url'] }}">{{ $subitem['name_item'] }}</a></li>   
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <ul>

                            </ul>
                        </div>
                        @endif
                        @yield('content')
                    </article>
                </section>
        </div>

        <script type="text/javascript">
            var root = <?php echo "'http://".$_SERVER['HTTP_HOST']."/'";?>;
        </script>

        <!-- Scripts -->
        {{ HTML::script('js/jquery-1.9.1.js') }}
        {{ HTML::script('js/jqueryui.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/general.js') }}

        @yield('scripts')
    </body>
</html>