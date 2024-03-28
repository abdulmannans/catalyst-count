<!-- resources/views/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Catalyst</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('upload') }}">Upload Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
