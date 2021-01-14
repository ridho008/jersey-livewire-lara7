<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
   public function pesanan_details()
   {
      // pesanan_id di table Pesanans, relasi dengan table PesananDetails yaitu field id
      return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'user_id', 'id');
   }
}