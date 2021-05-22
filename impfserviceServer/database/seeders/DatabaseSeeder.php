<?php

namespace Database\Seeders;

use App\Models\Vaclocation;
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
        $this->call(VaclocationsTableSeeder::class);
        $this->call(VaceventsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
