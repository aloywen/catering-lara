@extends('admin.layout.app')
@section('title', 'Pemesanan')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>List Pemesanan</h1>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pesanan</th>
                            <th>Nama Produk</th>
                            <th>Pemesan</th>
                            <th>Status Pembayaran</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=0 @endphp
                        @foreach ($pemesanan as $p)
                        @php $no++ @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$p->code_pesanan}}</td>
                            <td>{{$p->nama_produk}}</td>
                            <td>{{$p->pemesan}}</td>
                            <td><span
                                    class="badge {{ $p->status_pembayaran == 'Belum Bayar' ? ' bg-danger' : 'bg-success'}}">{{$p->status_pembayaran}}</span>
                            </td>
                            <td><span class="badge {{ $p->keterangan == 'Diterima' ? ' bg-success' : ''}} 
                                    {{ $p->keterangan == 'Kirim' ? ' bg-success' : ''}} 
                                    {{ $p->keterangan == 'Proses' ? ' bg-warning' : ''}} 
                                    {{ $p->keterangan == 'Pending' ? ' bg-danger' : ''}}">{{$p->keterangan}}</span>
                            </td>
                            <td>
                                <a href="/detail-pemesanan/{{ $p->id }}">
                                    <span class="badge bg-warning">Detail</span>
                                </a>
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