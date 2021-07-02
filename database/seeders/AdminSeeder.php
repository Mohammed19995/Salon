<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

// models
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Admin::create([
            'name' => "Admin" ,
            'email' => "admin@admin.com" ,
            'phone_code' => '970' ,
            'phone' => '598149450' ,
            'password' => bcrypt("123456") ,
            'image_id' => null,
            'is_super' => 1 ,
            'verified_at' => Carbon::now()
        ]);

    }
}
