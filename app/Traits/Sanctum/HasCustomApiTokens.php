<?php namespace App\Traits\Sanctum;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

trait HasCustomApiTokens
{
    use HasApiTokens;

    public function createToken(string $name, array $abilities = ['*'], $fcm = null)
    {
        $token = $this->tokens()->create(
            ['name' => $name,
                'token' => hash('sha256', $plainTextToken = Str::random(1000)),
                'fcm' => $fcm,
                'abilities' => $abilities,
                ]
        );
        return new NewAccessToken($token, $token->id . '|' . $plainTextToken);
    }
}