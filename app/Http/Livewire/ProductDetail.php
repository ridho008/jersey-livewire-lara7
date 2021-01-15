<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use App\Pesanan;
use App\PesananDetail;
use Auth;

class ProductDetail extends Component
{
   public $product, $jumlah_pesanan, $nomor, $nama;

   public function mount($id)
   {
      $productDetail = Product::find($id);
      if($productDetail) {
         $this->product = $productDetail;
      }
   }

   public function masukanKeranjang()
   {
    // validation input
    $this->validate([
        'jumlah_pesanan' => 'required'
      ],
      [
        'jumlah_pesanan.required' => 'Jumlah tidak boleh kosong.'
      ]);

    // jika pengguna belum login, tetapi ingin masukan barang ke keranjang
    if(!Auth::user()) {
      return redirect()->route('login');
    }

    // hitung total harga
    if(!empty($this->nama)) {
      $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_nameset;
    } else {
      $total_harga = $this->jumlah_pesanan * $this->product->harga;
    }
   
    // cek apakah user punya data DB pesanan utama
    $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
    if(empty($pesanan)) {
      // jika user belum melakukan pemesanan
      Pesanan::create([
        'user_id' => Auth::user()->id,
        'total_harga' => $total_harga,
        'status' => 0,
        'kode_unik' => mt_rand(100, 999)
      ]);

      $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
      $pesanan->kode_pemesanan = 'JRS-'. $pesanan->id;
      $pesanan->update();
    } else {
      // jika sudah memesan barang lebih dari 1/2/3 update saja total harganya
      $pesanan->total_harga = $pesanan->total_harga + $total_harga;
      $pesanan->update();
    }

    // Penyimpana DB pesanan_detail
    PesananDetail::create([
      'product_id' => $this->product->id,
      'pesanan_id' => $pesanan->id,
      'jumlah_pesanan' => $this->jumlah_pesanan,
      'nameset' => $this->nama ? true : false,
      'nama' => $this->nama,
      'nomor' => $this->nomor,
      'total_harga' => $total_harga
    ]);

     session()->flash('message', 'Pesanan Berhasil Dimasukan keranjang.');
     return redirect()->back();

   }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
