<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
   @include('navbar')

   <div class="container-fluid mt-4">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="card shadow">
                   <div class="card-header bg-dark text-white">
                       <h4 class="mb-0">You are logged in</h4>
                   </div>

                   <div class="card-body">
                       <form action="" method="GET">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="unique_reference">Unique Reference:</label>
                                    <input type="text" class="form-control" name="unique_reference" value="{{ request('unique_reference') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ request('name') }}">
                                </div>
                                <div class="col-md-4 align-self-end">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>

                       <div class="mb-3">
                           <strong>Records Count:</strong> {{ $companies->total() }}
                       </div>

                       <div class="table-responsive">
                           <table class="table table-bordered" id="companiesTable">
                               <thead>
                                   <tr>
                                       <th>Unique Reference</th>
                                       <th>Name</th>
                                       <th>Domain</th>
                                       <th>Year Founded</th>
                                       <th>Industry</th>
                                       <th>Size Range</th>
                                       <th>Locality</th>
                                       <th>Country</th>
                                       <th>LinkedIn URL</th>
                                       <th>Current Employee Estimate</th>
                                       <th>Total Employee Estimate</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach($companies as $company)
                                       <tr>
                                           <td>{{ $company->unique_reference }}</td>
                                           <td>{{ $company->name }}</td>
                                           <td>{{ $company->domain }}</td>
                                           <td>{{ $company->year_founded }}</td>
                                           <td>{{ $company->industry }}</td>
                                           <td>{{ $company->size_range }}</td>
                                           <td>{{ $company->locality }}</td>
                                           <td>{{ $company->country }}</td>
                                           <td>{{ $company->linkedin_url }}</td>
                                           <td>{{ $company->current_employee_estimate }}</td>
                                           <td>{{ $company->total_employee_estimate }}</td>
                                       </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>

                       <div class="d-flex justify-content-end">
                           {{ $companies->appends(request()->except('page'))->links() }}
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
