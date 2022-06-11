@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<body class="fc-dark">
    <!-- Start Tabel -->
    <div class="container my-8">
        <h2>Halaman Admin - CRUD Tiket</h2>
        <p>Halaman ini digunakan untuk mengelola data tiket kereta api web Kretix.</p>
        <?php $i=0 ?>
        <div class="row">
            <div class="col-md-4">
                <a href="" class="btn btn-kretix my-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah
                    Tiket</a>
            </div>
            <div class="col-md-8 d-flex justify-content-end">
                <form action="{{ url('/daftartiket') }}">
                    <div class="input-group mt-3">
                        <div class="form-outline ">
                            <input type="search" id="form1" class="form-control search bd-teal rd me-2"
                                placeholder="Pencarian" style="width: 500px" name="search">
                        </div>
                        <button type="submit" class="btn mb-4 bg-teal rounded-circle">
                            <i class="fas fa-search" style="color:white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="tambahModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header mx-auto">
                        <h5 class="modal-title" id="tambahModalLabel<?= $i ?>">Form Penambahan Daftar Tiket Kereta Api
                        </h5>
                    </div>
                    <div class="modal-body d-flex">
                        <a type="button" class="btn btn-outline-kretix me-2" href="{{ url('tambahekonomi') }}">Tiket
                            Ekonomi</a>
                        <a type="button" class="btn btn-outline-kretix me-2" href="{{ url('tambahbisnis') }}">Tiket
                            Bisnis</a>
                        <a type="button" class="btn btn-outline-kretix" href="{{ url('tambaheksekutif') }}">Tiket
                            Eksekutif</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                            data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="w-100" cellpadding="15">
            <thead class="fc-dark border-bottom">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Kereta</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Stasiun Asal</th>
                    <th scope="col">Stasiun Tujuan</th>
                    <th scope="col">Perjalanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mulai perulangan -->

                @foreach($tiket as $tkt)
                <tr>
                    <th scope="row"><?=$i+1;?></th>
                    <td>{{ $tkt->id }}</td>
                    <td>
                        <a href="" class="text-decoration-none fc-teal" data-bs-toggle="modal"
                            data-bs-target="#editModal<?= $i ?>"><b>{{ ucwords($tkt->nama_kereta) }}</b></a>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal<?= $i ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title px-5" id="editModalLabel<?= $i ?>">Detail Tiket
                                            {{ $tkt->nama_kereta }}</h5>
                                    </div>
                                    <div class="modal-body px-5">
                                        <table class="table">
                                            <tr>
                                                <td class="col-md-4">Nama Kereta</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->nama_kereta }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Jenis</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->jenis }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Stasiun Asal</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->asal }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Stasiun Tujuan</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->tujuan }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Jam Berangkat</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->berangkat }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Jam Sampai</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->sampai }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Harga Tiket</td>
                                                <td class="col-md-1">:</td>
                                                <td>Rp. {{ number_format($tkt->harga) }}</td>
                                            </tr>
                                            @if($tkt->jenis == "Ekonomi")
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H1</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA1 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H2</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA2 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H3</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA3 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H4</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA4 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H5</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA5 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H6</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA6 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H7</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GA7 }} Tiket</td>
                                            </tr>

                                            @elseif($tkt->jenis == "Bisnis")
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H1</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB1 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H2</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB2 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H3</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB3 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H4</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB4 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H5</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB5 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H6</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB6 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H7</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GB7 }} Tiket</td>
                                            </tr>

                                            @else
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H1</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC1 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H2</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC2 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H3</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC3 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H4</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC4 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H5</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC5 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H6</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC6 }} Tiket</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H7</td>
                                                <td class="col-md-1">:</td>
                                                <td>{{ $tkt->GC7 }} Tiket</td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $tkt->jenis }}</td>
                    <td>{{ ucwords($tkt->asal) }}</td>
                    <td>{{ ucwords($tkt->tujuan) }}</td>
                    <td>{{ $tkt->berangkat }} - {{ $tkt->sampai }}</td>
                    <td>
                        <button type="button" class="btn btn-kretix" data-bs-toggle="modal"
                            data-bs-target="#editModalUbah<?= $i ?>">Ubah</button>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModalUbah<?= $i ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <form method="POST" action="{{ url('ubahtiket',[$tkt->id]) }}">
                                            @csrf
                                            <h5 class="modal-title px-5" id="editModalLabel<?= $i ?>">Ubah Data Tiket
                                                {{ $tkt->nama_kereta }}</h5>
                                    </div>
                                    <div class="modal-body px-5">
                                        <table class="table">
                                            <tr>
                                                <td class="col-md-4">Nama Kereta</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="text" name="upnama_kereta"
                                                        placeholder="Nama Kereta" value="{{ $tkt->nama_kereta }}" />
                                                </td>
                                            </tr>

                                            @if($tkt->jenis == "Ekonomi")
                                            <tr>
                                                <td class="col-md-4">Jenis</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0">
                                                    <select class="form-select rounded-pill px-3 my-2 p-1 m-0 bd-teal"
                                                        name="upjenis" id="upjenis">
                                                        <option value="Ekonomi" selected>{{ $tkt->jenis }}</option>
                                                        <option value="Bisnis">Bisnis</option>
                                                        <option value="Eksekutif">Eksekutif</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            @elseif($tkt->jenis == "Bisnis")
                                            <tr>
                                                <td class="col-md-4">Jenis</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0">
                                                    <select class="form-select rounded-pill px-3 my-2 p-1 m-0 bd-teal"
                                                        name="upjenis" id="upjenis">
                                                        <option value="Ekonomi">Ekonomi</option>
                                                        <option value="Bisnis" selected>{{ $tkt->jenis }}</option>
                                                        <option value="Eksekutif">Eksekutif</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td class="col-md-4">Jenis</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0">
                                                    <select class="form-select rounded-pill px-3 my-2 p-1 m-0 bd-teal"
                                                        name="upjenis" id="upjenis">
                                                        <option value="Ekonomi">Ekonomi</option>
                                                        <option value="Bisnis">Bisnis</option>
                                                        <option value="Eksekutif" selected>{{ $tkt->jenis }}</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="col-md-4">Stasiun Asal</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="text" name="upasal"
                                                        placeholder="Stasiun Asal" value="{{ $tkt->asal }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Stasiun Tujuan</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="text" name="uptujuan"
                                                        placeholder="Stasiun Tujuan" value="{{ $tkt->tujuan }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Jam Berangkat</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="time" name="upberangkat"
                                                        placeholder="Jam Berangkat" value="{{ $tkt->berangkat }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Jam Sampai</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="time" name="upsampai"
                                                        placeholder="Jam Berangkat" value="{{ $tkt->sampai }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Harga Tiket</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upharga"
                                                        placeholder="Harga Tiket" value="{{ $tkt->harga }}" /></td>
                                            </tr>

                                            @if($tkt->jenis == "Ekonomi")
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H1</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA1"
                                                        placeholder="Kapasitas Tiket H1" value="{{ $tkt->GA1 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H2</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA2"
                                                        placeholder="Kapasitas Tiket H2" value="{{ $tkt->GA2 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H3</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA3"
                                                        placeholder="Kapasitas Tiket H3" value="{{ $tkt->GA3 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H4</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA4"
                                                        placeholder="Kapasitas Tiket H4" value="{{ $tkt->GA4 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H5</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA5"
                                                        placeholder="Kapasitas Tiket H5" value="{{ $tkt->GA5 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H6</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA6"
                                                        placeholder="Kapasitas Tiket H6" value="{{ $tkt->GA6 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H7</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGA7"
                                                        placeholder="Kapasitas Tiket H7" value="{{ $tkt->GA7 }}" /></td>
                                            </tr>

                                            @elseif($tkt->jenis == "Bisnis")
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H1</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB1"
                                                        placeholder="Kapasitas Tiket H1" value="{{ $tkt->GB1 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H2</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB2"
                                                        placeholder="Kapasitas Tiket H2" value="{{ $tkt->GB2 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H3</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB3"
                                                        placeholder="Kapasitas Tiket H3" value="{{ $tkt->GB3 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H4</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB4"
                                                        placeholder="Kapasitas Tiket H4" value="{{ $tkt->GB4 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H5</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB5"
                                                        placeholder="Kapasitas Tiket H5" value="{{ $tkt->GB5 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H6</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB6"
                                                        placeholder="Kapasitas Tiket H6" value="{{ $tkt->GB6 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H7</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGB7"
                                                        placeholder="Kapasitas Tiket H7" value="{{ $tkt->GB7 }}" /></td>
                                            </tr>

                                            @else
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H1</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC1"
                                                        placeholder="Kapasitas Tiket H1" value="{{ $tkt->GC1 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H2</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC2"
                                                        placeholder="Kapasitas Tiket H2" value="{{ $tkt->GC2 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H3</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC3"
                                                        placeholder="Kapasitas Tiket H3" value="{{ $tkt->GC3 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H4</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC4"
                                                        placeholder="Kapasitas Tiket H4" value="{{ $tkt->GC4 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H5</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC5"
                                                        placeholder="Kapasitas Tiket H5" value="{{ $tkt->GC5 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H6</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC6"
                                                        placeholder="Kapasitas Tiket H6" value="{{ $tkt->GC6 }}" /></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4">Kapasitas Tiket H7</td>
                                                <td class="col-md-1">:</td>
                                                <td class="p-0"><input class="field" type="number" name="upGC7"
                                                        placeholder="Kapasitas Tiket H7" value="{{ $tkt->GC7 }}" /></td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit"
                                            class="btn btn-primary rounded-pill px-3 me-2">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal -->
                        <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-toggle="modal"
                            data-bs-target="#editModalHapus<?= $i ?>"><i class="fas fa-trash-alt"></i></button>
                        <div class="modal fade" id="editModalHapus<?= $i ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalHapusLabel<?= $i ?>">Hapus Data Tiket</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda yakin ingin menghapus data tiket kereta {{ $tkt->nama_kereta }} jenis
                                            {{ $tkt->jenis }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                            data-bs-dismiss="modal">Batal</button>
                                        <a type="submit" class="btn btn-danger rounded-pill px-3 me-2"
                                            href="{{ url('hapustiket',[$tkt->id]) }}">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php $i++ ?>
            @endforeach
        </table>
    </div>
    <!-- Stop Tabel -->

    <!-- Start Modal -->

    <!-- Stop Modal -->

</body>

</html>

@endsection