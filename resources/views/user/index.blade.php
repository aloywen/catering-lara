<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        @if (Session::has('msg'))
                        <div class="alert alert-info" role="alert">
                            {{Session::get('msg')}}
                        </div>
                        @endif
                        @if (Session::has('log'))
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('log')}}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('email'))
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('email')}}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('pass'))
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('pass')}}
                                </div>
                            </div>
                        </div>
                        @endif
                        <form class="form-signin" method="POST" action="/login">
                            @csrf
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email address" required autofocus>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <button class="btn btn-lg bg-purple text-white btn-block text-uppercase px-5 py-2"
                                type="submit">Login</button>
                        </form>

                        <a href="/register"><button
                                class="btn bg-green text-white btn-block text-uppercase px-5 mt-3 rounded-pill">Daftar
                                Akun</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>