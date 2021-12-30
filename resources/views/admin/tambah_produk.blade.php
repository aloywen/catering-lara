@extends('admin.layout.app')
@section('title', 'Tambah Produk')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Paket Baru</h1>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-body">

                <form action="/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                        </div>
                        @error('nama_produk')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-4">
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                        @error('deskripsi')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                        @error('harga')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        @error('gambar')
                        <div class="text-danger">Tidak Boleh Kosong</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
                <a href="/produk"><button class="btn btn-danger mt-2">Kembali</button></a>


            </div>
        </div>
    </div>
</section>



@endsection

<script>
    function toRp(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.'+e(d)+''}
    
        let harga = document.getElementById("harga")

        console.log(harga);
		harga.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			toRp(harga.value);
		});


//     function total() {
//         let harga_box = document.getElementById("harga_box").value.replace(/,.*|\D/g, "");
//         // console.log(harga_box);
//         let lama_sewa = document.getElementById("lama_sewa").value;
//         // console.log(lama_sewa);
        
//         let total= harga_box * lama_sewa;
//         // console.log(total);
// }

</script>