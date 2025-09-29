<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;


class TokenAuthController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth:api', ['except' => ['authenticate']]);
    }

    /**
     * Login and get JWT token
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
       
         // Attempt to verify the credentials and create a token for the user
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated user
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Logout user (invalidate token)
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());
    }

    /**
     * Helper method to return token details
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            // Option 1: Using JWTAuth facade
            'expires_in'   => JWTAuth::factory()->getTTL() * 60,
            // Option 2 (alternative): 'expires_in' => auth('api')->getTTL() * 60,
            'user'         => auth('api')->user(),
        ]);
    }

    public function test(Request $request)
    {
        $user = Auth::user();
        $counts = User::selectRaw("
                    COUNT(*) as total_users,
                    SUM(CASE WHEN role_type = 2 THEN 1 ELSE 0 END) as employers,
                    SUM(CASE WHEN role_type = 3 THEN 1 ELSE 0 END) as candidates,
                    SUM(CASE WHEN role_type = 3 AND status = 1 THEN 1 ELSE 0 END) as active_candidates,
                    SUM(CASE WHEN role_type = 3 AND status = 0 THEN 1 ELSE 0 END) as inactive_candidates
                ")
            ->where('role_type', '!=', 1)
            ->where('is_delete', 0)
            ->first();

        $recentUsers      = User::where('role_type', '!=', 1)->where('is_delete', 0)->latest()->limit(5)->get();
        $recentCandidates = User::where('role_type', 3)->where('is_delete', 0)->latest()->limit(5)->get();

        return response()->json([
            'counts'            => $counts,
            'recent_users'      => $recentUsers,
            'recent_candidates' => $recentCandidates,
        ]);
    }
}
