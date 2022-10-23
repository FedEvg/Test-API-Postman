<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;

class ShowController extends Controller
{
    public function __invoke(Company $company)
    {
        return CompanyResource::make($company);
    }
}
