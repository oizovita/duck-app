<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Response;
use App\Http\Requests\Auth\API\LoginRequest;
use App\Attributes\Route;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     *
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    #[Route(method: 'post', path: 'api/auth/login')]
    public function login(LoginRequest $request)
    {
        if (!$token = auth()->attempt($request->all())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return AuthResource::make($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return Response
     */
    #[Route(method: 'post', path: 'api/auth/logout')]
    public function logout()
    {
        auth()->logout();

        return response()->noContent();
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    #[Route(method: 'post', path: 'api/auth/refresh')]
    public function refresh()
    {
        return AuthResource::make(auth()->refresh());
    }
}
