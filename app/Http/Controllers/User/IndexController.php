<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::query()->orderByDesc('created_at')->paginate(10);

        return UserResource::collection($users);
    }
}
