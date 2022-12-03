<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$CRMHo7gdIdi7mxXxhury.u2.hDyKrkOFf8TMf/m76KEKnfo1w/z.q', // password = administrador
            #'remember_token' => Str::random(10),
        ]);

        User::factory(5)->create();
    }
}
