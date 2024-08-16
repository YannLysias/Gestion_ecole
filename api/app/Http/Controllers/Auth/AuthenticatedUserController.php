<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedUserController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): JsonResponse
    {
        
        // Use the authenticate method to validate and log in the user
        $request->authenticate();
        
        dd($request->user());

        // Generate the token after successful authentication
        $token = $request->user()->createToken('User Access Token')->plainTextToken;
 
        // Return the token in the response
        return response()->json(['token' => $token]);
    }

    /**
     * Destroy an authenticated session.
     */
   
     public function destroy(Request $request): JsonResponse
{
    // Revoke the user's current access token
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'success' => true,
        'message' => 'Logged out successfully',
    ], 200);
}
}
