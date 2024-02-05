<?php

namespace App\Imports;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompaniesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if(array_key_exists(0,$row)){
            Company::updateOrCreate(
                [
                    "unique_reference" => $row[0],
                ],[
                    'name'                          => $row['name'] ?? null,
                    'domain'                        => $row['domain'] ?? null,
                    'year_founded'                  => array_key_exists('year_founded', $row) ? Carbon::parse($row['year_founded'])->format('Y-m-d') : null,
                    'industry'                      => $row['industry'] ?? null,
                    'size_range'                    => $row['size_range'] ?? null,
                    'locality'                      => $row['locality'] ?? null,
                    'country'                       => $row['country'] ?? null,
                    'linkedin_url'                  => $row['linkedin_url'] ?? null,
                    'current_employee_estimate'     => $row['current_employee_estimate'] ?? null,
                    'total_employee_estimate'       => $row['total_employee_estimate'] ?? null
                ]);
        }
    }
}
