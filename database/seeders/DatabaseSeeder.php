<?php
namespace Database\Seeders;

use App\Models\Account;
use App\Models\CreditCard;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                PerfilsTableSeeder::class,
                UsersTableSeeder::class,
            ]
        );
        User::factory(100)->create();
        Account::factory(100)->create();
        CreditCard::factory(100)->create();
        Transaction::factory(1000)->create();
    }
}
