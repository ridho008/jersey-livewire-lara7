<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Pesanan;
use App\User;
use Auth;

class Checkout extends Component
{
   public $total_harga, $no_telp, $alamat;

   public function mount()
   {
      if(!Auth::user()) {
         return redirect()->to('/login');
      }

      $this->no_telp = Auth::user()->no_telp;
      $this->alamat = Auth::user()->alamat;

      $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
      if(!empty($pesanan)) {
         $this->total_harga = $pesanan->total_harga + $pesanan->kode_unik;
      } else {
         return redirect()->to('/');
      }
   }

   public function checkout()
   {
      $this->validate(
         [
         'no_telp' => 'required',
         'alamat' => 'required'
         ],
         [
            'no_telp.required' => 'No Telepon Harus Diisi.',
            'alamat.required' => 'No Telepon Harus Diisi.'
         ]
      );

      // simpan no telp & alamat
      $user = User::where('id', Auth::user()->id)->first();
      $user->no_telp = $this->no_telp;
      $user->alamat = $this->alamat;
      $user->update();

      // update data pesanan yaitu statusnya
      $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
      $pesanan->status = 1;
      $pesanan->update();

      $this->emit('masukKeranjang');
      session()->flash('message', 'Berhasil Checkout');
      return redirect()->route('history');
   }
    public function render()
    {
        return view('livewire.checkout');
    }
}
