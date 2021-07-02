<?php

namespace App\Models;

use App\Traits\Filter\ActiveTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use App\Traits\DateFormatTrait;
use App\Traits\Image\FlagTrait;

class Country extends Model
{
    use HasTranslations , FlagTrait , DateFormatTrait;

    protected $table = 'countries';
    protected $fillable = ['name' ,'iso2' , 'iso3','phone_code' , 'flag_id','timezone' ,'currency_id','latitude','longitude','status'];
    public $translatable = ['name'];

    protected $with = ['get_flag'];
    public $appends = ['flag'];


    // scope
    public function scopeActive($query) {
        $query->where('status' , '=' , 1);
    }

    // relation
    public function currency() {
        return $this->belongsTo(Currency::class , 'currency_id');
    }

}
