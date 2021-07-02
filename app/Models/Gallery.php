<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use App\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gallery extends Model
{
    use HasTranslations;

    protected $table = 'galleries';
    protected $fillable = ['src' , 'type_id' , 'name','size','mime_type' ,'show_in_gallery'];
    public $translatable = ['name'];


    public function getSrcAttribute($value) {
        return getPath('' , true , $value);
    }


    // scope
    public function showInGallery($query) {
        $query->where('show_in_gallery' , '=' , 1);
    }
    public function scopeSearch($query , $search){
        $query->where(function ($query1) use($search){
            $query1->where('name->ar' , 'LIKE' , "%$search%")->orWhere('name->en' , 'LIKE' , "%$search%");
        });
    }
    public function scopeType($query , $type_id) {
        if(!is_null($type_id) && !empty($type_id) && $type_id != -1) {
            $query->where('type_id' , '=' , $type_id);
        }
    }
    public function scopefileType($query , $file_type) {
        if(!is_null($file_type) && !empty($file_type) && $file_type != -1) {
           if($file_type == 1) {
               $query->where('mime_type' ,'LIKE' , '%image%');
           }else {
               $query->where('mime_type' ,'NOT LIKE' , '%image%');
           }
        }
    }

    // relation
    public function scopeGetSrc($query , $src) {
        $query->where('src' , '=' , $src)
            ->where('num_used' , '>' ,0);
    }
}
