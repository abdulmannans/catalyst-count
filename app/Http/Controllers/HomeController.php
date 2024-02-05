<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\QueryFilters\CompanyFilter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, CompanyFilter $filter)
    {
        $perPage = $request->input('per_page', 10);
        $companies = Company::filter($filter)->paginate($perPage);
        return view('home', compact('companies'));
    }
}
