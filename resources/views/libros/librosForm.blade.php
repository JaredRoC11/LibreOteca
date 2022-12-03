<x-layout-libros>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Agregar libro</h1>
                <p class="lead fw-normal text-white-50 mb-0">"Nuestras vidas se definen por las oportunidades incluso las que perdemos”</p>
            </div>
        </div>
    </header>
    <br>
    <div class="container">
        <form action="/libro" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="input-group mb-3">
                <label class="input-group-text" for="ISBN">ISBN</label>
                <input type="text" name="ISBN" id="ISBN" value="{{ old('ISBN') }}" class="form-control" placeholder="7419638524569" aria-label="7419638524569" >
                @error('ISBN')
                    <i>{{ $message }}</i>
                @enderror
                <label class="input-group-text" for="nombreLibro">Libro</label>
                <input type="text" name="nombreLibro" id="nombreLibro" value="{{ old('nombreLibro') }}" class="form-control" placeholder="El principito" aria-label="El principito" >
                @error('nombreLibro')
                    <i>{{ $message }}</i>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="form-floating">
                    <select class="form-select" name="autor_id" id="autor_id">
                        @foreach ($autores as $autor)
                            <option value="{{ old('autor_id') ?? $autor->id }}">{{ $autor->nombre }} </option>
                        @endforeach
                    </select>
                    <label for="autor_id">Elige Autor</label>
                    @error('autor_id')
                        <i>{{ $message }}</i>
                    @enderror
                    <span>No esta el autor?</span>
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <a href="/autor/create">Añadir</a>
                    </button>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">  
                    <label class="input-group-text" for="nombreEditorial">Editorial</label>
                    <input type="text" name="nombreEditorial" id="nombreEditorial" value="{{ old('nombreEditorial') }}" class="form-control" placeholder="Minotauro" aria-label="Minotauro" >
                    @error('nombreEditorial')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="existencia Prestamo">Existencia para Prestamo</label>
                <input type="number" name="existenciaPrestamo" id="existenciaPrestamo" value="{{ old('existenciaPrestamo') }}" >
                @error('existenciaPrestamo')
                    <i>{{ $message }}</i>
                @enderror
                <label class="input-group-text" for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" value="{{ old('categoria') }}" class="form-control" placeholder="Aventura" aria-label="Aventura" >             
                @error('categoria')
                    <i>{{ $message }}</i>
                @enderror
            </div>
            <div class="form-floating">
                <textarea class="form-control" id="descripcion" name="descripcion"  value="{{ old('descripcion') }}"></textarea>
                <label for="floatingTextarea">Descripcion</label>
                @error('descripcion')
                    <i>{{ $message }}</i>
                @enderror
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <label class="form-label" for="portada"></label>
                    <input class="form-control form-control-lg" type="file" id="portada" name="portada" >
                    @error('portada')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <button class="btn btn-outline-dark" type="submit" value="Agregar">
                Enviar
            </button>
        </form>
    </div>
</x-layout-libros>