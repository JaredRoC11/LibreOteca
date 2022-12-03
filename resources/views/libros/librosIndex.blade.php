<x-layout-libros>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Libros</h1>
                <p class="lead fw-normal text-white-50 mb-0">"Los dioses nos envidian. nos envidian porque somos mortales, porque cada instante nuestro podría ser el último. todo es más hermoso porque hay un final."</p>
            </div>
        </div>
    </header>
     <!-- Section-->
     <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($libros as $libro)
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
                                    @foreach ($libro->autores as $autor)
                                        <h6 class="fw-bolder">{{ $autor->nombre }}</h5>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/libro/{{ $libro->id }}">Detalles</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout-libros>