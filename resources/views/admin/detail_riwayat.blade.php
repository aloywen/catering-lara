@extends('admin.layout.app')
@section('title', 'Detail Riwayat Pemesanan')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>List Pemesan</h1>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Tanggal Pemesanan</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking"
                            value="{{$riwayat->created_at}}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Pemesan</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking"
                            value="{{$riwayat->pemesan}}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Nonor Handphone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking" value="{{$riwayat->no_hp}}"
                            readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking" value="{{$riwayat->alamat}}"
                            readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Nama Produk</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking"
                            value="{{$riwayat->nama_produk}}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Jumlah Pesanan</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking" value="{{$riwayat->jumlah}}"
                            readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Total Bayar</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="booking" name="booking"
                            value="@currency($riwayat->harga)" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-3">
                        <span
                            class="badge {{ $riwayat->status_pembayaran == 'Belum Bayar' ? ' bg-danger' : 'bg-success'}}">{{$riwayat->status_pembayaran}}</span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="booking" class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-3">
                        <span
                            class="badge {{ $riwayat->keterangan == 'Pending' ? ' bg-danger' : 'bg-success'}}">{{$riwayat->keterangan}}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection