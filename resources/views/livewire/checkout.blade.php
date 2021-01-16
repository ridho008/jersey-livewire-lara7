<div class="container">
   <div class="row">
      <div class="col-md-12">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb float-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
             <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
             <li class="breadcrumb-item active" aria-current="page">Checkout</li>
           </ol>
         </nav>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h3><strong>Checkout</strong></h3>
      </div>
      <div class="col-md-2 offset-md-4 float-right">
         <a href="{{ route('keranjang') }}" class="btn btn-dark">Kembali</a>
      </div>
   </div>

   <div class="row">
     <div class="col-md-6">
       @if (session()->has('message'))
           <div class="alert alert-success">
               {{ session('message') }}
           </div>
       @endif
     </div>
   </div>

   <div class="row">
      <div class="col-md-6">
         <h4>Informasi Pembayaran</h4>
         <div class="alert alert-info" role="alert">untuk pembayaran silahkan dapat transfer direkening dibawah ini sebesar : <strong>Rp.{{ number_format($total_harga,0,',','.') }}</strong></div>
         <div class="media">
           <img src="{{ asset('assets/bri.png') }}" class="mr-3" width="80">
           <div class="media-body">
             <h5 class="mt-0">BRI</h5>No.Rekening 123-425-423-325 <strong>Ridho Surya</strong>
           </div>
         </div>
         <hr>
      </div>
      <div class="col-md-6">
         <h4>Informasi Pengiriman</h4>
         <form wire:submit.prevent="checkout">
            <div class="form-group">
               <label for="no_telp">Telepon</label>
               <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" wire:model="no_telp" value="{{ old('no_telp') }}" autocomplete="no_telp" autofocus>

              @error('no_telp')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
               <label for="alamat">Alamat</label>
               <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus>

              @error('alamat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-dark">Checkout</button>
            </div>
         </form>
         <hr>
      </div>
   </div>

   
</div>