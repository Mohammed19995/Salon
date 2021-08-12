<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Image\ImageTrait;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use SoftDeletes, ImageTrait , HasTranslations , DateFormatTrait;

    protected $table = 'sliders';
    protected $fillable = ['image_id','name','description', 'status'];
    protected $with = ['get_image'];
    protected $appends = ['image' ];

    public $translatable = ['name','description'];

    public function scopeActive($query) {
        $query->where('status' , '=' , 1);
    }

}
