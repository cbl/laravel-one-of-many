<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Login;
use App\Models\Price;
use App\Models\State;
use App\Models\Product;
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
        User::factory()
            ->count(100)
            ->has(State::factory(30))
            ->has(Login::factory(30))
            ->create();

        Product::factory()
            ->count(100)
            ->has(Price::factory(30))
            ->create();
    }
}
