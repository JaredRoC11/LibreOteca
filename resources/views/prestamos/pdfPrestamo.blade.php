<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Detalles del prestamo</h1>
                <p class="lead fw-normal text-white-50 mb-0">"Los dioses nos envidian. nos envidian porque somos mortales, porque cada instante nuestro podría ser el último. todo es más hermoso porque hay un final."</p>
            </div>
        </div>
    </header>
            
       
        <h6>Prestamo realizado por: {{ $prestamo->user->name }}</h6>
        <h6>{{ $prestamo->fechaPrestamo }}</h6>
        <h6>{{ $prestamo->fechaDevolucion }}</h6>
        <h6>{{ $prestamo->libro->nombreLibro }}</h6>
    </div>
</body>
</html>
     