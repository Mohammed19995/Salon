<?php

namespace App\Models;

use App\Traits\DateFormatTrait;
use App\Traits\Filter\ActiveTrait;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class UserWorkingTime extends Model
{

    protected $table = 'user_working_times';
    protected $fillable = ['user_id','day_id','start_at','end_at','status'];
    protected $appends = ['start','end'];

    public function getStartAttribute() {
        return Carbon::parse($this->start_at)->format('h:i A');
    }

    public function getEndAttribute($value) {
        return Carbon::parse($this->end_at)->format('h:i A');
    }

    // relation
    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }
}
