@extends('user.layout.app')
@section('title', 'Pembayaran')

@section('content')

<div class="container">


    @if (Session::has('bayar'))
    <div class="alert alert-success mt-5" role="alert">
        {{Session::get('bayar')}}
    </div>
    @endif


    <p class="h3 my-5">Pembayaran</p>

    <form action="/addPembayaran" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3 row">
            <label class="col-sm-1 col-form-label">Upload</label>
            @error('bukti_pembayaran')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="col-sm-3">
                <input type="file" class="form-control" name="bukti_pembayaran" required>
            </div>
        </div>
        <input type="hidden" value="{{$data->id}}" name="id">

        <button type="submit" class="btn bg-success text-white"
            {{$data->status_pembayaran == 'Sudah Bayar' ? 'disabled' : ''}}>Bayar</button>
    </form>

    <a href="/dashboard-user"><button class="btn btn-danger mt-3">Kembali</button></a>

</div>
@endsection