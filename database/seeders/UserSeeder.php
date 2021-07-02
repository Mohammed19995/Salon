<?php

use App\Models\City;
use App\Models\IdType;
use App\Models\Nationality;
use App\Models\SocialStatus;
use App\Models\State;
use App\Models\Government;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

// models

// Support

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $nationalities = Nationality::pluck('id')->toArray();
        $id_types = IdType::pluck('id')->toArray();
        $social_statuses = SocialStatus::pluck('id')->toArray();
        $states = State::pluck('id')->toArray();
        $governments = Government::pluck('id')->toArray();

        for ($i = 0; $i <= 5; $i++) {
            $state_id = Arr::random($states);
            $city_id = Arr::random(City::where('state_id', '=', $state_id)->pluck('id')->toArray());
            User::create([
                'user_type_id'                     => 1,

                'applicant_name'                   => null,
                'applicant_phone'                  => null,

                'first_name'                       => $faker->name,
                'middle_name'                      => $faker->name,
                'last_name'                        => $faker->name,

                'gender'                           => 1,
                'nationality_id'                   => Arr::random($nationalities),

                'id_type_id'                       => Arr::random($id_types),
                'id_number'                        => rand(1111111111,9999999999),
                'id_statue'                        => 1,
                'expire_id_date'                   => Carbon::now()->addMonth(),

                'social_status_id'                 => Arr::random($social_statuses),
                'number_of_family_members'         => $faker->randomNumber(1),
                'job'                              => $faker->jobTitle,

                'dob'                              => "1995-11-12" ,
                'state_id'                         => $state_id ,
                'city_id'                          => $city_id ,
                'neighborhood'                     => $faker->streetAddress,
                'street'                           => $faker->streetName,
                'home_number'                      => $faker->buildingNumber,
                'build_number'                     => $faker->buildingNumber,
                'postal_code'                      => '966',
                'additional_number'                => rand(1111111111,9999999999),
                'another_person_contact_name'      => $faker->name,
                'another_person_contact_phone'     => rand(1111111111,9999999999),

                'code'                             => "1234" ,
                'verified_at'                      => Carbon::now() ,
                'expire_verified_at'               => null ,

                'name'                             => $faker->name ,
                'email'                            => $faker->email ,
                'phone_code'                       => '966',
                'phone'                            => rand(1111111111,9999999999),
                'password'                         => bcrypt("123456")

            ]);
        }
        for ($i = 0; $i <= 5; $i++) {
            $state_id = Arr::random($states);
            $city_id = Arr::random(City::where('state_id', '=', $state_id)->pluck('id')->toArray());
            User::create([
                'user_type_id'                     => 2,

                'id_number'                        => rand(1111111111,9999999999),
                'id_statue'                        => 1,

                'government_id'                    => Arr::random($governments),

                'code'                             => "1234" ,
                'verified_at'                      => Carbon::now() ,
                'expire_verified_at'               => null ,

                'username'                         => $faker->userName,
                'name'                             => $faker->name ,
                'email'                            => $faker->email ,
                'phone_code'                       => '966',
                'phone'                            => rand(1111111111,9999999999),
                'password'                         => bcrypt("123456")

            ]);
        }
        for ($i = 0; $i <= 5; $i++) {
            $state_id = Arr::random($states);
            $city_id = Arr::random(City::where('state_id', '=', $state_id)->pluck('id')->toArray());
            User::create([
                'user_type_id'                     => 3,

                'id_number'                        => rand(1111111111,9999999999),
                'id_statue'                        => 1,

                'code'                             => "1234" ,
                'verified_at'                      => Carbon::now() ,
                'expire_verified_at'               => null ,

                'company_name'                     => $faker->name ,
                'username'                         => $faker->userName,
                'name'                             => $faker->name ,
                'email'                            => $faker->email ,
                'phone_code'                       => '966',
                'phone'                            => rand(1111111111,9999999999),
                'password'                         => bcrypt("123456")

            ]);
        }
    }
}
