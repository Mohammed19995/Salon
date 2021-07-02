<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Image\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use  Notifiable ,SoftDeletes , ImageTrait, HasApiTokens , DateFormatTrait;

    protected $table = 'admins';
    protected $fillable = ['name' ,'phone_code' ,'phone', 'email' ,'image_id' ,'password' , 'is_super',
        'code','verified_at' ,'expire_verified_at','role_id', 'status'];
    protected $hidden = ['password'];
    protected $with = ['get_image'];
    protected $appends = ['image'];



    // relation
    public function admins() {
        return $this->hasMany(self::class ,'id');
    }

    public function role() {
        return $this->belongsTo(Role::class , 'role_id');
    }

    public function hasPermissions($permissions) {

        $role_admin_arr = $this->role ? $this->role->permissions()->pluck('key')->toArray() : [];
        $role_arr = explode('|' , $permissions);
        return count(array_intersect($role_admin_arr , $role_arr)) > 0 ? True : False;
    }

    // scope
    public function scopeStatus($query , $status) {
        if(checkCanFilter($status)) {
            $query->where('status' , '=' , $status);
        }
    }
}
