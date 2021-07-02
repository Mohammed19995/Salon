<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\GalleryType;

class GalleryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        GalleryType::create([
            'name' => getMultiLangField("عام") ,
            'key' => 'general'
        ]);
        GalleryType::create([
            'name' => getMultiLangField("المستخدمين") ,
            'key' => 'users'
        ]);
        GalleryType::create([
            'name' => getMultiLangField("مديري النظام") ,
            'key' => 'admins'
        ]);
        GalleryType::create([
            'name' => getMultiLangField("التصنيفات") ,
            'key' => 'categories'
        ]);
        GalleryType::create([
            'name' => getMultiLangField("الدول") ,
            'key' => 'countries'
        ]);
    }
}
