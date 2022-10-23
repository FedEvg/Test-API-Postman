<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;

class IndexController extends Controller
{
    public function __invoke()
    {
        $companies = Company::query()->orderByDesc('created_at')->paginate(10);

        return CompanyResource::collection($companies);
    }
}
