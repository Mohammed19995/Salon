<?php

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;

function getPath($folder, $full_path = true, $default_image = "default.png")
{
    return $full_path ? ($folder != '' ? url("uploads/$folder/$default_image") : url("uploads/$default_image")) : "$folder/" . $default_image;
}

function getMultiLangField($default_value = '')
{
    $data = [];
    foreach (config('app.locales') as $locale) {
        $data[$locale] = $default_value;
    }
    return $data;
}

function checkCanFilter($attribute)
{
    return !is_null($attribute) && $attribute != -1;
}

// check role
function checkAdminRole($role)
{
    $admin = Auth::guard('admin')->user();
    if ($admin->is_super == 1) return true;
    return $admin->hasPermissions($role);
}

function getSubQuerySql($subQuery, $alias = null)
{
    if ($alias == null) {
        $sql = DB::select("(" . $subQuery->toSql() . ")");
    } else {
        $sql = DB::select("(" . $subQuery->toSql() . ") as '$alias'");
    }
    return $sql;
}

function slug($string, $separator = '-') {
    if (is_null($string)) {
        return "";
    }

    $string = trim($string);

    $string = mb_strtolower($string, "UTF-8");;

    $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

    $string = preg_replace("/[\s-]+/", " ", $string);

    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}


// general
function getUser($user) {
    if($user == "null") return json_decode($user);
    else return $user;

}
function getCurrency() {
    return "SAR";
}
