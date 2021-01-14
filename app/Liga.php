<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
   public function products()
   {
      // liga_id yang ada di table Products, relasi dengan id liga table ligas
      return $this->hasMany(Product::class, 'liga_id', 'id');
   }
}
