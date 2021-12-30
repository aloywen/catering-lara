@extends('user.layout.app')
@section('title', 'Detail Produk')

@section('content')
<div class="container">

    <h3 class="my-5">Detail Produk</h3>

    @if (Session::has('keranjang'))
    <div class="row">
        <div class="col-sm-3">

            <div class="alert alert-success" role="alert">
                {{Session::get('keranjang')}}
            </div>
        </div>
    </div>
    @endif



    <div class="card mb-3" style="max-width: 740px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/gambar/produk/{{$produk->gambar}}" class="img-fluid rounded-start">
                <form action="/addKeranjang" method="POST">
                    @csrf

                    <input type="hidden" value="{{$data->id ?? ''}}" name="customer_id">
                    <input type="hidden" value="{{$produk->nama_produk}}" name="nama_produk">
                    <input type="hidden" value="{{$produk->harga}}" name="harga">
                    <input type="hidden" value="{{$produk->gambar}}" name="gambar">
                    @if (\Session::has('user'))
                    <button class="btn bg-danger text-white h5 mt-3 pl-3">+ Keranjang</button>
                    @endif
                </form>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$produk->nama_produk}}</h5>
                    <p class="card-text">@currency($produk->harga)</p>
                    <h4 class="card-title mt-5">Deskripsi</h4>
                    <p class="card-text">{{$produk->deskripsi}}</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection