 @extends('layouts.app')
 @section('content')
 <img src="images/logo-background.png" alt="" height="100px" width="100px" class="logo-kereta">
 <img src="images/logo-background.png" alt="" height="100px" width="100px" class="logo-kereta kanan">
 <div class="container py-5 my-5">
     <h2>Tiketku</h2>
     <p>Berikut adalah tiket yang telah anda pesan.</p>
     <div>
         <div class="row row-cols-1 row-cols-md-2 g-3">
             <?php $i=0 ?>
             @foreach($tiket as $tkt)
             <div class="col">
                 <div class="card fc-white border border-0">
                     <div class="row p-4 bg-dark m-0 rd-t">
                         <div class="col-md-8">
                             <h4 class="card-title">{{ $tkt->jenis }} - {{ $tkt->nama_kereta }}</h4>
                             <h5 class="card-text">Rp{{ number_format($tkt->harga) }}/orang</h5>
                         </div>
                         <div class="col-md-4 rsp rsp-2">
                             <h6>{{ $tkt->asal }}</h6>
                             <h6>{{ $tkt->tujuan }}</h6>
                         </div>
                     </div>
                     @if($diff[$i]<1) <div class="row bg-disabled-b p-4 m-0 rd-b">
                         @else
                         <div class="row bg-teal p-4 m-0 rd-b">
                             @endif
                             <div class="col-md-4 my-auto">
                                 <a>
                                     Waktu Berangkat<br />
                                     <b>{{ $tkt->berangkat }}</b>
                                 </a>
                             </div>
                             <div class="col-md-4 my-auto">
                                 <a>
                                     Waktu Tiba<br />
                                     <b>{{ $tkt->sampai }}</b>
                                 </a>
                             </div>
                             <div class="col-md-4 rsp rsp-2">
                                 @if($diff[$i]<1) <a class="fc-dark text-decoration-none"><b>Tidak Berlaku</b></a>
                                     @else
                                     <a class="btn btn-outline-white"
                                         href="{{ url('invoice',[$id_pesan[$i]]) }}">Invoice</a>
                                     @endif
                             </div>
                         </div>
                 </div>
             </div>
             <?php $i++ ?>
             @endforeach
         </div>
     </div>
 </div>
 @endsection