<?php


namespace App\Filters;

use Closure;
use Illuminate\Support\Str;

interface  Filter
{
    public function handle($content, Closure $next);

}
