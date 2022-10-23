<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, User $user)
    {
        $data = $request->validated();

        $user = $this->service->update($user, $data);

        return $user instanceof User ? new UserResource($user) : $user;
    }

}
