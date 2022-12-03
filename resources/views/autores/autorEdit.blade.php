<x-layout-autor>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Editar Autor</h1>
                <p class="lead fw-normal text-white-50 mb-0"></p>
            </div>
        </div>
    </header>
    <div class="container">
        <form action="/prestamos/{{ $autor->id }}" method = "post" enctype="multipart/form-data">
            @csrf
            @metho('patch')
            <div class="col-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Gabriel Garcia Marquez" aria-label="Gabriel Garcia Marquez" >
                    @error('nombre')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <label class="form-label" for="foto"></label>
                    <input class="form-control form-control-lg" type="file" id="foto" name="foto" >
                    @error('foto')
                        <i>{{ $message }}</i>
                    @enderror
                </div>
            </div>
            </div>
            <div class="col-6"> 
                <button class="btn btn-outline-dark center" type="submit" value="Solicitar">
                    Editar
                </button>
            </div>
        </form>
    </div>
</x-layout-autor>