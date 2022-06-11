@extends('layouts.app')
@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                minDate: 0,
                maxDate: "+6D"
            });
        });

    </script>
</head>

<body class="fc-dark">
    <div class="bg-beranda py-5">
        <div class="container-fluid">
            <div class="container d-flex my-5 p-0">
                <div class="col-md-4 bg-white bd-abu rd p-5 text-center">
                    <h2 class="mb-3">Pencarian</h2>
                    <form method="post" action="{{ url('pencarian#cari') }}">
                        @csrf
                        <div class="d-flex align-items-center">
                            <i class="fc-teal fas fa-map-marker-alt me-2"></i>
                            <select class="form-select rounded-pill px-3 my-2 p-1 bd-teal"
                                aria-label="Default select example" name="asal" required>
                                <option hidden value="{{ $asal }}">{{ ucwords($asal) }}</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">Jakarta</option>
                                <option value="gambir">Gambir</option>
                                <option value="senen">Pasar Senen</option>
                                <option value="cakung">Cakung</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Lampung</option>
                                <option value="tanjungkarang">Tanjung Karang</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Palembang</option>
                                <option value="kertapati">Kertapati</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Yogyakarta</option>
                                <option value="lempuyangan">Lempuyangan</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Semarang</option>
                                <option value="semarangtawang">Semarangtawang</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fc-teal fas fa-map-marker-alt me-2"></i>
                            <select class="form-select rounded-pill px-3 my-2 p-1 bd-teal"
                                aria-label="Default select example" name="tujuan" required>
                                <option hidden value="{{ $tujuan }}">{{ ucwords($tujuan) }}</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">Jakarta</option>
                                <option value="gambir">Gambir</option>
                                <option value="senen">Pasar Senen</option>
                                <option value="cakung">Cakung</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Bandar Lampung</option>
                                <option value="tanjungkarang">Tanjung Karang</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Palembang</option>
                                <option value="kertapati">Kertapati</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Malang</option>
                                <option value="malang">Malang</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Yogyakarta</option>
                                <option value="lempuyangan">Lempuyangan</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">
                                    Semarang</option>
                                <option value="semarangtawang">Semarangtawang</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fc-teal fas fa-calendar-alt me-2"></i>
                            <input class="pl-3 my-2 p-1" id="datepicker" type=" text" name="tanggal_keberangkatan"
                                placeholder="Pilih tanggal keberangkatan" value="{{ $tanggal }}" required />
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fc-teal fas fa-male me-2 fa-lg"></i>
                            <select id="dewasa" class="form-select rounded-pill px-3 my-2 p-1 bd-teal ml-1"
                                name="dewasa" required>
                                <option hidden value="{{ $dewasa }}">{{ $dewasa }} Dewasa</option>
                                <option disabled class="fc-dark fw-bold bg-abu" value="">Dewasa (>2 tahun)</option>
                                <option value="1">1 Dewasa</option>
                                <option value="2">2 Dewasa</option>
                                <option value="3">3 Dewasa</option>
                                <option value="4">4 Dewasa</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fc-teal fas fa-baby me-2"></i>
                            <select id="bayi" class="form-select rounded-pill px-3 my-2 p-1 bd-teal"
                                aria-label="Default select example" name="bayi">
                                <option disabled class="fc-dark fw-bold bg-abu" value="">Bayi (kurang dari 2 tahun)
                                </option>
                                @if(!empty($bayi))
                                <option hidden value="">{{ $bayi }} Bayi</option>
                                @endif
                                <option value="0">0 Bayi</option>
                                <option value="1">1 Bayi</option>
                                <option value="2">2 Bayi</option>
                                <option value="3">3 Bayi</option>
                                <option value="4">4 Bayi</option>
                            </select>
                        </div>
                        <input class="btn btn btn-kretix mt-3" type="submit" value="Cari">
                    </form>
                </div>
                <div class="col-md-8 fc-white my-auto p-5 sd-header">
                    <h2>Cari tiket kereta?</h2>
                    <span id="typed" class="fs-2"></span>
                    <p>Harga termurah bisa kamu dapatkan di Kretix.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Stop form dan header -->

    <!-- start section 1 -->
    <div class="container py-5 px-0" id="cari">
        <h3>Hasil Pencarian Tiket</h3>
        <p>Berikut adalah hasil pencarian tiket yang anda cari</p>
        <div>
            <div class="row row-cols-1 row-cols-md-2 g-3">
                @if(!empty($tiket))
                @foreach($tiket as $tkt)
                <div class="col">
                    <div class="card fc-white border border-0">
                        <div class="row p-4 bg-dark m-0 rd-t">
                            <div class="col-md-8">
                                <h4 class="card-title">{{ $tkt->jenis }} - {{ $tkt->nama_kereta }}</h4>
                                <h5 class="card-text">Rp{{ number_format($tkt->harga) }}/orang</h5>
                            </div>
                            <div class="col-md-4 rsp rsp-2">
                                <h6>{{ ucwords($tkt->asal) }}</h6>
                                <h6>{{ ucwords($tkt->tujuan) }}</h6>
                            </div>
                        </div>
                        @if($tkt->jenis=='Ekonomi')
                        <?php $GA= 'GA'.$hari ?>
                        @if($tkt->$GA>0)
                        <div class="row bg-teal p-4 m-0 rd-b">
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
                                <form method="post" action="{{ url('detail') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $tkt->id }}" name="id">
                                    <input type="hidden" value="{{ $tanggal }}" name="tanggal">
                                    <input type="hidden" value="{{ $dewasa }}" name="dewasa">
                                    <input type="hidden" value="{{ $bayi }}" name="bayi">
                                    <input type="hidden" value="{{ $hari }}" name="hari">
                                    @if($dewasa>$sisa)
                                    <a class="fc-white text-decoration-none"><b>TIKET TERSISA {{ $sisa }}</b></a>
                                    @else
                                    <input class="btn btn btn-outline-white" type="submit" value="Pesan">
                                    @endif
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="row bg-disabled-b p-4 m-0 rd-b">
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
                                <a class="fc-dark text-decoration-none"><b>TIKET HABIS</b></a>
                            </div>
                        </div>
                        @endif
                        @endif
                        @if($tkt->jenis=='Bisnis')
                        <?php $GB= 'GB'.$hari ?>
                        @if($tkt->$GB>0)
                        <div class="row bg-teal p-4 m-0 rd-b">
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
                                <form method="post" action="{{ url('detail') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $tkt->id }}" name="id">
                                    <input type="hidden" value="{{ $tanggal }}" name="tanggal">
                                    <input type="hidden" value="{{ $dewasa }}" name="dewasa">
                                    <input type="hidden" value="{{ $bayi }}" name="bayi">
                                    <input type="hidden" value="{{ $hari }}" name="hari">
                                    @if($dewasa>$sisa)
                                    <a class="fc-white text-decoration-none"><b>TIKET TERSISA {{ $sisa }}</b></a>
                                    @else
                                    <input class="btn btn btn-outline-white" type="submit" value="Pesan">
                                    @endif
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="row bg-disabled-b p-4 m-0 rd-b">
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
                                <a class="fc-dark text-decoration-none"><b>TIKET HABIS</b></a>
                            </div>
                        </div>
                        @endif
                        @endif
                        @if($tkt->jenis=='Eksekutif')
                        <?php $GC= 'GC'.$hari ?>
                        @if($tkt->$GC>0)
                        <div class="row bg-teal p-4 m-0 rd-b">
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
                                <form method="post" action="{{ url('detail') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $tkt->id }}" name="id">
                                    <input type="hidden" value="{{ $tanggal }}" name="tanggal">
                                    <input type="hidden" value="{{ $dewasa }}" name="dewasa">
                                    <input type="hidden" value="{{ $bayi }}" name="bayi">
                                    <input type="hidden" value="{{ $hari }}" name="hari">
                                    @if($dewasa>$sisa)
                                    <a class="fc-white text-decoration-none"><b>TIKET TERSISA {{ $sisa }}</b></a>
                                    @else
                                    <input class="btn btn btn-outline-white" type="submit" value="Pesan">
                                    @endif
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="row bg-disabled-b p-4 m-0 rd-b">
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
                                <a class="fc-dark text-decoration-none"><b>TIKET HABIS</b></a>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        $('document').ready(function () {
            var typed = new Typed('#typed', {
                strings: ["Mudah dan murah?", "Kretix adalah solusinya!"],
                backSpeed: 20,
                typeSpeed: 40,
                loop: true,
                showCursor: false
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", e => {
            'use strict';
            const combo = document.getElementById("dewasa"),
                bench = document.getElementById("bayi");

            combo.addEventListener("input", e => {
                for (let i = 0; i < bench.children.length; i++) bench.children[i].hidden = e.target
                    .selectedIndex < 5 && i >
                    e.target.selectedIndex;

                /* reset second dropdown if selected item no longer available */
                if (e.target.selectedIndex && e.target.selectedIndex < 4 && bench.selectedIndex > e
                    .target
                    .selectedIndex)
                    bench.selectedIndex = 0;
            });
        });

    </script>
    @endsection
