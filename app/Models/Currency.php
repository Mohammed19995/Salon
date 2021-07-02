<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Currency extends Model
{
    use HasTranslations;

    protected $table = 'currencies';

    protected $fillable = ['name' ,'symbol' , 'code' , 'status'];
    public $translatable = ['name' , 'symbol'];

}
