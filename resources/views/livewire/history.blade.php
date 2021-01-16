<div class="container">
   <div class="row">
      <div class="col-md-12">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb float-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
             <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
             <li class="breadcrumb-item active" aria-current="page">History</li>
           </ol>
         </nav>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h3><strong>History</strong></h3>
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
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table table-striped table-bordered">
               <tr>
                  <th>No</th>
                  <th>Tanggal Pesan</th>
                  <th>Kode Pesanan</th>
                  <th>Pesanan</th>
                  <th>Status</th>
                  <th>Total Harga</th>
               </tr>
               <?php $no = 1; ?>
               @forelse($pesanan as $pd)
               <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $pd->created_at }}</td>
                  <td>{{ $pd->kode_pemesanan }}</td>
                  <td>
                     <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pd->id)->get(); ?>
                     @foreach($pesanan_details as $pds)
                     <img src="{{ asset('assets/jersey') }}/{{ $pds->product->gambar }}" class="img-fluid" width="90">
                     {{ $pds->product->nama }}<br>
                     @endforeach
                  </td>
                  <td>
                     @if($pd->status == 1)
                     Belum Bayar
                     @else
                     Lunas
                     @endif
                  </td>
                  <td>{{ number_format($pd->total_harga + $pd->kode_unik,0,',','.') }}</td>
               </tr>
               @empty
               <tr>
                  <td colspan="7">Anda Belum Memesan Product.</td>
               </tr>
               @endforelse
            </table>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <div class="alert alert-info" role="alert">untuk pembayaran silahkan dapat transfer direkening dibawah ini :</div>
         <div class="media">
           <img src="{{ asset('assets/bri.png') }}" class="mr-3" width="80">
           <div class="media-body">
             <h5 class="mt-0">BRI</h5>No.Rekening 123-425-423-325 <strong>Ridho Surya</strong>
           </div>
         </div>
      </div>
   </div>
   
</div>