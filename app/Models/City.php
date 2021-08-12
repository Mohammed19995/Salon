<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use SoftDeletes , HasTranslations , DateFormatTrait  ,ActiveTrait;

    protected $table = 'cities';
    protected $fillable = ['name','country_id', 'status'];

    public $translatable = ['name'];

    // relation
    public function country() {
        return $this->belongsTo(Country::class , 'country_id');
    }

    public function salons()
    {
        return $this->hasMany(Salon::class, 'city_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }
    // scopes
    public function scopeCountry($query , $country_id) {
        if($country_id != -1 && !empty($country_id) && !is_null($country_id)) {
            $query->where('country_id' , '=' , $country_id);
        }
    }
}
