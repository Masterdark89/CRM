<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'Coraima',
            'email' => 'corimedina26@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Carlos0811.'),
        ]);

        $this->call([
            ClientesSeeder::class,
            ProductoSeeder::class,
            ProveedorSeeder::class,
            EmpleadoSeeder::class,
            FacturaSeeder::class,
            IncidenciaSeeder::class,
        ]);
    }
}
