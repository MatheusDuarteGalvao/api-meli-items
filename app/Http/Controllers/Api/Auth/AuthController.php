<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function auth(AuthRequest $request)
    {
        $token = $this->authService->authenticateUser($request);

        return response()->json([
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function me(Request $request)
    {
        $user = $this->authService->me($request);

        return response()->json([
            'me' => $user,
        ]);
    }
}
