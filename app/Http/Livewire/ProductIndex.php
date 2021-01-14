<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use Livewire\WithPagination;

class ProductIndex extends Component
{
   use WithPagination;
   public $search;

   public function updatingSearch()
   {
      $this->resetPage();
   }

    public function render()
    {
      if($this->search) {
         $products = Product::where('nama', 'like', '%'.$this->search.'%')->paginate(8);
      } else {
         $products = Product::paginate(8);
      }
      
     return view('livewire.product-index', [
         'products' => $products,
         'title' => 'Daftar Jersey'
     ]);
    }
}
