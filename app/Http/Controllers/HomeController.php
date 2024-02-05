<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\QueryFilters\CompanyFilter;
use Exception;
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
        try{
            $perPage = $request->input('per_page', 10);
            $companies = Company::filter($filter)->paginate($perPage);
            return view('home', compact('companies'));
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }
}
