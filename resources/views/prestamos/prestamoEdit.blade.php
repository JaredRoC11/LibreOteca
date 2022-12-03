<x-layout-prestamos titulo="Edita Prestamo">
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Edita el prestamo</h1>
                <p class="lead fw-normal text-white-50 mb-0">"Nuestras vidas se definen por las oportunidades incluso las que perdemos”</p>
            </div>
        </div>
    </header>
    <br>
    <div class="container">
        <form action="/prestamos/{{ $prestamo->id }}" method = "post">
            @csrf
            @method("patch")
            <div class="col-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="fechaPrestamo">Fecha del Prestamo</label>
                    <input type="date" name="fechaPrestamo" id="fechaPrestamo" value="{{ old('fechaPrestamo') }}">
                    @error('fechaPrestamo')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="fechaDevolucion">Fecha de Devolucion</label>
                    <input type="date" name="fechaDevolucion" id="fechaDevolucion" value="{{ old('fechaDevolucion') }}">
                    @error('fechaDevolucion')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating">
                    <select class="form-select" name="libro_id" id="libro_id">
                        @foreach ($libros as $libro)
                            <option value="{{ $libro->id }}">{{ $libro->nombreLibro }} </option>
                        @endforeach
                    </select>
                    <label for="libro_id">Elige un libro</label>
                </div>
            </div>
            <div class="col-6"> 
                <button class="btn btn-outline-dark center" type="submit" value="Solicitar">
                    Solicitar
                </button>
            </div>
        </form>
    </div>
</x-layout-prestamos>