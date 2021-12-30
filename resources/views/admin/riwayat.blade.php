@extends('admin.layout.app')
@section('title', 'Riwayat Transaksi')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Riwayat Transaksi</h1>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pesanan</th>
                            <th>Pemesan</th>
                            <th>Nama Produk</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=0 @endphp
                        @foreach ($riwayat as $p)
                        @php $no++ @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$p->code_pesanan}}</td>
                            <td>{{$p->pemesan}}</td>
                            <td>{{$p->nama_produk}}</td>
                            <td><span
                                    class="badge {{ $p->keterangan == 'Proses' ? ' bg-danger' : 'bg-success'}}">{{$p->keterangan}}</span>
                            </td>
                            <td>
                                <a href="/detail-riwayat/{{$p->id}}">
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