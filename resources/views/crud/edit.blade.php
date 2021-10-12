<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{url('bootstrap/css/bootstrap.css')}}>

    <title>Edit Data</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Companies Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Display the data will inserted --}}
    @if(session()->has('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    {{-- Form Start --}}
    <div class="container my-1">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Update Companies Data</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$companie->name}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="First_name" name="First_name" value="{{$companie->First_name}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$companie->last_name}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$companie->email}}">
            </div>
            <label>Image Logo</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="logo" name="logo" class="custom-file-input" value="{{$companie->logo}}">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="{{$companie->company}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="{{$companie->website}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$companie->phone}}">
            </div>
            <button type="submit" class="btn btn-primary">Update Now</button>
        </form>
    </div>
    {{-- Form End --}}
</body>

</html>