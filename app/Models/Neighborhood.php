<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

// models
use App\Models\State;

class Neighborhood extends Model
{
    use SoftDeletes , HasTranslations , DateFormatTrait  ,ActiveTrait;

    protected $table = 'neighborhoods';
    protected $fillable = ['name','city_id', 'status'];

    public $translatable = ['name'];

    // relation
    public function city() {
        return $this->belongsTo(City::class , 'city_id')->withTrashed();
    }

    // scopes
    public function scopeCountry($query , $country_id) {
        if($country_id != -1 && !empty($country_id) && !is_null($country_id)) {
            $query->whereHas('city' ,function ($query2) use($country_id){
                $query2->where('country_id' , '=' ,$country_id );
            });
        }
    }
    public function scopeCity($query , $city_id) {
        if($city_id != -1 && !empty($city_id) && !is_null($city_id)) {
            $query->where('city_id' , '=' , $city_id);
        }
    }
}
