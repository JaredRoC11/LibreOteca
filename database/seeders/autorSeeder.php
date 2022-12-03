<?php

namespace Database\Seeders;

use App\Models\Autor;
use Illuminate\Database\Seeder;
use Database\Factories\autorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class autorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autor::create([
            'nombre' => 'J.R.R Tolkien',
            'rutaFoto' => 'public/autores/tolkien.jpg'
        ]);

        Autor::create([
            'nombre' => 'G.R.R Martin',
            'rutaFoto' => 'public/autores/martin.jpg'
        ]);

        Autor::create([
            'nombre' => 'Sthepen King',
            'rutaFoto' => 'public/autores/sthepen.jpg'
        ]);

        Autor::create([
            'nombre' => 'Gabriel Garcia Marquez',
            'rutaFoto' => 'public/autores/garciaMarquez.jpg'
        ]);

        Autor::create([
            'nombre' => 'Agatha Christie',
            'rutaFoto' => 'public/autores/christie.jpg'
        ]);
        Autor::factory(10)->create();
    }
}
