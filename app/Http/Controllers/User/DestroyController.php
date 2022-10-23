<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\User\UserResource;
use App\Models\User;

class DestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->delete();

        return new UserResource($user);
    }
}
