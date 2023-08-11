<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('storage/scss/detalles.scss') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/colores.css') }}">
    <style>
          
            /* Para el Sistema de Busqueda - BARRA DE BUSQUEDA */
          
            .search-container {
              position: relative;
            }
            
            .search-results {
            list-style: none; /* Esto elimina las viñetas */
            padding: 0;
            margin: 0;
              position: absolute;
              top: 100%;
              left: 0;
              width: 100%;
              max-height: 200px;
              background-color: #f9f9f9;
              border: 1px solid #ddd;
              border-top: none;
              z-index: 1;
            }
            
            .search-results li {
            
            padding: 4px;
            cursor: pointer;
            }
            
            .search-results li:hover {
            background-color: #e9e9e9;
            }
            
            .floating-button {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
            }

            /* stylelint-disable stylistic/selector-list-comma-newline-after */
            
            .blog-header-logo {
                font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
                font-size: 2.25rem;
                }
            
                .blog-header-logo:hover {
                text-decoration: none;
                }
            
                h1, h2, h3, h4, h5, h6 {
                font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
                }
            
                .flex-auto {
                flex: 0 0 auto;
                }
            
                .h-250 { height: 250px; }
                @media (min-width: 768px) {
                .h-md-250 { height: 250px; }
                }
            
                /* Pagination */
                .blog-pagination {
                margin-bottom: 4rem;
                }
            
                /*
                * Blog posts
                */
                .blog-post {
                margin-bottom: 4rem;
                }
                .blog-post-meta {
                margin-bottom: 1.25rem;
                color: #727272;
                }
            
            
            
              .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
              }
            
              @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                  font-size: 3.5rem;
                }
              }
            
              .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
              }
            
              .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
              }
            
              .bi {
                vertical-align: -.125em;
                fill: currentColor;
              }
            
              .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
              }
            
              .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
              }
            
              .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            
                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
              }
              .bd-mode-toggle {
                z-index: 1500;
              }

                .redimencionar01 {
                    max-width: 15%;
                    max-height: 15%;
                }
                
                .redimencionar02 {
                    max-width: 32px;
                    max-height: 32px;
                }
                
                .redimencionar03 {
                    max-width: 45px;
                    max-height: 45px;
                }
                
                .redimencionar04 {
                    max-width: 19px;
                    max-height: 19px;
                }
                
                .redimencionar05 {
                    max-width: 70%;
                }
                
                
                // ALTERA LA POSICION DE LAS ETIQUETAS login y register
                .login-register {
                    margin: 0px -10px;
                }      
    </style>


    <!-- LIBRERIAS EXTERNAS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

</head>
<body>
    <div id="app">
      @auth <button class="btn btn-primary floating-button btn-md" data-toggle="modal" data-target="#editModal5"><i class="fa fa-plus" aria-hidden="true"></i></button> @endauth
    <!-- NAV-BAR - este es la bara de arriba -->
        <header class="p-3 mb-3 border-bottom navbar-light bg-white shadow-sm">
            <div class="container">
                
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none navbar-brand">
                    <img src="{{ asset('storage/fotos/oficial/portada.png') }}" alt="perfil" class="redimencionar03">
                </a>
                
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a class="nav-link px-2 link-secondary"></a></li>
                    
                    <li><a href="/" class="nav-link px-2 link-body-emphasis">Home</a></li>
                    <li><a href="{{ route('home') }}" class="nav-link px-2 link-body-emphasis">Acerca de</a></li>
                </ul>
                
                <div class="dropdown text-end">
                    <ul class="nav">
                    <!-- Authentication Links -->
                    @guest
                                
                        @if (Route::has('login'))
                            <li class="nav-item login-register">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link login-register" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                
                    @else
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('storage/fotos/oficial/portada.png') }}" alt="perfil" class="rounded-circle redimencionar02">
                        </a>

                        <ul class="dropdown-menu text-small">
                            
                            <li><a class="dropdown-item disabled text-black fs-3">{{ Auth::user()->name }}</a></li>
                            <li><a class="dropdown-item disabled text-black">{{ Auth::user()->email }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajustes</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    @endguest
                    </ul>
                </div>

                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

@auth

    <!-- Modal para la edición 5 - PLANTILLA DEL ARTICULO -->
        <div class="modal fade" id="editModal5" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="post" action="{{ route('new-plantilla') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Añadir Artículo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="editedText1"class=" col-form-label">Etiqueta:</label>
                        <input type="text" name="new-etiqueta" id="editedText1" class="form-control">
                        <input type="email" value="{{ auth()->user()->email }}" name="email" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="hidden" class="btn btn-primary" id="saveButton">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal para la edición 6 - USUARIO - CONTRASEÑA -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar perfil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ route('new-name') }}" method="post">
                            @csrf
                            <h4>Actualizar el Usuario</h4>
                            <div class="mb-3 row">
                                
                                <label for="inputUser" class="col-sm-4 col-form-label">Usuario Actual:</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ auth()->user()->name }}" class="form-control-plaintext" id="inputUser" required>
                                </div>

                                <label for="inputUser" class="col-sm-4 col-form-label">Nueva Usuario:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="usuario" class="form-control" id="inputUser" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>

                        <hr>
                        
                        <form action="{{ route('new-passw') }}" method="post">
                            @csrf
                            <h4>Actualizar la contraseña</h4>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Nueva Contraseña:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="inputPassword" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="confirm-password" class="col-sm-4 col-form-label">Verificar Contraseña:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control confirm-password" id="confirm-password" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                       
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

@endauth

    <!-- SCRIPTS EXTERNOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
