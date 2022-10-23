<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $user = $this->service->store($data);

        return $user instanceof User ? new UserResource($user) : $user;
    }
}
