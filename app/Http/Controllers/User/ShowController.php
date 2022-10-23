<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
        return UserResource::make($user);
    }
}
