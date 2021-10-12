<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{url('bootstrap/css/bootstrap.css')}}>
    <title>CRUD Eloquent ORM</title>
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
            <h2>Add Companies Data</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                <span class="text-danger">@error('name')
                    {{$message}}
                    @enderror</span>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="First_name" name="First_name" value="{{old('First_name')}}">
                <span class="text-danger">@error('First_name')
                    {{$message}}
                    @enderror</span>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
                <span class="text-danger">@error('last_name')
                    {{$message}}
                    @enderror
                </span>

            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <label>Image Logo</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="logo" name="logo" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    {{-- Form End --}}

    {{-- Show Data --}}
    <div class="container">
        <table class="table table-dark table-sm">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image Logo</th>
                <th scope="col">Website</th>
                <th scope="col">Action's</th>
            </thead>
            <tbody>
                @foreach ($companie as $com)
                <tr>
                    <th>{{$com->id}}</th>
                    <td>{{$com->Name}}</td>
                    <td>{{$com->email}}</td>
                    <td>
                        <img src="{{ asset('/storage/app/companies'.$com->logo)}}" width="100px" alt="Image">
                    </td>
                    <td>{{$com->website}}</td>
                    <td>
                        <a href="{{ url ('/crud/edit',$com->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ url ('delete',$com->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>