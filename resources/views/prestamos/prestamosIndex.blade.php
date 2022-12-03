<x-layout-prestamos >
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Mis prestamos</h1>
                <p class="lead fw-normal text-white-50 mb-0">"Los dioses nos envidian. nos envidian porque somos mortales, porque cada instante nuestro podría ser el último. todo es más hermoso porque hay un final."</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="text-center text-muted">Aun no tienes prestamos realizados?</h2>
            <h4 class="text-center text-muted">Solicitar <a href="prestamos/create"> Aqui</a></h4>
            @if(empty(['prestamos']))
                @else
                    @foreach ($prestamos as $prestamo)
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre del libro</th>
                                    <th>Fecha de devolucion</th>
                                    <th>Recibo del prestamo</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th><a href="/prestamos/{{ $prestamo->id }}">{{ $prestamo->libro->nombreLibro }}</a></th>
                                        <th>{{ $prestamo->fechaDevolucion }}</th>
                                        <th>
                                            <a href="/recibo-prestamo/{{ $prestamo->id }}">
                                                <i class="bi bi-file-pdf"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                        </table>
                    @endforeach
            @endif
        </div>
    </section>
</x-layout-prestamos>