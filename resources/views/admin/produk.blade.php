@extends('admin.layout.app')
@section('title', 'List Produk')

@section('content')

@if (Session::has('editProduk'))
<div class="row">
    <div class="col-sm-4">
        <div class="alert alert-info" role="alert">
            {{Session::get('editProduk')}}
        </div>
    </div>
</div>
@endif
@if (Session::has('hapusProduk'))
<div class="row">
    <div class="col-sm-4">
        <div class="alert alert-info" role="alert">
            {{Session::get('hapusProduk')}}
        </div>
    </div>
</div>
@endif

<section class="section">
    <div class="section-header">
        <h1>List Produk</h1>
    </div>

    <a href="/tambah-produk"><button class="btn btn-primary mb-4">Tambah Data Paket</button></a>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=0 @endphp
                        @foreach ($produk as $p)
                        @php $no++ @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$p->nama_produk}}</td>
                            <td>@currency($p->harga)</td>
                            <td><img src="/gambar/produk/{{$p->gambar}}" alt="" width="80" height="80"></td>
                            <td>
                                <a href="/edit-produk/{{ $p->id }}">
                                    <span class="badge bg-warning">Edit</span>
                                </a>
                                <form action="/hapus-produk/{{$p->id}}" method="POST"> @csrf @method("delete") <button
                                        type="submit" onclick="alert('yakin ingin menghapusnya?')"
                                        class="badge bg-danger">
                                        Hapus</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



@endsection