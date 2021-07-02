<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 3/7/2020
 * Time: 11:25 م
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveScopes implements Scope
{


    public function apply(Builder $builder, Model $model)
    {
        $builder->where('status' , '=' , 1);
    }
}