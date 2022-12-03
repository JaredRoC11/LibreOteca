<x-layout-autor>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $autor->nombre }}
                    @can('update', $autor)
                        <h6>
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <a href="/autor/{{ $autor->id }}/edit"><i class="bi bi-pencil-fill">Editar</i></a>
                            </button>
                        </h6>
                    @endcan
                </h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    @can('delete', $autor)
                        <form action="/autor/{{ $autor->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <!-- <input type="submit" value="Borrar"> -->
                            <button class="btn- btn-outline-dark " type="submit">
                                <i class="bi bi-trash"></i>
                                Eliminar
                            </button> 
                        </form>
                    @endcan
                </p>
            </div>
        </div>
    </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($autor->libros as $libro)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <div style="width:150; height:200px">
                                    <img style="width:100%; height:100%" class="card-img-top" src="{{\Storage::url( $libro->rutaImagen) }}" alt="{{ $libro->nombreLibro }}" />
                                </div>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $libro->nombreLibro }}</h5>
                                        <!-- Product price-->
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/prestamos/create">Prestamo</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
</x-layout-autor>