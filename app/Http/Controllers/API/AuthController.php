<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * AuthController.
 * 
 * Handles User Account Requests.
 */
class AuthController extends Controller
{

    /**
     * POST Method '/api/login'.
     * Returns Status Code 200 'OK'.
     */
    public function login(UserRequest $request): JsonResponse {

        $validated = $request->validated();

        if(!Auth::attempt($validated, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        $request->session()->regenerate();

        return response()->json(Auth::user(), 200);
    }

    /**
     * POST Method '/api/logout'.
     * Returns Status Code 204 'OK'.
     */
    public function logout(Request $request): JsonResponse {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(null, 204);
    }

}