@extends('admin.layout.app')
@section('title', 'Pembayaran')

@section('content')

@if (Session::has('bayar'))
<div class="row">
    <div class="col-sm-4">
        <div class="alert alert-info" role="alert">
            {{Session::get('bayar')}}
        </div>
    </div>
</div>
@endif

<section class="section">
    <div class="section-header">
        <h1>List Pembayaran</h1>
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
                            <th>Total Bayar</th>
                            <th>Bukti Pembayaran</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=0 @endphp
                        @foreach ($pembayaran as $p)
                        @php $no++ @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$p->code_pesanan}}</td>
                            <td>{{$p->pemesan}}</td>
                            <td>{{$p->nama_produk}}</td>
                            <td>@currency($p->harga)</td>
                            <td><img src="/gambar/pembayaran/{{$p->bukti_pembayaran}}" width="90" height="90"></td>
                            <td>
                                <form action="{{ route('pembayaran', $p->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-success" {{$p->keterangan == 'Pending' ? '' : 'disabled'}}
                                        {{$p->keterangan == 'Proses Packing' ? 'disabled' : ''}}
                                        {{$p->keterangan == 'Kirim' ? 'disabled' : ''}}
                                        {{$p->keterangan == 'Diterima' ? 'disabled' : ''}}>proses</button>
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