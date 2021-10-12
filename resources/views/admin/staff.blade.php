<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <title>Staff</title>
</head>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h4>staff</h4>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$LoggedUserInfo['name']}}</td>
                        <td>{{$LoggedUserInfo['email']}}</td>
                        <td><a href="{{route('auth.logout')}}">Logout</a></td>
                    </tr>
                </tbody>
            </table>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/profile">Profile</a></li>
                <li><a href="/admin/setting">Setting</a></li>
                <li><a href="/admin/staff">Staff</a></li>
            </ul>
        </div>
    </div>
</body>
</html>