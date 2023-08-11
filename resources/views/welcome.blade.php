<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

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
        </style>

        <!-- LIBRERIAS EXTERNAS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
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

        
      <!-- PRESENTACION - concisa y comprimida -->
        <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
            <div class="container">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                  <div class=" text-center">

                    <div class="card-header">
                      <img src="{{ asset('storage/fotos/oficial/portada.png') }}" class="redimencionar01" alt="Cargando"><br/><br/>
                    </div>
                    
                    <div class="card-body">
                      <h5 class="card-title">Componentes, Herramientas <br/> y software de todo tipo</h5>
                      <p class="card-text">En este sitio web se encuentras gran variedad de componentes <br/> pertenecientes placas electrónicas, de las más pequeñas hasta <br/> las más grandes.  </p>
                    </div>

                    <!-- <div class="card-footer text-body-secondary">2 days ago</div> -->

                  </div>
                </div>
            </div>
        </div>  <br/><br/>


      <!-- CONTENIDO - muestra las cartitas -->
        <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
          
          <!-- BARRA DE BUSQUEDA -->
          <div class="container">
              <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class=" text-center">
                  
                  <div class="card-header">
                    Encuentras el componente que estás buscando...
                  </div>
                  
                  
                  <div class="card-header">
                    <div class="d-flex align-items-center justify-content-center">
                      <form class="d-flex input-group search-container redimencionar05" role="search" method="get" action="{{ url('/')}}">
                        <input type="search" name="valor" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1"><ul class="search-results"></ul>
                    
                        <span class="input-group-text" id="basic-addon1">
                          <button class="btn" aria-hidden="true">
                              <img src="{{ asset('storage/fotos/oficial/lupa.png') }}" alt="perfil" class="redimencionar04">
                          </button>
                        </span> 

                      </form>
                    </div>
                    
                  </div>

                </div>
              </div>
          </div>

         <!-- CARTITAS -->
          <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
            <div class="container">
              
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                  @if(isset($valor))
                    <!-- TENDRÁ UN ESTADO DE 1 -->
                    <!-- ESTO INDICA QUE LA BARRA DE BUSQUEDA SI A SIDO UTILIZADA Y YA TIENE DATOS DE ENTRADA -->
                      <div class="container px-4 py-5" id="featured-3">
                        <div class="card-header">
                          <h4>{{ $resumenes->count() }} Resultados para <strong>'{{ $valor }}'</strong></h4>
                        </div>

                        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

                        
                          <!-- AQUÍ SE APLICA UN SISTEMA DE LOS MÁS RECOMENDADOS, OK?? -->
                          <!-- RECUERDALO - IMPORTANTE -->
                          @foreach ($resumenes as $componente)
                            <div class="feature col">
                              <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">  
                                <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
                              </div>
                              <h3 class="fs-2 text-body-emphasis">{{ $componente->titulo }}</h3>
                              <p>{{ $componente->resumen }}</p>
                              <a href="{{route('info', $componente->etiqueta)}}" class="icon-link">
                                Mostrar más
                              </a>
                            </div>
                          @endforeach

                        </div>
                      </div>
                  @else
                    <!-- TENDRÁ UN ESTADO DE 0 -->
                    <!-- ESTO INDICA QUE LA BARRA DE BUSQUEDA NO A SIDO UTILIZADA -->
                      <div class="container px-4 py-5" id="featured-3">
                        <div class="card-header">
                          Se muestra  los componentes comúnmente buscados dentro de la electrónica.
                        </div>

                        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

                          <!-- AQUÍ SE APLICA UN SISTEMA DE LOS MÁS RECOMENDADOS, OK?? -->
                          <!-- RECUERDALO - IMPORTANTE -->
                          @foreach ($resumenes as $componente)
                            <div class="feature col">
                              <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2">  
                              <img src="{{ asset('storage/fotos/' . $componente->referencia) }}" class="figure-img img-fluid rounded" style="width:20%" alt="Cargando">
                              </div>
                              <h3 class="fs-2 text-body-emphasis">{{ $componente->titulo }}</h3>
                              <p>{{ $componente->resumen }}</p>
                              <a href="{{route('info', $componente->etiqueta)}}" class="icon-link">
                                Mostrar más
                              </a>
                            </div>
                          @endforeach

                        </div>
                      </div>
                  @endif
                    


                </div>
            </div>
          </div>

        </div>

      <!-- FINAL -->
        <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
          <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </footer>



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

      <!-- SISTEMA DE BÚSQUEDA -->
        <script>  
          const searchInput = document.querySelector('.search-container input');
          const searchResults = document.querySelector('.search-results');

          const lista = [];

          @foreach($etiquetas as $componente)
            lista.push('{{$componente}}');
          @endforeach

          searchInput.addEventListener('input', function() {
              const searchText = searchInput.value.trim();
              if (searchText === '') {
                  searchResults.innerHTML = '';
                  return;
              }

              // Simulación de resultados de búsqueda
              const results = lista;

              const matchedResults = results.filter(result => result.toLowerCase().includes(searchText.toLowerCase())).slice(0, 5);

              searchResults.innerHTML = '';
              if (matchedResults.length === 0) {
                  searchResults.style.display = 'none';
              } else {
                  searchResults.style.display = 'block';
                  matchedResults.forEach(result => { 
                      const li = document.createElement('li');
                      li.addEventListener('click', function() {
                          searchInput.value = result;
                          searchResults.style.display = 'none';
                      });
                      li.textContent = result;

                      searchResults.appendChild(li);
                  });
              }
          });

          document.addEventListener('click', function(event) {
              if (!searchResults.contains(event.target)) {
                  searchResults.style.display = 'none';
              }
          });
        </script>

      <!-- SCRIPTS EXTERNOS  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
