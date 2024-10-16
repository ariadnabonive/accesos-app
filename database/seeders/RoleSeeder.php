<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrador',
                'descripcion' => 'Tiene control total sobre el sistema, puede gestionar usuarios, roles, y configuraciones.',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Residente',
                'descripcion' => 'Usuario que accede a funcionalidades limitadas y puede gestionar su propia información.',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Guardia',
                'descripcion' => 'Usuario encargado de la seguridad y monitoreo de acceso en el sistema.',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
