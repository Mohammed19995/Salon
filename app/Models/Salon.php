<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\DateFilterTrait;
use App\Traits\Image\ImageTrait;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Salon extends Model
{
    use SoftDeletes, ImageTrait , HasTranslations , DateFormatTrait , DateFilterTrait;

    protected $table = 'salons';
    protected $fillable = ['image_id','name', 'description','address','branch_id','city_id','phone_code','phone', 'email','status'];
    protected $with = ['get_image'];
    protected $appends = ['image' ];

    public $translatable = ['name','description','address'];


    // relations
    public function categories() {
        return $this->belongsToMany(Category::class, 'salon_categories' , 'salon_id','category_id' );
    }
    public function employees() {
        return $this->belongsToMany(User::class, 'salon_employees' , 'salon_id','employee_id' );
    }
    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function working_times() {
        return $this->hasMany(SalonWorkingTime::class , 'salon_id');
    }

    // scope
    public function scopeGeneralAdminData($query) {
        $query->with(['categories' , 'employees' , 'working_times' , 'city.country']);
    }
    public function scopeStatus($query , $status) {
        if(checkCanFilter($status)) {
            $query->where('status' , '=' , $status);
        }
    }

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
