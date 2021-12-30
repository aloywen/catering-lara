<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Pengaturan;
use App\Models\Penilaian;

class UserController extends Controller
{
    public function index() 
    {
        return view('user.index');
    }

    public function log()
    {
        return view('user.index');
    }

    public function register()
    {
        return view('user.register');
    }

    public function home()
    {
        $user = \Session::get('user');
        $web = Pengaturan::find(1);
        $produk = Produk::paginate(4);
        $review = Penilaian::get();
        // dd($review);
        return view('user.home', [ 'produk' => $produk, 'web' => $web, 'review' => $review]);
    }

    public function paket()
    {
        $web = Pengaturan::find(1);
        $produk = Produk::paginate(8);

        return view('user.paket', [ 'produk' => $produk, 'web' => $web]);
    }

    public function detail_produk($id)
    {
        $user = \Session::get('user');
        $data = User::get()->where('email', $user->email)->first();
        $produk = Produk::find($id);

        return view('user.detail_produk', ['data' => $data, 'produk' => $produk]);
    }

    public function keranjang()
    {
        $user = \Session::get('user');
        $data = User::get()->where('email', $user->email)->first();
        $keranjang = Keranjang::where('customer_id', $user->id)->get();

        // dd($keranjang->harga);
        // $jumlah = $keranjang['jumlah'] * $keranjang['harga'];
        // dd($jumlah);

        return view('user.keranjang', ['data' => $data, 'keranjang' => $keranjang,]);
    }

    public function add_keranjang(Request $request)
    {
        $keranjang = $request->all();
        // $keranjang['customer_id'] = \Str::random(12);
        Keranjang::create($keranjang);
        // dd($keranjang);
        \Session::flash('keranjang', 'Berhasil Di Tambahkan!');

        return back(); 
    }

    public function hapusKeranjang($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();

        return back();
    }

    public function add_pesanan(Request $request)
    {
        // dd($request->all());
        $pesanan = Pesanan::create([
            'code_pesanan' => 'PES'.rand(0,10000000),
            'customer_id' => $request->customer_id,
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'harga' => \Str::of($request->total)->replaceMatches('/,.*|\D/', ''),
            'pemesan' => $request->pemesan,
            'no_hp' => '0'.$request->no_hp,
            'alamat' => $request->alamat,
            'status_pembayaran' => 'Belum Bayar',
            'bukti_pembayaran' => '',
            'keterangan' => 'Pending',
            'gambar' => $request->gambar,
        ]);

        \Session::flash('keranjang', 'Berhasil Di Pesan! Silahkan Upload Bukti Pembayaran');

        $keranjang = Keranjang::find($request->id);
        $keranjang->delete();



        return back();
    }

    public function dashboard_user()
    {
        $user = \Session::get('user');
        $data = User::get()->where('email', $user->email)->first();
        $pesanan = Pesanan::where('customer_id', $user->id)->get();

        return view('user.dashboard', ['data' => $data, 'pesanan' => $pesanan]);
    }

    public function detail_pesanan($id)
    {
        $user = \Session::get('user');
        $data = User::get()->where('email', $user->email)->first();
        $pesanan = Pesanan::find($id);

        return view('user.detail_pesanan', ['data' => $data, 'pesanan' => $pesanan]);
    }

    public function konfirDiterima(Request $request)
    {
        $pesanan = Pesanan::where('id',$request->id)->update([

            'keterangan' => 'Diterima',
        ]);

        \Session::flash('terima', 'Pesanan Sudah Diterima!');

        return back();
    }

    public function pembayaran_user($id)
    {
        $data = Pesanan::find($id);
        // dd($data);
        return view('user.pembayaran', compact('data'));
    }

    public function addPembayaran(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png.jpg|max:4000',
        ]);
 
        $namaGambar = $request->bukti_pembayaran->getClientOriginalName(). '-'. time(). '.' .$request->bukti_pembayaran->extension();

        $request->bukti_pembayaran->move(public_path('gambar/pembayaran'), $namaGambar);

        $pesanan = Pesanan::where('id',$request->id)->update([

            'bukti_pembayaran' => $namaGambar,
            'status_pembayaran' => 'Sudah Bayar',
        ]);

        \Session::flash('bayar', 'Pembayaran Berhasil!');

        return back();
    }

    public function edit_profil($id)
    {
        $data = User::find($id);

        return view('user.edit_profil', compact('data'));
    }

    public function editProfil(Request $request)
    {
        $user = User::where('id',$request->id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        \Session::flash('editProfil', 'Data Berhasil Diubah!');
        return back();
    }

    public function penilaian($code_pesanan, $name)
    {
        $data = Pesanan::where('code_pesanan',$code_pesanan)->first();
        $user = User::where('name',$name)->first();
        // dd($data);
        return view('user.penilaian', ['data' => $data, 'user' => $user]);
    }

    public function addPenilaian(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'gambar' => 'mimes:jpeg,png,jpg|max:4000',
            'rating' => 'required',
            'deskripsi' => 'required'
        ]);

        $namaGambar = $request->gambar->getClientOriginalName(). '-'. time(). '.' .$request->gambar->extension();

        $request->gambar->move(public_path('gambar/penilaian'), $namaGambar);

        // dd($namaGambar);
 
        $store = new Penilaian;
        $store->deskripsi = $request->deskripsi;
        $store->penilaian = $request->rating;
        $store->nama_paket_id = $request->nama_paket;
        $store->nama_id = $request->nama;
        $store->gambar = $namaGambar;
        $store->save();

        \Session::flash('penilaian', 'Tambah Penilaian Berhasil!');
        return redirect('/dashboard-user'); 
    }
}
