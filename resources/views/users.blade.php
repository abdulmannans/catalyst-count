<!-- resources/views/users.blade.php -->

@extends('layouts.app')

@section('content')
   @include('navbar')

   <div class="container-fluid mt-4">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="card shadow">
                   <div class="card-header bg-dark text-white">
                       <h4 class="mb-0">Users List</h4>
                   </div>

                   <div class="card-body">
                       @if($users->isEmpty())
                           <div class="alert alert-info">
                               <strong>No data found!</strong>
                           </div>
                       @else
                           <div class="mb-3">
                               <strong>Records Count:</strong> {{ $users->total() }}
                           </div>

                           <div class="table-responsive">
                               <table class="table table-bordered" id="companiesTable">
                                   <thead>
                                       <tr>
                                           <th>Name</th>
                                           <th>Email</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach($users as $user)
                                           <tr>
                                               <td>{{ $user->name }}</td>
                                               <td>{{ $user->email }}</td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>

                           <div class="d-flex justify-content-end">
                               {{ $users->appends(request()->except('page'))->links() }}
                           </div>
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
