<!-- resources/views/login.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg mx-auto" style="max-width: 400px;">
                <div class="card-header text-white text-center" style="background-color: #333;">
                    <h2 class="mb-0">Login</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
            <div class="mt-3 text-center">
                <p class="mb-0" style="font-family: 'Roboto', sans-serif;">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
