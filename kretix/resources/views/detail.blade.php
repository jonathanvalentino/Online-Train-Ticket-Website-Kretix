@extends('layouts.app')
@section('content')
<div class="container py-5 my-5 px-0">
    <div class="d-flex justify-content-center px-0">
        <div class="bg-white bd-abu rd p-5">
            <h2>Detail Pemesanan Tiket</h2>
            <p>Berikut adalah tiket yang anda pilih</p>
            <!-- start tiket -->
            <div class="max-tiket my-4">
                <div class="col">
                    <div class="card fc-white border border-0">
                        <div class="row p-4 bg-dark m-0 rd-t">
                            <div class="col-md-8">
                                <h4 class="card-title">{{ $tiket->jenis }} - {{ $tiket->nama_kereta }}</h4>
                                <h5 class="card-text">Rp{{ number_format($tiket->harga) }}/orang</h5>
                            </div>
                            <div class="col-md-4 rsp rsp-2">
                                <h6>{{ $tiket->asal }}</h6>
                                <h6>{{ $tiket->tujuan }}</h6>
                            </div>
                        </div>
                        <div class="row bg-teal p-4 m-0 rd-b">
                            <div class="col-md-4 my-auto">
                                <a>
                                    Waktu Berangkat<br />
                                    <b>{{ $tiket->berangkat }}</b>
                                </a>
                            </div>
                            <div class="col-md-4 my-auto">
                                <a>
                                    Waktu Tiba<br />
                                    <b>{{ $tiket->sampai }}</b>
                                </a>
                            </div>
                            <div class="col-md-4 rsp rsp-2">
                                <a>
                                    Penumpang<br />
                                    <b>{{ $dewasa }} Dewasa
                                        @if(!empty($bayi))
                                        , {{ $bayi }} Bayi
                                        @endif</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- stop tiket -->
            <br>
            <h2>Form Pemesanan</h2>
            <p>Mohon lengkapi data dengan benar untuk melakukan pemesanan tiket.</p>

            <form method="post" action="{{ url('pemesanan') }}">
                @csrf
                @for($a=1; $a<=$dewasa; $a++) <div class="row">
                    <a><b>Data Penumpang {{ $a }}</b></a>
                    <div class="col-md-9">
                        <span><input class="field" type="text" name="penumpang{{ $a }}"
                                placeholder="Nama Lengkap Penumpang {{ $a }}" required /></span>
                    </div>
                    <div class="col-md-3">
                        <span><input class="field" type="text" name="nik{{ $a }}" placeholder="NIK"
                                required /></span><br />
                    </div>
        </div>
        @endfor
        <input class="field" type="hidden" name="id" value="{{ $tiket->id }}" />
        <input class="field" type="hidden" name="hari" value="{{ $hari }}" />
        <input class="field" type="hidden" name="dewasa" value="{{ $dewasa }}" />
        <input class="field" type="hidden" name="bayi" value="{{ $bayi }}" />
        <input class="field" type="hidden" name="tanggal" value="{{ $tanggal }}" />
        <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-outline-kretix me-2" onclick="window.history.back()">Kembali</a>
            <button class="btn btn-kretix" type="submit">Pesan</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection