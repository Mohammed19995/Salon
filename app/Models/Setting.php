<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations , DateFormatTrait , ActiveTrait;

    protected $table = 'settings';
    protected $fillable = ['key','value', 'status'];

    public $translatable = ['value'];
}
