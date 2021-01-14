<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use App\Liga;
use Livewire\WithPagination;

class ProductLiga extends Component
{
   use WithPagination;
   public $search, $liga;

   public function updatingSearch()
   {
      $this->resetPage();
   }

   public function mount($id)
   {
      $ligaDetail = Liga::find($id);
      if($ligaDetail) {
         $this->liga = $ligaDetail;
      }
   }

    public function render()
    {
      if($this->search) {
         $products = Product::where('liga_id', $this->liga->id)->where('nama', 'like', '%'.$this->search.'%')->paginate(8);
      } else {
         $products = Product::where('liga_id', $this->liga->id)->paginate(8);
      }
      
     return view('livewire.product-index', [
         'products' => $products,
         'title' => 'Jersey ' .$this->liga->nama
     ]);
    }
}
