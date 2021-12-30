@extends('user.layout.app')
@section('title', 'Pembayaran')

@section('content')

<div class="container pb-5">


    @if (Session::has('bayar'))
    <div class="alert alert-info mt-5" role="alert">
        {{Session::get('bayar')}}
    </div>
    @endif
    @if (Session::has('penilaian'))
    <div class="alert alert-info mt-5" role="alert">
        {{Session::get('penilaian')}}
    </div>
    @endif


    <p class="h3 my-5">Beri Penilaian</p>

    <form action="/addPenilaian" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
            <div class="col-sm-4">
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
            </div>
            @error('deskripsi')
            <div class="text-danger">Tidak Boleh Kosong</div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <div class="d-flex justify-content-around">
                <div class="form-check">
                    <input class="form-check-input" name="rating" type="checkbox" value="Kurang Puas"
                        id="flexCheckChecked1">
                    <label class="form-check-label" for="flexCheckChecked1">
                        Kurang Puas
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="rating" type="checkbox" value="Puas" id="flexCheckChecked2">
                    <label class="form-check-label" for="flexCheckChecked2">
                        Puas
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="rating" type="checkbox" value="Sangat Puas"
                        id="flexCheckChecked3" checked>
                    <label class="form-check-label" for="flexCheckChecked3">
                        Sangat Puas
                    </label>
                </div>
                @error('rating')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-1 col-form-label">Upload</label>
            @error('gambar')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="col-sm-3">
                <input type="file" class="form-control" name="gambar">
            </div>
        </div>
        <input type="hidden" value="{{$data->nama_produk}}" name="nama_paket">
        <input type="hidden" value="{{$user->name}}" name="nama">

        <button type="submit" class="btn bg-success text-white">Kasih Penilaian</button>
    </form>

    <a href="/dashboard-user"><button class="btn btn-danger mt-3">Kembali</button></a>

</div>
@endsection