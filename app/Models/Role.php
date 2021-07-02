<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

use App\Models\Permission;

class Role extends Model
{
    use  HasTranslations , DateFormatTrait , ActiveTrait;

    protected $table = 'roles';
    protected $fillable = ['name', 'status'];

    public $translatable = ['name'];

    // relation
    public function permissions() {
        return $this->belongsToMany(Permission::class ,'role_permissions' , 'role_id' ,'permission_id');
    }
}
