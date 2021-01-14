<div class="container">
   <div class="row">
      <div class="col-md-12">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb float-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Daftar Jersey</li>
           </ol>
         </nav>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h3><strong>{{ $title }}</strong></h3>
      </div>
      <div class="col-md-4 offset-md-2">
         <div class="input-group mb-3">
           <input type="text" wire:model="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
           <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1">Cari</span>
           </div>
         </div>
      </div>
   </div>

   <section class="product">
      <div class="row mt-2">
         @foreach($products as $product)
         <div class="col-3 mb-3">
            <div class="card shadow-sm">
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
      <div class="row">
         <div class="col-md-12">
            {{ $products->links() }}
         </div>
      </div>
   </section>
</div>