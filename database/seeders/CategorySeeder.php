<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $galleries = \App\Models\Gallery::pluck('id')->toArray();
        for ($i = 0; $i<1000;$i++) {
            Category::create([
                'name' => [
                    'ar' => $faker->name,
                    'en' => $faker->name,
                ],
                'description' => [
                    'ar' => $faker->paragraph,
                    'en' => $faker->paragraph,
                ],
                'parent_id' => null ,
                'image_id' => \Illuminate\Support\Arr::random($galleries),
            ]);
        }

    }
}
