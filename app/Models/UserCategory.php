<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class UserCategory extends Model
{

    protected $table = 'user_categories';
    protected $fillable = ['user_id','category_id'];


    // relation
    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }

}
