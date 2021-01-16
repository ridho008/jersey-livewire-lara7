<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Pesanan;
use App\PesananDetail;
use Auth;

class Keranjang extends Component
{
   protected $pesanan,
             $pesananDetail = [];

   public function destroy($id)
   {
      $pesananDetail = PesananDetail::find($id);
      if(!empty($pesananDetail)) {
         $pesanan = Pesanan::where('id', $pesananDetail->pesanan_id)->first();
         $jumlahPesananDetail = PesananDetail::where('pesanan_id', $pesanan->id)->count();
         if($jumlahPesananDetail == 1) {
            $pesanan->delete();
         } else {
            $pesanan->total_harga = $pesanan->total_harga - $pesananDetail->total_harga;
            $pesanan->update();
         }

         $pesananDetail->delete();
         $this->emit('masukKeranjang');
         session()->flash('message', 'Pesanan Berhasil Dihapus.');
         return redirect()->back();
      }
   }

    public function render()
    {
      if(Auth::user()) {
         $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
         if($this->pesanan) {
            $this->pesananDetail = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
         }
      }
        return view('livewire.keranjang', [
         'pesanan' => $this->pesanan,
         'pesananDetail' => $this->pesananDetail
        ]);
    }
}
