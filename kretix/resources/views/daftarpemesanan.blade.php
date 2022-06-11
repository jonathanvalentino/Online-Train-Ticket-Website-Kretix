@extends('layouts.app')
@section('content')
<div class="container my-6">
    <div class="row">
        <h1>Halaman Admin - Daftar Pemesanan</h1>
        <p>Halaman pencarian untuk mencari daftar pemesanan dari pelanggan</p>
    </div>
    <form action="{{ url('/daftarpemesanan') }}">
        <div class="input-group mt-3">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control search bd-teal rd me-2" placeholder="Pencarian"
                    style="width: 500px" name="search">
            </div>
            <button type="submit" class="btn bg-teal mb-4 rounded-circle">
                <i class="fas fa-search" style="color:white"></i>
            </button>
        </div>
    </form>
    <table class="w-100" cellpadding="15">
        <thead class="fc-dark border-bottom">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Jumlah Orang</th>
                <th scope="col">Jenis Kereta</th>
                <th scope="col">Asal</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Tanggal Keberangkatan</th>
            </tr>
        </thead>
        <?php $i=0 ?>
        <tbody>
            @foreach ($pemesanan as $pmn)
            <tr>
                <th scope="row"><?=$i+1;?></th>
                <td><a href="" class="text-decoration-none fc-teal" data-bs-toggle="modal"
                        data-bs-target="#editModal<?= $i ?>"><b>{{ $pmn->nama_pemesan }}</b></a>
                </td>
                <td>{{ $pmn->nama_kereta }}</td>
                <td>{{ $pmn->jenis_kereta }}</td>
                <td>{{ $pmn->asal }}</td>
                <td>{{ $pmn->tujuan}}</td>
                <td>{{ $pmn->tanggal_berangkat }}</td>


                <!-- Start Modal -->
                <div class="modal fade" id="editModal<?= $i ?>" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel"><b>Detail Pemesanan</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="p-0">
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Nama Pemesan </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6"><b>{{ $pmn->nama_pemesan }}</b></div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Jumlah Orang </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->jumlah_orang }}</div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Nama Kereta </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->nama_kereta }}</div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Jenis Kereta </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->jenis_kereta }}</div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Asal </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->asal }}</div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Tujuan </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->tujuan }}</div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Tanggal berangkat </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->tanggal_berangkat }}</div>
                                    </li>
                                    <li style="list-style-type: none;" class="row">
                                        <div class="col-md-5">Jam berangkat </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-6">{{ $pmn->jam_berangkat }}</div>
                                    </li>
                                    @for($a=1 ; $a<=$pmn->jumlah_orang; $a++)
                                        <li style="list-style-type: none;" class="row">
                                            <div class="col-md-5">Nama <?= $a ?></div>
                                            <div class="col-md-1">:</div>
                                            <?php $nama= 'nama'.$a ?>
                                            <div class="col-md-6">{{ $pmn->$nama }}</div>
                                        </li>
                                        @endfor
                                        <li style="list-style-type: none;" class="row">
                                            <div class="col-md-5">Harga</div>
                                            <div class="col-md-1">:</div>
                                            <div class="col-md-6">{{ $pmn->harga }}</div>
                                        </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a class="btn bg-teal rounded-pill px-4 fc-white text-decoration-none"
                                    href="{{ url('invoice',[$pmn->id]) }}">Cetak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>


    <!-- Stop Modal -->
</div>
@endsection