<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class UserNotification extends Model
{
    use  HasTranslations , DateFormatTrait ;

    protected $table = 'user_notifications';
    protected $fillable = ['title','message'];

    public $translatable = ['title' , 'message'];


}
