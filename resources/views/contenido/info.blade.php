<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>  
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Info</title>
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('storage/scss/detalles.scss') }}">
        <link rel="stylesheet" href="{{ asset('storage/css/colores.css') }}">
        <style>
            .label-container {
                position: relative;
                display: inline-block;
            }
    
            .edit-button {
                position: absolute;
                right: -30px;
                top: 50%;
                transform: translateY(-50%);
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                display: none;
            }

            .edit-button-image {
                position: absolute;
                right: 42.7%;
                top: 50%;
                transform: translateY(-50%);
                background-color: #007bff;
                color: #fff;
                width: 15%;
                height: 30%;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                display: none;
            }
    
            .label-container:hover .edit-button {
                display: block;
            }

            .label-container:hover .edit-button-image {
                display: block;
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
        <script src="https://cdn.tiny.cloud/1/m1gf1xkto27pviq7pzbrfrhliplmnmxjl13dxschl5gg0rbt/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>  
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

    <!-- CONTENIDO -->
        <main class="container">     
            <div class="p-4 p-md-5 mb-4 row rounded text-body-emphasis bg-body-secondary">
                
                <div class="col-lg-7 px-0">
                    <span class="label-container p-1">
                        <h1 class="display-4 fst-italic" id="editableLabel">{{ $contenido->etiqueta }}</h1>
                        @auth <button class="edit-button" data-toggle="modal" data-target="#editModal">&#9998;</button> @endauth
                    </span>
                    <span class="lead my-3 label-container">
                        <span id="editableLabel1">{{ $contenido->resumen }}</span>
                        @auth <button class="edit-button" data-toggle="modal" data-target="#editModal1">&#9998;</button> @endauth
                    </span> 
                </div>

                <div class="col-lg-5 px-0">
                    <span class="label-container">
                        @if($contenido->referencia == "...")
                            <svg class="bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>
                        @else
                            <img src="{{ asset('storage/fotos/' . $contenido->referencia) }}" class="rounded mx-auto d-block img-fluid w-50" id="editableLabel2" alt="Cargando">
                        @endif
                        
                        
                        @auth <button class="edit-button-image" data-toggle="modal" data-target="#editModal2">&#9998;</button> @endauth
                    </span>
                </div>  

            </div>
            
            <div class="row g-5">
                <div class="col-md-8">
                    <article class="blog-post">
                        <span class="label-container">
                            <h2 class="display-5 link-body-emphasis mb-1" id="editableLabel3">{{ $contenido->titulo }}</h2>
                            @auth <button class="edit-button" data-toggle="modal" data-target="#editModal3">&#9998;</button> @endauth
                        </span> 
                        
                        <p class="blog-post-meta">Created at {{ $contenido->created_at->format('F j, Y') }} by <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">{{ $contenido->email }}</a></p>

                        <form action="{{ route('new-contenido') }}" method="POST">
                            @csrf
                            <textarea name="contenido" id="contenido">{{ $contenido->contenido }}</textarea>
                            @auth
                                <div class="d-flex justify-content-end">
                                    <p class="blog-post-meta"> Update at {{ $contenido->updated_at->format('F j, Y') }}</p>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
                                    <button type="submit" class="btn btn-secondary my-3">Guardar cambios</button>
                                </div>
                            @endauth
                        </form>
                            


                    </article>

                </div>

                <div class="col-md-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="p-4 mb-3 bg-body-tertiary rounded">
                            <h4 class="fst-italic">Índice</h4>
                            <span class="label-container">
                                <p class="mb-0" id="editableLabel4">{{ $contenido->indice }}</p>
                                @auth <button class="edit-button" data-toggle="modal" data-target="#editModal4">&#9998;</button> @endauth
                            </span>
                        </div>

                         

                        <div>
                        <h4 class="fst-italic">Posts recientes</h4>
                        <ul class="list-unstyled">
                            
                            <!-- AQUI SE APLICA EL ALGORITMO DE LOS MAS RECIENTES -->
                            @foreach($recientes as $articulo)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="/info/{{ $articulo->etiqueta }}">
                         
                                        @if($articulo->referncia != "...")
                                            <svg class="bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                <img src="{{ asset('storage/fotos/' . $articulo->referencia) }}" class="figure-img img-fluid rounded" style="width:20%" alt="Cargando">
                                            </svg>
                                        @else
                                            <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                <rect width="100%" height="100%" fill="#777"></rect>
                                            </svg>
                                        @endif
                                        
                                        

                                        <div class="col-lg-8">
                                        <h6 class="mb-0">{{ $articulo->etiqueta }}</h6>
                                        <small class="text-body-secondary">{{ $contenido->updated_at->format('F j, Y') }}</small>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                        </div>

                    </div>
                </div>
            </div>

        </main>

    <!-- FINAL -->
        <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
            <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </footer>
        


@auth
    <!-- Modal para la edición 1 - ETIQUETA -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="post" action="{{ route('new-etiqueta') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Etiqueta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="etiqueta" id="editedText" class="form-control" value="{{ $contenido->etiqueta }}">
                        <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="hidden" class="btn btn-primary" id="saveButton">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal para la edición 2 - RESUMEN -->
        <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="post" action="{{ route('new-resumen') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Resumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="resumen" id="editedText" class="form-control" value="{{ $contenido->resumen }}">
                        <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="hidden" class="btn btn-primary" id="saveButton">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        
    <!-- Modal para la edición 3 - PERFIL -->
        <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form class="modal-content" method="post" action="{{ route('new-perfil') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Actualizar Imagen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="file" name="foto" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="hidden" class="btn btn-primary" id="saveButton">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal para la edición 4 - TITULO -->
        <div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="post" action="{{ route('new-titulo') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Título</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="titulo" id="editedText" class="form-control" value="{{ $contenido->titulo }}">
                        <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="hidden" class="btn btn-primary" id="saveButton">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    
    <!-- Modal para la edición 5 - INDICE -->
        <div class="modal fade" id="editModal4" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" method="post" action="{{ route('new-indice') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Índice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="container ">
                            <div class="row">
                              <div class="col">
                                <label for="itemInput">Ingresa un elemento:</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="itemInput" placeholder="Elemento">
                                  <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="addItem">Agregar</button>
                                  </div>
                                </div>
                                
                                <ol class="list-group" id="itemList">
                                    @php $cadena = $contenido->indice; $lista = explode(",", $cadena); $contador = 1; @endphp
                                    @foreach($lista as $tema)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">{{ $contador }}. {{ $tema }}<button class="btn btn-danger btn-sm delete-button">Eliminar</button></li>
                                    @php $contador += 1; @endphp
                                    @endforeach
                                </ol>
                                
                                <input type="text" name="indice" class="form-control" id="outputValue" hidden>
                                
                                <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>

                              </div>
                            </div>
                          </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="hidden" class="btn btn-primary" id="saveButton">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

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
                                    <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
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
                                    <input type="text" name="codigo" value="{{ $contenido->id }}" hidden>
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
    

@auth
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'autoresize anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
        });
    </script>
@else
    <script>
        tinymce.init({
            selector: 'textarea',
            toolbar: false, // Desactivar la barra de herramientas
            menubar: false, // Desactivar la barra de menú
            plugins: ['autoresize'], // No cargar ningún plugin adicional
            readonly: true, // Configurar el editor en modo de solo lectura
            
        });
    </script>
@endauth


    <!-- SCRIPTS EXTERNOS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
    <!-- AGREGA ELEMENTOS A LA LISTA - INDICE -->
        <script>
            $(document).ready(function () {
            $(".delete-button").click(function () {
                $(this).closest("li").remove();
                updateOutputValue();
            });
            
            $("#addItem").click(function () {
                var newItem = $("#itemInput").val().trim();
                if (newItem !== "") {
                var itemCount = $("#itemList li").length + 1; // Obtener el número de elementos actual
                var li = $("<li>", {
                    class: "list-group-item d-flex justify-content-between align-items-center",
                    text: itemCount + ". " + newItem
                });
                
                var deleteButton = $("<button>", {
                    class: "btn btn-danger btn-sm delete-button",
                    text: "Eliminar"
                }).click(function () {
                    $(this).closest("li").remove();
                    updateOutputValue();
                });
                
                li.append(deleteButton);
                $("#itemList").append(li);
                $("#itemInput").val("");
                updateOutputValue();
                }
            });
            
            function updateOutputValue() {
                var items = [];
                $("#itemList li").each(function () {
                    var text = $(this).text().substring(3); // Eliminar la numeración
                    items.push(text.replace("Eliminar", "").trim()); // Eliminar la palabra "Eliminar" si existe

                });
                $("#outputValue").val(items.join(", "));
            }

            updateOutputValue();
            
            });
        </script>
    </body>

</html> 