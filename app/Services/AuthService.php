<?php

namespace App\Services;

use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        private readonly AuthRepository $authRepository
    ) {
    }

    public function authenticateUser(AuthRequest $request)
    {
        $user = $this->authRepository->getUserByEmail($request->email);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }

        $this->authRepository->deleteUserTokens($user);

        $token = $user->createToken('token')->plainTextToken;

        return $token;
    }

    public function logout(User|Request $request)
    {
        $this->authRepository->deleteUserTokens($request->user());
    }

    public function me(Request $request)
    {
        return $this->authRepository->me($request);
    }
}
