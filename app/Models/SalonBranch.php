<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Image\ImageTrait;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class SalonBranch extends Model
{
    use SoftDeletes, ImageTrait , HasTranslations , DateFormatTrait;

    protected $table = 'salon_branches';
    protected $fillable = ['image_id','name', 'status'];
    protected $with = ['get_image'];
    protected $appends = ['image' ];

    public $translatable = ['name'];

    // scope
    public function scopeActive($query) {
        $query->where('status' , '=' , 1);
    }



}
