@extends('admin.layout.app')
@section('title', 'Pengaturan Website')

@section('content')

@if (Session::has('editPengaturan'))
<div class="row">
    <div class="col-sm-4">
        <div class="alert alert-info mt-5" role="alert">
            {{Session::get('editPengaturan')}}
        </div>
    </div>
</div>
@endif

@if (Session::has('admin'))
<div class="row">
    <div class="col-sm-4">
        <div class="alert alert-info mt-5" role="alert">
            {{Session::get('admin')}}
        </div>
    </div>
</div>
@endif

<section class="section">
    <div class="section-header">
        <h1>Website</h1>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-body">

                <form action="/addPengaturan" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 row">
                        <label for="nama_web" class="col-sm-2 col-form-label">Nama Website</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_web" value="{{$data->nama_web}}"
                                name="nama_web">
                        </div>
                        @error('nama_web')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>


                    <div class="mb-3 row">
                        <label for="nama_web" class="col-sm-2 col-form-label">Tentang Perusahaan</label>
                        <div class="col-sm-4">
                            <textarea name="tentang" id="tentang" cols="80" rows="10">{{$data->tentang}}</textarea>
                        </div>
                        @error('tentang')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="unggulan1" class="col-sm-2 col-form-label">Unggulan 1</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="unggulan1" value="{{$data->unggulan1}}"
                                name="unggulan1">
                        </div>
                        @error('unggulan1')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="unggulan2" class="col-sm-2 col-form-label">Unggulan 2</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="unggulan2" value="{{$data->unggulan2}}"
                                name="unggulan2">
                        </div>
                        @error('unggulan2')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="unggulan3" class="col-sm-2 col-form-label">Unggulan 3</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="unggulan3" value="{{$data->unggulan3}}"
                                name="unggulan3">
                        </div>
                        @error('unggulan3')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <a href="/produk"><button class="btn btn-danger mt-2">Kembali</button></a>





                <p class="text-center h4 my-3">Data Admin</p>

                <a href="/admin">
                    <div class="btn btn-primary mb-3">Tambah Admin</div>
                </a>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=0 @endphp
                        @foreach ($admin as $p)
                        @php $no++ @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->email}}</td>
                            <td>
                                <form action="/deleteAdmin/{{$p->id}}" method="POST"> @csrf @method("delete")
                                    <button type="submit" onclick="alert('yakin ingin menghapusnya?')"
                                        class="badge bg-danger">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>



@endsection