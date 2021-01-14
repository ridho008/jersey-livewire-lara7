<div class="container">
   {{-- Banner --}}
   <div class="banner">
      <img src="{{ asset('assets/slider/slider1.png') }}" alt="">
   </div>

   {{-- Pilih Liga --}}
   <section class="pilih-liga">
      <div class="row mt-4">
         <div class="col-md-12">
            <h3>Pilih Liga</h3>
         </div>
      </div>
      <div class="row mt-2">
         @foreach($ligas as $liga)
         <div class="col-3">
            <a href="{{ route('products.liga', $liga->id) }}">
            <div class="card shadow">
               <div class="card-body text-center">
                  <img src="{{ asset('assets/liga') }}/{{ $liga->gambar }}" class="img-fluid">
               </div>
            </div>
            </a>
         </div>
         @endforeach
      </div>
   </section>

   {{-- Product --}}
   <section class="product">
      <div class="row mt-4">
         <div class="col-md-6">
            <h3>Product Terlaris</h3>
         </div>
         <div class="col-md-3 offset-md-3">
            <h6 class="float-right"><a href="{{ route('products') }}" class="btn btn-dark">Lihat Semua</a></h6>
         </div>
      </div>
      <div class="row mt-2">
         @foreach($products as $product)
         <div class="col-3">
            <div class="card shadow">
               <div class="card-body text-center">
                  <img src="{{ asset('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <h5><strong>{{ $product->nama }}</strong></h5>
                        <h5>Rp.{{ number_format($product->harga,0,',','.') }}</h5>
                        <a href="" class="btn btn-dark btn-block">Detail</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </section>
</div>