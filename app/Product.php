<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function liga()
   {
      // liga_id yang berada di dalam table Products, relasi dengan table ligas yaitu field id.
      return $this->belongsTo(Liga::class, 'liga_id', 'id');
   }

   public function pesanan_details()
   {
      return $this->hasMany(PesananDetail::class, 'product_id', 'id');
   }
}
