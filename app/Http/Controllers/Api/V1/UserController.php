<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\User;

class UserController extends Controller
{
    use HttpResponses;

    // SHOULD BE RESOURCE index, update, ...

    // cái hàm này quá tào lao, không cần thiết, 
    // vì cứ có request là truy cập user được mà :) ngu
    public function myProfile(Request $request) {
        return new UserResource($request->user());
    }

    public function updateProfile(UpdateProfileRequest $request) {
        
        $request->validated($request->all());

        $userId = $request->user()->id;

        $profile = User::find($userId);

        $profile->email = $request->email;
        $profile->display_name = $request->display_name;
        $profile->save();

        return $this->success([]);
    }
}
