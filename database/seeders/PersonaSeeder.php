<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_AR'); 

        for ($i = 0; $i < 20; $i++) {
          $nombre = $faker->firstName;
          $email = strtolower($nombre) . rand(1, 1000) . '@correo.com';

            DB::table('personas')->insert([
                'nombre' =>  $nombre,
                'apellido' => $faker->lastName,
                'documento_identidad' => $this->generateDNI(),
                'email' => $email,
                'telefono' => $this->generateTelefono(),
                'tipo_persona' => $faker->randomElement(['Residente', 'Visitante']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateDNI()
    {
      return rand(1000000, 99999999);
    }

    private function generateTelefono()
    {
      return '+54 9 ' . rand(11, 99) . ' ' . rand(10000000, 99999999); 
    }
}
