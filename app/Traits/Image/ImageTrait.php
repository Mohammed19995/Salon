<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Image;

use App\Models\Gallery;

trait ImageTrait
{

    public function get_image()
    {
        return $this->belongsTo(Gallery::class, 'image_id');
    }

    public function getImageAttribute() {
        return is_null($this->image_id) ? getPath($this->getTable(), true) :$this->get_image->src ;
    }
    public function getImageArAttribute() {
        return is_null($this->image_ar_id) ? getPath($this->getTable(), true) :$this->get_image_ar->src ;
    }

}