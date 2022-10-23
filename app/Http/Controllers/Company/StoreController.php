<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $company = Company::query()->firstOrCreate($data);

        return $company instanceof Company ? new CompanyResource($company) : $company;
    }
}
