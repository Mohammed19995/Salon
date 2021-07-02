<?php
namespace App\Traits\Model;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $fillable = ['name', 'token', 'fcm', 'abilities',];
}