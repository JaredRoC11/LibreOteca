<x-layout-libros>
     <!-- Header-->
     <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Edita los datos</h1>
                <p class="lead fw-normal text-white-50 mb-0">“No todo lo que es de oro reluce, ni toda la gente errante anda perdida”.</p>
            </div>
        </div>
    </header>
    <br>
    <div class="container">
        <form action="/libro/{{ $libro->id }}" method="post" class="col s12" enctype="multipart/form-data">
            @csrf
            @method("patch")
            <div class="input-group mb-3">
                    <label class="input-group-text" for="ISBN">ISBN</label>
                    <input type="text" name="ISBN" id="ISBN" value="{{ old('ISBN') ?? $libro->ISBN}}" class="form-control" placeholder="7418529634568" aria-label="7418529634568" >
                @error('ISBN')
                    <i>{{ $message }}</i>
                @enderror
                <label class="input-group-text" for="nombreLibro">Libro</label>
                <input type="text" name="nombreLibro" id="nombreLibro" value="{{ old('nombreLibro') ?? $libro->nombreLibro }}" class="form-control" placeholder="El principito" aria-label="El principito">
                @error('nombreLibro')
                    <i>{{ $message }}</i>
                @enderror
            </div>
            <div class="input-group mb-3">
                <div class="form-floating">
                    <select class="form-select" name="autor_id" id="autor_id">
                        @foreach ($autores as $autor)
                            //min 29
                            <option value={{ $autor->id }}>{{ $autor->nombre }} </option>
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
                    <input type="text" name="nombreEditorial" id="nombreEditorial" value="{{ old('nombreEditorial') ?? $libro->nombreEditorial}}" class="form-control" placeholder="Minotauro" aria-label="Minotauro">
                    @error('nombreEditorial')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="existencia Prestamo">Existencia para Prestamo</label>
                <input type="number" name="existenciaPrestamo" id="existenciaPrestamo" value="{{ old('existenciaPrestamo') ?? $libro->existenciaPrestamo}}">
                @error('existenciaPrestamo')
                    <i>{{ $message }}</i>
                @enderror
                <label class="input-group-text" for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" value="{{ old('categoria') ?? $libro->categoria}}" class="form-control" placeholder="Aventura" aria-label="Aventura">             
                @error('categoria')
                    <i>{{ $message }}</i>
                @enderror
            </div>
            <div class="form-floating">
                <textarea class="form-control" id="descripcion" name="descripcion"  value="{{ old('descripcion') ?? $libro->descripcion }}"></textarea>
                <label for="floatingTextarea">Descripcion</label>
                @error('descripcion')
                    <i>{{ $message }}</i>
                @enderror
            <!--<div class="input-group mb-3">
                <label class="input-group-text" for="Portada">Imagen del libro</label>
                <input type="file" class="form-control" id="portada" name="portada">
                @error('portada')
                    <i>{{ $message }}</i>
                @enderror
            </div-->
            <button class="btn btn-outline-dark" type="submit" value="Agregar">
                Enviar
            </button>
        </form>
    </div>
</x-layout-libros>