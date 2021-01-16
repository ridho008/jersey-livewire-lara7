<div class="container">
   <div class="row">
      <div class="col-md-12">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb float-right">
             <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
           </ol>
         </nav>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <h3><strong>Keranjang Belanja</strong></h3>
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
                  <th>Gambar</th>
                  <th>Keterangan</th>
                  <th>Nameset</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
               </tr>
               <?php $no = 1; ?>
               @forelse($pesananDetail as $pd)
               <tr>
                  <td>{{ $no++ }}</td>
                  <td>
                     <img src="{{ asset('assets/jersey') }}/{{ $pd->product->gambar }}" class="img-fluid" width="100">
                  </td>
                  <td>{{ $pd->product->nama }}</td>
                  <td>
                     @if($pd->nameset == 1)
                     Nama {{ $pd->nama }} <br>
                     Nomor {{ $pd->nomor }}
                     @else
                     -
                     @endif
                  </td>
                  <td>{{ $pd->jumlah_pesanan }}</td>
                  <td>{{ number_format($pd->product->harga,0,',','.') }}</td>
                  <td>{{ number_format($pd->total_harga,0,',','.') }}</td>
                  <td>
                     <span wire:click="destroy({{ $pd->id }})" class="badge badge-danger" style="cursor: pointer;">Hapus</span>
                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="7">Anda Belum Memesan Product.</td>
               </tr>
               @endforelse
               @if(!empty($pesanan))
               <tr>
                  <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                  <td><strong>Rp.{{ number_format($pesanan->total_harga,0,',','.') }}</strong></td>
                  <td></td>
               </tr>
               <tr>
                  <td colspan="6" align="right"><strong>Kode Unik :</strong></td>
                  <td><strong>{{ $pesanan->kode_unik }}</strong></td>
                  <td></td>
               </tr>
               <tr>
                  <td colspan="6" align="right"><strong>Total Yang Dibayar :</strong></td>
                  <td><strong>Rp.{{ number_format($pesanan->total_harga + $pesanan->kode_unik,0,',','.') }}</strong></td>
                  <td></td>
               </tr>
               <tr>
                  <td colspan="6"></td>
                  <td colspan="2">
                     <a href="{{ route('checkout') }}" class="btn btn-success btn-block">Checkout</a>
                  </td>
               </tr>
               @endif
            </table>
         </div>
      </div>
   </div>

   
</div>