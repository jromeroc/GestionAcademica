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
        {{ HTML::style('css/jquery-ui-1.10.4.custom.css') }}
        {{ HTML::style('css/estilos.css') }}
        {{ HTML::style('css/estructura.css') }}
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" id="bartop">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#principal-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Colegio Colombo Hebreo</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
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

        <!-- Container -->
        <div class="container-fluid"></div>
            <div id="main" class="row">
                @if ( !Auth::guest() )
                <section class="col-sm-3 col-md-2 sidebar">
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <div class="nav-collapse" id="principal-menu">
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
                <section class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
                                <div class="navbar navbar-default" role="navigation">
                                    <ul class="nav nav-pills">
                                        @foreach ($drawsubmenu as $subitem)
                                        <li><a href="{{{ URL::to(Request::segment(1))}}}/{{ $subitem['url'] }}">{{ $subitem['name_item'] }}</a></li>   
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @yield('content')
                        </article>
                    </section>
            </div>
        </div>

        <script type="text/javascript">
            var root = <?php echo "'http://".$_SERVER['HTTP_HOST']."/'";?>;
        </script>

        <!-- Scripts -->
<<<<<<< HEAD
<<<<<<< HEAD
        {{ HTML::script('js/jquery-1.11.0.js') }}
        {{ HTML::script('js/jqueryui-1.1.4.js') }}
=======
        {{ HTML::script('js/jquery-1.10.2.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4.custom.min.js') }}
>>>>>>> b4a7ca0b8015491b638e3e91fa271adeff4ef2ab
=======
        {{ HTML::script('js/jquery-1.10.2.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4.custom.min.js') }}
>>>>>>> b4a7ca0b8015491b638e3e91fa271adeff4ef2ab
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/general.js') }}

        @yield('scripts')
    </body>
</html>