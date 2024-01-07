<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            overflow: hidden;
        }

        .card {
            border-radius: 20px; /* Add border radius to the form */
            padding: 20px; /* Adjusted padding */
        }

        .form-control {
            border-radius: 20px; /* Add border radius to input elements */
        }
    </style>
</head>

<body style="background-color: #eaf4fd" class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-7">
                <form action="{{ route('loginAuth') }}" class="card shadow" method="POST">
                    @csrf
                    @if (Session::get('failed'))
                        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    @if (Session::get('logout'))
                        <div class="alert alert-primary">{{ Session::get('logout') }}</div>
                    @endif
                    @if (Session::get('canAccess'))
                        <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                    @endif
                    <div class="mb-5 text-center" style="color:rgb(65, 131, 207)">
                        <h4>Login</h4>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:rgb(65, 131, 207)">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
