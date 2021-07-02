<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Image\ImageTrait;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes, ImageTrait , HasTranslations , DateFormatTrait;

    protected $table = 'categories';
    protected $fillable = ['image_id','name','parent_id' , 'description' , 'service_time' , 'status'];
    protected $with = ['get_image'];
    protected $appends = ['image' ];

    public $translatable = ['name' , 'description'];

    // relation
    public function parent() {
        return $this->belongsTo(self::class , 'parent_id')->withDefault([
            'id' => -1,
            'name' => ['ar' => '']
        ]);
    }
    public function parent_() {
        return $this->belongsTo(Category::class , 'parent_id');
    }
    public function allparents()
    {
        return $this->parent_()->with('allparents');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function allchildren()
    {
        return $this->children()->with('allchildren');
    }

    // scopes
    public function scopeCategoryParent($query , $category_id) {
        if($category_id && $category_id != -1) {
            $query->where('parent_id' , '=' , $category_id);
        }else {
            $query->whereNull('parent_id');
        }
    }
}
