<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Libros - LibreOteca</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        @vite(['resources/css/styles.css']);
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">LibreOteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/libro">Libros</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/autor">Autores</a></li>
                        <li class="nav-item"><a class="nav-link" href="/prestamos">Mis prestamos</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <button class="btn btn-outline-dark" type="submit">
                                                    <i class="bi bi-box-arrow-right"></i>
                                                    Salir
                                                    <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                                    @if (Route::has('register'))
                                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                    @endif
                            @endauth
                        @endif
                        
                    </ul>
                    @if (Route::has('login'))
                        @auth
                            <ul class="navbar-nav  mb-2 mb-lg-0 ms-lg-4">
                                @if( Auth::user()->id == 1 and Auth::user()->email == 'admin@admin.com')
                                    <li class="nav-item"><a class="nav-link" href="/libro/create">Agregar Libro</a></li>
                                @endif
                            </ul>
                        @endauth
                    @endif
                    
                </div>
            </div>
        </nav>
         <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Bienvenido a la LibreOteca</h1>
                    <p class="lead fw-normal text-white-50 mb-0">???No todo lo que es de oro reluce, ni toda la gente errante anda perdida???.</p>
                </div>
            </div>
        </header>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h4 class="display-4 fw-bolder text-center">Libros mas populares</h4>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($libros as $libro)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{\Storage::url( $libro->rutaImagen) }}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$libro->nombreLibro}}</h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>                              
                                        @foreach ($libro->autores as $autor)
                                            <h6 class="fw-bolder">{{ $autor->nombre }}</h5>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/libro/{{ $libro->id }}">Ver</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Website Jared 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
    </body>
</html>