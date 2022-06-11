@extends('layouts.app')
@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="typed.js"></script>
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
<!-- Form dan Tulisan Header -->
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
                            <option hidden value="">Stasiun Asal</option>
                            <option disabled class="fc-dark fw-bold bg-abu" value="">Jakarta</option>
                            <option value="gambir">Gambir</option>
                            <option value="senen">Pasar Senen</option>
                            <option value="cakung">Cakung</option>
                            <option disabled class="fc-dark fw-bold bg-abu" value="">Lampung</option>
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
                        <i class="fc-teal fas fa-map-marker-alt me-2"></i>
                        <select class="form-select rounded-pill px-3 my-2 p-1 bd-teal"
                            aria-label="Default select example" name="tujuan" required>
                            <option hidden value="">Stasiun Tujuan</option>
                            <option disabled class="fc-dark fw-bold bg-abu" value="">Jakarta</option>
                            <option value="gambir">Gambir</option>
                            <option value="senen">Pasar Senen</option>
                            <option value="cakung">Cakung</option>
                            <option disabled class="fc-dark fw-bold bg-abu" value="">Lampung</option>
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
                            placeholder="Pilih tanggal keberangkatan" required />
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fc-teal fas fa-male me-2 fa-lg"></i>
                        <select id="dewasa" class="form-select rounded-pill px-3 my-2 p-1 bd-teal ml-1" name="dewasa"
                            required>
                            <option hidden value="">Jumlah Orang Dewasa</option>
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
                            <option disabled class="fc-dark fw-bold bg-abu" value="">Bayi (kurang dari 2 tahun)</option>
                            <option hidden value="">0 Bayi</option>
                            <option value="1">1 Bayi</option>
                            <option value="2">2 Bayi</option>
                            <option value="3">3 Bayi</option>
                            <option value="4">4 Bayi</option>
                        </select>
                    </div>
                    <input class="btn btn-kretix mt-3" type="submit" value="Cari">
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

<!-- Start section 1 -->
<div class="container-fluid bg-abu-teal">
    <div class="container bg-white bd-abu rd-b p-5 text-center border-top-0">
        <h2>Informasi Cara Pemesanan Tiket</h2>
        <p>Ingin memesan tiket kereta? Caranya mudah sekali!</p>
        <div class="row my-5 fc-white fw-bold">
            <div class="col-lg-3 d-flex justify-content-center my-3">
                <p class="circle bg-teal d-flex align-items-center justify-content-center oth-btn-teal">Cari Tiket</p>
            </div>
            <div class="col-lg-3 d-flex justify-content-center my-3">
                <p class="circle bg-teal d-flex align-items-center justify-content-center oth-btn-teal">Pilih Tiket</p>
            </div>
            <div class="col-lg-3 d-flex justify-content-center my-3">
                <p class="circle bg-teal d-flex align-items-center justify-content-center oth-btn-teal">
                    Lakukan<br />Pembayaran</p>
            </div>
            <div class="col-lg-3 d-flex justify-content-center my-3">
                <p class="circle bg-teal d-flex align-items-center justify-content-center oth-btn-teal">Cetak Invoice
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Stop section 1 -->

<!-- Start Section 2 -->
<div class="container-fluid bg-teal py-5">
    <div class="container fc-white text-center">
        <h2>Ketentuan Pemesanan Tiket</h2>
        <p>Berikut adalah ketentuan pemesanan tiket di Kretix :</p>
    </div>
    <div class="container fc-white w-50 my-5">
        <ul>
            <li>
                Fasilitas reservasi online tiket Kereta Api hanya berlaku untuk perjalanan Kereta Api yang tercantum
                dalam sisten reservasi online tiket kereta api pada aplikasi Kretix.
            </li>
            <li>Reservasi tiket Kereta Api dapat dilakukan mulai H-7 s.d hari h sebelum jadwal keberangkatan Kereta Api.
                Pembayaran harus dilakukan segera saat memesan tiket kereta.</li>
            <li>
                Pastikan data perjalanan dan data penumpang telah diisi dengan benar. Bagi penumpang berusia diatas 3
                tahun
                atau lebih wajib mengisi nomor bukti identitas Nomor Induk Kependudukan.
            </li>
            <li>Bukti pembayaran tiket Kereta Api akan dikeluarkan setelah pembayaran disetujui dan dikirim ke alamat
                e-mail pemesan tiket.</li>
            <li>
                Harap nama penumpang dan NIK diisi dengan benar sebagai data verifikasi bagi web kretix.
            </li>
        </ul>
    </div>
</div>
<script>
    $('document').ready(function () {
        var typed = new Typed('#typed', {
            strings: ["Mudah, Murah, Cepat.", "Kretix adalah solusinya!"],
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
            if (e.target.selectedIndex && e.target.selectedIndex < 4 && bench.selectedIndex > e.target
                .selectedIndex)
                bench.selectedIndex = 0;
        });
    });

</script>
@endsection
