@extends('user.layout.app')
@section('title', 'Edit Profil')

@section('content')

@if (Session::has('editProfil'))
<div class="alert alert-success" role="alert">
    {{Session::get('editProfil')}}
</div>
@endif

<p class="h3 mb-5">Edit Profil</p>

<form action="/editProfil" method="POST">
    @csrf
    @method('PATCH')

    <input type="hidden" value="{{$data->id}}" name="id">
    <div class="mb-3 row">
        <label class="col-sm-1 col-form-label">Nama</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="{{$data->name}}" name="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-1 col-form-label">Email</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="{{$data->email}}" name="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-1 col-form-label">Nomor Hp</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="{{$data->no_hp}}" name="no_hp">
        </div>
    </div>
    <div class="mb-5 row">
        <label class="col-sm-1 col-form-label">Alamat</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="alamat" id="alamat" style="height: 100px">{{$data->alamat}}</textarea>
        </div>
    </div>

    <button type="submit" class="btn bg-success text-white">Simpan Data</button>
</form>


@endsection