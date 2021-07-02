<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Controller;

use App\Http\Resources\General\CountryResource;
use App\Http\Resources\General\SimpleDataResource;
use App\Http\Resources\General\NationalityResource;
use App\Http\Resources\General\IdTypeResource;

use App\Models\City;
use App\Models\Country;
use App\Models\UserType;
use App\Models\Nationality;
use App\Models\SocialStatus;
use App\Models\Government;
use App\Models\IdType;
use App\Models\State;

trait RegisterDataTrait
{
    public function getRegisterData() {
        return  [
            'cities'             => SimpleDataResource::collection(City::Active()->get()) ,
            'phone_codes'        => CountryResource::collection(Country::Active()->get()) ,
        ];

    }
}