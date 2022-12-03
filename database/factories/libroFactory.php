<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class libroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       
        /*$libro = Libro::create([
            'ISBN' => $this->faker->isbn13(),
            'nombreLibro' => $this->faker->unique->text(10),
            'nombreEditorial' => $this->faker->company(),
            'existenciaPrestamo' => $this->faker->numberBetween(0, 100),
            'existenciaVenta' => $this->faker->numberBetween(0, 200),
            'descripcion' => $this->faker->text(200),
            'categoria' => $this->faker->word(),
            'precio' => $this->faker->randomFloat(1, 100, 1000),
            'rutaImagen' => "public/".$this->faker->numberBetween(1, 5).".jpg",
        ]);

         $autor = Autor::firstOrCreate([
            'nombre' => $this->faker->name(),
        ]);
        $libro->autores()->attach($autor->id);
        return $libro;
        */    

        return [
            'ISBN' => $this->faker->isbn13(),
            'nombreLibro' => $this->faker->unique->text(10),
            'nombreEditorial' => $this->faker->company(),
            'existenciaPrestamo' => $this->faker->numberBetween(0, 100),
            'descripcion' => $this->faker->text(200),
            'categoria' => $this->faker->randomElement(['Terror', 'Aventura', 'Ciencia Ficcion', 'Novela', 'Cientifico']),
            'rutaImagen' => "public/portadas/".$this->faker->numberBetween(1, 5).".jpg",
        ]; 
    }
}
