<?php

namespace Database\Seeders;

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
        $this->call([
            AdminSeeder::class,
            GalleryTypeSeeder::class,
            CurrencySeeder::class,
            CountrySeeder::class
//            PermissionSeeder::class ,
        ]);
    }
}
