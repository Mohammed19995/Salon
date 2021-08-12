<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'key'   => 'place',
            'value'  => ['ar' => 'place' , 'en' => 'المكان']
        ]);
        Setting::create([
            'key'   => 'phone',
            'value'  => ['ar' => '5445454545' , 'en' => '5445454545']
        ]);
        Setting::create([
            'key'   => 'email',
            'value'  => ['ar' => 'salon@gmail.com' , 'en' => 'salon@gmail.com']
        ]);
        Setting::create([
            'key'   => 'facebook',
            'value'  => ['ar' => 'facebook' , 'en' => 'الفيس بوك']
        ]);
        Setting::create([
            'key'   => 'instagram',
            'value'  => ['ar' => 'instagram' , 'en' => 'instagram']
        ]);
        Setting::create([
            'key'   => 'twitter',
            'value'  => ['ar' => 'twitter' , 'en' => 'twitter']
        ]);
        Setting::create([
            'key'   => 'snapchat',
            'value'  => ['ar' => 'snapchat' , 'en' => 'snapchat']
        ]);
        Setting::create([
            'key'   => 'privacy_policy',
            'value'  => ['ar' => 'privacy_policy' , 'en' => 'privacy_policy']
        ]);
        Setting::create([
            'key'   => 'about_us',
            'value'  => ['ar' => 'about_us' , 'en' => 'about_us']
        ]);
        Setting::create([
            'key'   => 'about_app',
            'value'  => ['ar' => 'about_app' , 'en' => 'about_app']
        ]);

    }
}
