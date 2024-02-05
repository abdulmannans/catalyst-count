<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
   @include('navbar')

   <div class="container mt-4">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <div class="card shadow">
                   <div class="card-header bg-dark text-white" >
                       <h4 class="mb-0">You are logged in</h4>
                   </div>

                   <div class="card-body">
                       <!-- Add any additional content for the home page -->
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
