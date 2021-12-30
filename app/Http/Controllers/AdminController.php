<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use App\Models\Riwayat;
use App\Models\Pengaturan;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::get()->count();
        $user = User::where('role', 'customer')->get()->count();
        $admin = User::where('role', 'admin')->get()->count();
        $pesanan = Pesanan::get()->count();


        return view('admin.dashboard', ['po' => $produk, 'user' => $user, 'pesanan' => $pesanan, 'admin' => $admin]);
    }
    public function produk()
    {
        $produk = Produk::get();

        return view('admin.produk', ['produk' => $produk]);
    }

    public function tambah_produk()
    {
        return view('admin.tambah_produk');
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->all());
        $request->validate([
            'gambar' => 'mimes:jpeg,png.jpg',
            'nama_produk' => 'required|max:100',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $namaGambar = $request->gambar->getClientOriginalName(). '-'. time(). '.' .$request->gambar->extension();

        $request->gambar->move(public_path('gambar/produk'), $namaGambar);

        // dd($namaGambar);
 
        $store = new Produk;
        $store->nama_produk = $request->nama_produk;
        $store->deskripsi = $request->deskripsi;
        $store->harga = $request->harga;
        $store->gambar = $namaGambar;
        $store->save();

        return redirect('/produk'); 
    }

    public function edit_produk($id)
    {
        $produk = Produk::find($id);

        return view('admin.edit_produk', ['produk' => $produk]);
    }

    public function editProduk(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpg,png,jpeg|max:4048',
            'nama_produk' => 'required|max:100',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
        
        if($request->gambar){
            $namaGambar = $request->gambar->getClientOriginalName(). '-'. time(). '.' .$request->gambar->extension();
            // $request->gambar->move(public_path('gambar/produk'), $namaGambar);
            $gambar = $namaGambar;
            // \File::delete($request->old);
            
        } else {
            $gambar = $request->old;
        }
        
        $produk = Produk::where('id',$request->id)->update([
            'gambar' => $gambar,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);
        // dd($produk);
        
        \Session::flash('editProduk', 'Data Telah Di Update!');
        return redirect('/produk');
    }
 
    public function hapusProduk($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        \Session::flash('hapusProduk', 'Produk Dihapus !');
        return back();
    }

    public function pemesanan()
    {
        $pesanan = Pesanan::get();

        return view('admin.pemesanan', ['pemesanan' => $pesanan]);
    }

    public function detail_pemesanan($id)
    {
        $pesanan = Pesanan::find($id);

        return view('admin.detail_pemesanan', ['pesanan' => $pesanan]);
    }

    public function pembayaran()
    {
        $pembayaran = Pesanan::get();

        return view('admin.pembayaran', ['pembayaran' => $pembayaran]);
    }

    public function prosesPembayaran(Request $request, $id)
    {
        $konfir = Pesanan::where('id',$id)->update([
            'keterangan' => 'Proses',
        ]);

        \Session::flash('bayar', 'Berhasil Diproses!');

        return back();
    }

    public function prosesPengiriman(Request $request, $id)
    {
        $konfir = Pesanan::where('id',$id)->update([
            'keterangan' => 'Kirim',
        ]);

        \Session::flash('kirim', 'Berhasil Diproses Kirim!');

        return back();
    }

    public function riwayat()
    {
        $riwayat = Pesanan::get();

        return view('admin.riwayat', ['riwayat' => $riwayat]);
    }

    public function detail_riwayat($id)
    {
        $riwayat = Pesanan::find($id);

        return view('admin.detail_riwayat', compact('riwayat'));
    }

    public function pengaturan()
    {
        $data = Pengaturan::find(1);
        $admin = User::get();

        return view('admin.pengaturan', ['data' => $data, 'admin' => $admin]);
    }

    public function admin()
    {
        $data = Pengaturan::find(1);

        return view('admin.admin', ['data' => $data]);
    }
    
    public function addAdmin(Request $request)
    {
        $attr = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $attr['role'] = 'admin';
        $attr['password'] = \Hash::make($request->password);
        // dd($attr);
        User::create($attr);

        \Session::flash('admin', 'Berhasil mambahkan admin!');
        return redirect('/pengaturan');
    }

    public function addPengaturan(Request $request)
    {
        $attr = $request->validate([
            'nama_web' => 'required|max:100',
            'tentang' => 'required',
            'unggulan1' => 'required',
            'unggulan2' => 'required',
            'unggulan3' => 'required'
        ]);

        Pengaturan::whereId(1)->update($attr);

        \Session::flash('editPengaturan', 'Berhasil Diupdate !');

        return back();
    }
}
