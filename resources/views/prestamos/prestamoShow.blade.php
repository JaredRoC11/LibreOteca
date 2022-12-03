<x-layout-prestamos>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Detalles del prestamo</h1>
                <p class="lead fw-normal text-white-50 mb-0">"Los dioses nos envidian. nos envidian porque somos mortales, porque cada instante nuestro podría ser el último. todo es más hermoso porque hay un final."</p>
            </div>
        </div>
    </header>
   
    <!-- /Poner esto en una nav bar-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <table class="table">
                <thead class="table-dark">
                    <th>ID prestamo</th>
                    <th>Nombre del libro</th>
                    <th>Usuario que lo solicito</th>
                    <th>Fecha del prestamo</th>
                    <th>Fecha de devolucion</th>
                    <th>Devuelto?</th>
                </thead>
                <tbody>
                    <th>{{ $prestamo->id }}</th>
                    <th> {{ $prestamo->libro->nombreLibro }} </th>
                    <th> {{ $prestamo->user->name }} </th>
                    <th>{{ $prestamo->fechaPrestamo }}</th>
                    <th>{{ $prestamo->fechaDevolucion }}</th>
                    @can('update', $prestamo)
                    <th>
                        <a href="/prestamos/{{ $prestamo->id }}/edit">Editar</a> 
                    </th>
                    @endcan
                    @can('delete', $prestamo)
                    <th>
                        <form action="/prestamos/{{ $prestamo->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form>
                    </th>
                    @endcan
                    <th>
                        <div>
                            @if ($prestamo->devuelto == False)
                            <form action="/devuelto/{{ $prestamo->id }}" method = "post">
                                @csrf
                                
                                <span class="switch">
                                    <input id="switch-round" name="devuelto" type="checkbox" value="1">
                                    <label for="switch-round"></label>
                                </span>
                                <input type="submit" value="Devuelto">
                            </form>
                                @else
                                    Si
                            @endif
                        </div>
                    </th>

                </tbody>
            </table>
        </div>
    </section>
</x-layout-prestamos>

