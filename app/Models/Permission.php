<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Permission extends Model
{
    use HasTranslations , DateFormatTrait , ActiveTrait;

    protected $table = 'permissions';
    protected $fillable = ['name','key' ,'parent' ,'order_by', 'status'];

    public $translatable = ['name'];
}
