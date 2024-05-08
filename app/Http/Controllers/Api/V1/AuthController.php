<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $param) {
        return response()->json('login');
    }

    public function signup() {
        return 'signup';
    }

    public function logout() {
        return 'logout';
    }
}
