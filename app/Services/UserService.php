<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['company_id'] = $this->getPositionId($data['company']);
            unset($data['company']);

            $data['password'] = Hash::make($data['password']);

            $user = User::query()->firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(404);
        }
        return $user;
    }

    public function update($user, $data)
    {
        try {
            DB::beginTransaction();

            $data['company_id'] = $this->getPositionIdWithUpdate($data['company']);
            unset($data['company']);

            $data['password'] = Hash::make($data['password']);

            $user = $user->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(404);
        }
        return $user->fresh();
    }

    private function getPositionId($item)
    {
        $company = !isset($item['id']) ? Company::query()->create($item) : Company::query()->find($item['id']);

        return $company->id;
    }

    private function getPositionIdWithUpdate($item)
    {
        if (!isset($item['id'])){
            $company = Company::query()->create($item);
        } else {
            $company = Company::query()->find($item['id']);
            $company->update($item);
            $company = $company->fresh();
        }
        return $company->id;
    }
}
