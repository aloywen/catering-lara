@extends('user.layout.app')
@section('title', 'Dashboard')

@section('content')

@if (Session::has('msg'))
<div class="mt-2">
    <div class="alert alert-info" role="alert">
        {{Session::get('msg')}}
    </div>
</div>
@endif

<div class="container">


    <p class="h3 my-5">Dashboard</p>

    <a href="/edit-profil/{{$data->id}}"><span class="badge bg-warning mb-3">Edit Profil</span></a>

    <div class="mb-3 row">
        <label class="col-sm-1 col-form-label">Nama</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="{{$data->name}}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-1 col-form-label">Email</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="{{$data->email}}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-1 col-form-label">Nomor HP</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" value="{{$data->no_hp}}" readonly>
        </div>
    </div>
    <div class="mb-5 row">
        <label class="col-sm-1 col-form-label">Alamat</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="{{$data->alamat}}" readonly>
        </div>
    </div>


    <p class="h3 mt-5 mb-3">Riwayat Pemesanan</p>


    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Pesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Pembayaran</th>
                        <th>Keterangan</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=0 @endphp
                    @foreach ($pesanan as $p)
                    @php $no++ @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$p->created_at}}</td>
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
                            @if ($p->status_pembayaran == 'Belum Bayar')

                            <a href="/pembayaran-user/{{ $p->id }}">
                                <span class="badge bg-primary">bayar</span>
                            </a>

                            @endif
                        </td>
                        <td>
                            <a href="/detail-pesanan/{{ $p->id }}">
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

@endsection