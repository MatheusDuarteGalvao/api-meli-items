<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class AuthRepository
{
    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function deleteUserTokens(User|Request $user)
    {
        $user->tokens()->delete();

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}
