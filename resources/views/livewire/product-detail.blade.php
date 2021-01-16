<div class="container">
   <div class="row">
      <div class="col-md-12">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb float-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">{{ $product->nama }}</li>
           </ol>
         </nav>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h3><strong>{{ $product->nama }}</strong></h3>
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

   <div class="row product">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <img src="{{ asset('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <h3>{{ $product->nama }}</h3>
         <h5><strong>
            @if($product->is_ready == 1)
            <span class="badge badge-success">Stok Tersedia</span>
            @else
            <span class="badge badge-danger">Stok Kosong</span>
            @endif
         </strong></h5>
         <h4>Rp.{{ number_format($product->harga,0,',','.') }}</h4>
         <div class="row">
            <div class="col-md-12">
              {{-- wire:submit.prevent berfungsi sebagai saat klik button masukan keranjang, otomatis tidak akan reload --}}
              <form action="" wire:submit.prevent="masukanKeranjang">
               <table class="table" style="border-top: hidden;">
                  <tr>
                     <td>Liga</td>
                     <td>:</td>
                     <td>
                        <img src="{{ asset('assets/liga') }}/{{ $product->liga->gambar }}" class="img-fluid" width="50">
                     </td>
                  </tr>
                  <tr>
                     <td>Jenis</td>
                     <td>:</td>
                     <td>{{ $product->jenis }}</td>
                  </tr>
                  <tr>
                     <td>Jenis</td>
                     <td>:</td>
                     <td>{{ $product->berat }}</td>
                  </tr>
                  <tr>
                     <td>Jumlah</td>
                     <td>:</td>
                     <td>
                        <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" autocomplete="jumlah_pesanan" autofocus>

                          @error('jumlah_pesanan')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                     </td>
                  </tr>
                  @if($jumlah_pesanan > 1)
                  @else
                  <tr>
                     <td colspan="3"><strong>Name Set (isi jika menginginkan nameset)</strong></td>
                  </tr>
                  <tr>
                     <td>Harga NameSet</td>
                     <td>:</td>
                     <td>Rp.{{ number_format($product->harga_nameset,0,',','.') }}</td>
                  </tr>
                  <tr>
                     <td>Nama</td>
                     <td>:</td>
                     <td>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>

                          @error('nama')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                     </td>
                  </tr>
                  <tr>
                     <td>Nomor</td>
                     <td>:</td>
                     <td>
                        <input id="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor" value="{{ old('nomor') }}" autocomplete="nomor" autofocus>

                          @error('nomor')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                     </td>
                  </tr>
                  @endif
                  <tr>
                     <td colspan="3">
                        <button class="tombolPesan btn btn-dark btn-block @if($product->is_ready !== 1) disabled @endif" type="submit">Masukan Keranjang</button>
                     </td>
                  </tr>
               </table>
              </form>
            </div>
         </div>
      </div>
   </div>
</div>