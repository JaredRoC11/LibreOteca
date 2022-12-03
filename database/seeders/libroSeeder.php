<?php

namespace Database\Seeders;

use App\Models\Libro;
use Database\Factories\libroFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class libroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Libro::create([
            'ISBN' => '1472583691234',
            'nombreLibro' => 'LOTR La comunidad del anillo',
            'nombreEditorial' => 'Minotauro',
            'existenciaPrestamo' => 15,
            'descripcion' => 'En la adormecida e idílica comarca, un joven hobbit recibe un encargo: custodiar el anillo único y emprender el viaje para su destrucción en las 
            grietas del destino.',
            'categoria' => 'Literatura Fantastica',
            'rutaImagen' => 'public/portadas/comunidadDelAnillo.jpg',
        ]);

        Libro::create([
            'ISBN' => '1472583691235',
            'nombreLibro' => 'LOTR Las dos torres',
            'nombreEditorial' => 'Minotauro',
            'existenciaPrestamo' => 10,
            'descripcion' => 'La Compañía se ha disuelto y sus integrantes emprenden caminos separados. 
            Frodo y Sam continúan solos su viaje a lo largo del río Anduin, perseguidos por la sombra misteriosa de un ser extraño que también ambiciona la posesión del Anillo.',
            'categoria' => 'Literatura Fantastica',
            'rutaImagen' => 'public/portadas/dosTorres.jpg',
        ]);

        Libro::create([
            'ISBN' => '1472583691236',
            'nombreLibro' => 'LOTR El retorno del rey',
            'nombreEditorial' => 'Minotauro',
            'existenciaPrestamo' => 5,
            'descripcion' => 'Los ejércitos del Señor Oscuro van extendiendo cada vez más su maléfica sombra por la Tierra Media. 
            Hombres, elfos y enanos unen sus fuerzas para presentar batalla a Sauron y sus huestes',
            'categoria' => 'Literatura Fantastica',
            'rutaImagen' => 'public/portadas/retornoRey.jpg',
        ]);
        
        Libro::create([
            'ISBN' => '9637418528765',
            'nombreLibro' => 'Cancion de Hielo y fuego I, Juego de tronos',
            'nombreEditorial' => 'Penguin Random House',
            'existenciaPrestamo' => 30,
            'descripcion' => 'En el legendario mundo de los Siete Reinos, lord Stark y su familia se encuentran en el centro de un conflicto que desatará todas las pasiones y la más mortal de las batallas...
            Juego de tronos es el primer volumen de Canción de hielo y fuego.',
            'categoria' => 'Novela',
            'rutaImagen' => 'public/portadas/juegoDeTronos.jpg',
        ]);

        Libro::create([
            'ISBN' => '9637418527654',
            'nombreLibro' => 'Danza de dragones',
            'nombreEditorial' => 'Penguin Random House',
            'existenciaPrestamo' => 12,
            'descripcion' => 'Después de una colosal batalla, el futuro de los Siete Reinos pende de un hilo, acuciado por nuevas amenazas que cobran brío en todos sus rincones.',
            'categoria' => 'Novela',
            'rutaImagen' => 'public/portadas/danzaDragones.jpg',
        ]);
            
        Libro::create([
            'ISBN' => '6549873219516',
            'nombreLibro' => 'La torre oscura',
            'nombreEditorial' => 'Debolsillo',
            'existenciaPrestamo' => 3,
            'descripcion' => 'Última y esperada entrega de la exitosa serie La torre oscura de Stephen King.El último tomo de la épica historia de Roland y sus compañeros.',
            'categoria' => 'Novela Oscura',
            'rutaImagen' => 'public/portadas/torreOscura.jpg',
        ]);

        Libro::create([
            'ISBN' => '9873216549634',
            'nombreLibro' => 'Doce cuentos peregrinos',
            'nombreEditorial' => 'Diana',
            'existenciaPrestamo' => 47,
            'descripcion' => 'Irreales, inquietantes, tocados con el hálito de lo fatal, estos doce relatos son un viaje por diversas ciudades de un mundo que se ve trastocado por la nostalgia, 
            el desarraigo del exiliado o la simple presencia de lo insólito.',
            'categoria' => 'Ficcion',
            'rutaImagen' => 'public/portadas/cuentosPeregrinos.jpg',
        ]);

        Libro::create([
            'ISBN' => '9873216549741',
            'nombreLibro' => 'Diez negritos',
            'nombreEditorial' => 'Booket',
            'existenciaPrestamo' => 14,
            'descripcion' => 'Diez personas que no se han visto nunca son invitadas por un huésped desconocido a pasar unos días de vacaciones en una lujosa mansión situada en una bonita isla de la costa inglesa.',
            'categoria' => 'Novela Policiaca',
            'rutaImagen' => 'public/portadas/negritos.jpg',
        ]);
        Libro::factory(10)->create();
    }
}
