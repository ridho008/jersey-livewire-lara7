<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Pesanan;
use Auth;

class History extends Component
{
   public $pesanan;
    public function render()
    {
      if(Auth::user()) {
         $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->get();
      }
        return view('livewire.history');
    }
}
