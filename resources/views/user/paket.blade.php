@extends('user.layout.app')
@section('title', 'Home Page')

@section('content')

@if (\Session::has('log'))
<div class="row">
    <div class="col-sm-4">

        <div class="alert alert-danger" role="alert">
            {{\Session::get('log')}}
        </div>
    </div>
</div>
@endif


<h3 class="my-5 text-center">Daftar Paket</h3>


<div class="container">

    <div class="d-flex flex-wrap">
        @foreach ($produk as $p)
        <div class="card m-3 h-100" style="width: 15rem">

            <img src="/gambar/produk/{{$p->gambar}}" class="card-img-top" alt="..." value="{{$p->nama_produk}}">
            {{-- <input type="hidden" value="{{$data->id}}" name="customer_id"> --}}
            <input type="hidden" value="{{$p->gambar}}" name="gambar">
            <input type="hidden" value="{{$p->nama_produk}}" name="nama_produk">
            <input type="hidden" value="{{$p->harga}}" name="harga">
            <div class="card-body">
                <h5 class="card-title">{{$p->nama_produk}}</h5>
                <p class="card-text">@currency($p->harga)</p>
            </div>
            <div class="card-footer">
                @if (\Session::has('user'))

                <a href="/detail-produk/{{$p->id}}">
                    <button type="button" class="btn bg-danger text-white rounded">Lihat Produk</button>
                </a>

                @else

                <a href="/log">
                    <button type="button" class="btn bg-danger text-white rounded">Lihat Produk</button>
                </a>

                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">
    {{$produk->links()}}
</div>

@endsection