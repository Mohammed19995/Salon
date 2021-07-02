<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Place extends Model
{
    use HasTranslations , DateFormatTrait  ,ActiveTrait , SpatialTrait;

    protected $table = 'places';
    protected $fillable = ['name','area','status'];
    protected $spatialFields = ['area'];

    public $translatable = ['name'];


}
