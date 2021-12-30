@extends('admin.layout.app')
@section('title', 'Tambah Admin')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Admin</h1>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-body">

                <form action="/addAdmin" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Admin</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}">
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
                <a href="/produk"><button class="btn btn-danger mt-2">Kembali</button></a>


            </div>
        </div>
    </div>
</section>



@endsection