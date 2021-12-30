<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>

<body>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Daftar Akun</h5>
                            <form class="form-signin" method="POST" action="/addUser">
                                @csrf

                                <div class="form-label-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama"
                                        value="{{ old('name')}}" autofocus>
                                    <label for="name">Nama</label>
                                    @if ($errors->has('name'))
                                    <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-label-group">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email address" value="{{ old('email')}}">
                                    <label for="email">Email</label>
                                    @if ($errors->has('email'))
                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password">
                                    <label for="password">Password</label>
                                    @if ($errors->has('password'))
                                    <p class="text-danger">{{$errors->first('password')}}</p>
                                    @endif
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="no_hp"
                                        value="{{ old('no_hp')}}">
                                    <label for="no_hp">Nomor Handphone</label>
                                    @if ($errors->has('no_hp'))
                                    <p class="text-danger">{{$errors->first('no_hp')}}</p>
                                    @endif
                                </div>

                                <button class="btn btn-lg bg-purple text-white btn-block text-uppercase px-5 py-2"
                                    type="submit">Daftar</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


</body>

</html>