<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ApiTokenController extends Controller
{
    public function update()
    {
        $user = User::first();
        $token = Str::random(80);
 
        $user->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
 
        return ['token' => $token];
    }
}
