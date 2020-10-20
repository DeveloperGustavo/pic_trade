<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Gustavo Tavares Barbosa',
            'email' => 'gtbarbosa@live.com',
            'password' => Hash::make('123456'),
            'perfil_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
