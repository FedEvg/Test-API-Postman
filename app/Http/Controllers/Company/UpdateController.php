<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Company $company)
    {
        $data = $request->validated();

        $company = $company->update($data);

        return $company instanceof Company ? new CompanyResource($company) : $company;
    }
}
