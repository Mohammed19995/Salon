<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GalleryType extends Model
{
    use HasTranslations;

    protected $table = 'gallery_types';
    protected $fillable = ['name' ,'key'];
    public $translatable = ['name'];

}
