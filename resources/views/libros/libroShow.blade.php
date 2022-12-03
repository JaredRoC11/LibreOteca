<x-layout-libros>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6" style="width:700; height:500px"><img style="width:100%; height:100%" class="card-img-top" src="{{\Storage::url( $libro->rutaImagen) }}" alt="{{ $libro->nombreLibro }}" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">ISBN: {{ $libro->ISBN }}</div>
                    <h1 class="display-5 fw-bolder">{{ $libro->nombreLibro }}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text">{{ $libro->categoria }} | {{ $libro->nombreEditorial }}</span>
                    </div>
                    <div class="fs-5 mb-5">
                        @foreach ($libro->autores as $autor)
                            <a href="/autor/{{ $autor->id }}"><span class="text">{{ $autor->nombre }}</span></a>
                        @endforeach
                    </div>
                    <p class="lead">{{ $libro->descripcion }}</p>
                    <div class="d-flex">
                        @if ($libro->existenciaPrestamo != 0)
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <a href="/prestamos/create"><span >Disponible </span></a>
                            </button>
                            @else
                            <button class="btn btn-outline-dark flex-shrink-0" type="button" disabled>
                                <i class="bi bi-x-square"></i>
                                No Disponible
                            </button>
                        @endif
                        <!-- Actualiza -->
                        @can('update', $libro)
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <a href="/libro/{{ $libro->id }}/edit">Editar</a>
                            </button>
                        @endcan
                        <!-- Elimina -->
                        @can('delete', $libro)
                            <form action="/libro/{{ $libro->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <!-- <input type="submit" value="Borrar"> -->
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="bi bi-trash"></i>
                                    Eliminar
                                </button> 
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-libros>