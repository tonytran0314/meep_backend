<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    private $MIN_COUNT_ONE_USERNAME = 1;
    private $MAX_COUNT_ONE_USERNAME = 9999;

    public function login(LoginRequest $request) {
        
        $request->validated($request->all());

        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function signup(StoreUserRequest $request) {
        
        $request->validated($request->all());
        
        $identify_number = $this->identify_number_generator($request->username);
        
        if ($identify_number === null) {
            return $this->error(null, 'The username has already taken', 422);
        };

        User::create([
            'username' => $request->username,
            'identify_number' => $identify_number,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->success([]);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have successfully been logged out.'
        ]);
    }

    private function identify_number_generator($username) {
        // [1,2,3,..., 9999]
        $allId = range($this->MIN_COUNT_ONE_USERNAME, $this->MAX_COUNT_ONE_USERNAME);
        
        // get existed IDs
        $existedIdObject = User::username($username)->pluck('identify_number');
        $jsonString = json_encode($existedIdObject);
        $existedIds = json_decode($jsonString, true);

        // full ID
        if(count($existedIds) === $this->MAX_COUNT_ONE_USERNAME) {
            return null;
        }

        // remove common elements in 2 arrays if no ID exists
        $readyToPickIds = empty($existedIds) ? $allId : array_diff($allId, $existedIds);

        // pick a random ID
        $randomKey = array_rand($readyToPickIds);
        
        return $readyToPickIds[$randomKey];
    }
}
