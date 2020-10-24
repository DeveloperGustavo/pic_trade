<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Account::create([
            'agency'            => $faker->unique(true)->numberBetween(0, 9999),
            'account_number'    => $faker->unique(true)->numberBetween(0, 99999),
            'account_dg'        => $faker->numberBetween(0, 10),
            'user_id'           => 1,
        ]);
    }
}
