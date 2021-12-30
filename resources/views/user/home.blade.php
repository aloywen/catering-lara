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

<div class="jumbotron">
    <h1 class="">{{$web->nama_web}}</h1><br>
    <h3>{{$web->tentang}}</h3>
</div>

<div class="container">

    <h3 class="my-5 text-center">Kenapa Harus Pesan Disini?</h3>

    <div class="mt-3 d-flex flex-column flex-md-row justify-content-around align-items-center">
        <div>
            <img src="/gambar/j.png" alt="undraw" height="400" width="400">
        </div>
        <div class="pt-5">
            <div class="card shadow bg-success" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text text-center h5">{{$web->unggulan1}}</p>
                </div>
            </div>
            <div class="card shadow bg-success" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text text-center h5">{{$web->unggulan2}}</p>
                </div>
            </div>
            <div class="card shadow bg-success" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text text-center h5">{{$web->unggulan3}}</p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 text-center">Semua Produk</h3>



    <div class="d-flex flex-wrap justify-content-center pb-5">
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

    <h3 class="my-5 text-center">Review Pelanggan</h3>



    <div class="row bg-danger d-flex justify-content-center align-items-center py-5 mb-5">
        <div class="col-md-6">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @foreach ($review as $r)
                        <li class="glide__slide">
                            <div class="card mx-auto px-2" style="width: 18rem;">
                                <h5 class="card-text mt-3">{{$r->nama_id}}</h5>
                                <p class="card-text">Pesanan : <span class="fw-bolder">{{$r->nama_paket_id}}</span></p>
                                <div class="card-body">
                                    <span class="badge bg-success">{{$r->penilaian}}</span>
                                    <p class="card-text mt-2">{{$r->deskripsi}}</p>
                                    <img src="/gambar/penilaian/{{$r->gambar}}" class="card-img-top" alt="..."
                                        value="{{$r->gambar}}">
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection