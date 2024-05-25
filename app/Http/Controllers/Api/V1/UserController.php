<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use HttpResponses;

    // SHOULD BE RESOURCE index, update, ...

    public function myProfile(Request $request) {
        return new UserResource($request->user());
    }

    public function updateProfile(UpdateProfileRequest $request) {
        
        $request->validated($request->all());

        $userId = $request->user()->id;
        $profile = User::find($userId);

        $profile->email = $request->email;
        $profile->display_name = $request->display_name;
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('public');
            $profile->avatar = $avatar;
        } 
        $profile->save();

        return $this->success([]);
    }
}
