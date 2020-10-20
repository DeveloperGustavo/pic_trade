<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create(['description' => 'admin']);
        Perfil::create(['description' => 'common']);
    }
}
