<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\DateFilterTrait;

use App\Traits\Image\ImageTrait;
use App\Traits\Notification\CustomNotifiable;
use App\Traits\Sanctum\HasCustomApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use CustomNotifiable ,HasCustomApiTokens, SoftDeletes , ImageTrait , DateFormatTrait , DateFilterTrait;

    protected $fillable = [
        'name' ,'parent_id' ,'phone_code' , 'phone', 'email', 'password','image_id' ,'code','reset_password_code',
        'verified_at','expire_verified_at' , 'lat','lng','city_id','status' , 'type','lang',
    ];
    protected $with = ['get_image'];
    protected $appends = ['image'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    // relation
    public function city() {
        return $this->belongsTo(City::class , 'city_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_categories' , 'user_id','category_id' );
    }

    public function working_times() {
        return $this->hasMany(UserWorkingTime::class , 'user_id');
    }
    // scopes
    public function scopeCheckPhone($query , $country_code , $phone)
    {
        $query->where('phone_code', '=', $country_code)
            ->where('phone', '=', $phone);
    }
    public function scopeUserDate($query,$start_at,$end_at) {
        $query->whereBetween(DB::raw('DATE(created_at)') ,[$start_at ,$end_at ] );
    }
    public function scopeStatus($query , $status) {
        if(checkCanFilter($status)) {
            $query->where('status' , '=' , $status);
        }
    }
    public function scopeType($query , $type) {
        if(checkCanFilter($type)) {
            $query->where('type' , '=' , $type);
        }
    }
    public function scopePhoneCodeStatus($query , $status) {
        if(checkCanFilter($status)) {
            if($status == 0) $query->whereNull('verified_at');
            elseif ($status == 1) $query->whereNotNull('verified_at');
        }
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
