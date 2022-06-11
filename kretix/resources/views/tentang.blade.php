@extends('layouts.app')
@section('content')
<img src="images/logo-background.png" alt="" height="100px" width="100px" class="logo-kereta">
<img src="images/logo-background.png" alt="" height="100px" width="100px" class="logo-kereta kanan">
<div class="container my-6">
    <div class="row">
        <div class="col-md-2 py-5">
            <img src="images/logo-icon.png" height="150" alt="" />
        </div>
        <div class="col-md-10 py-5">
            <h2>Apa itu <a class="fw-bold fc-teal text-decoration-none">Kretix</a>?</h2>
            <p>
                Marketplace yang didirikan pada tanggal 30 November 2021 oleh Ivan Andika, Wibisono Abiyoso,
                Jonathan Valentino, dan Anastasia Kezia yang memiliki basis operasional di Salatiga. Kretix juga
                juga bekerja sama dengan
                PT. KAI yang memberikan kemudahan bagi masyarakat untuk mencari tiket kereta api secara daring dan
                Kretix merupakan suatu trobosan baru di dunia marketplace karena menyediakan tiket kereta api dengan
                harga yang lebih
                murah dan pastinya bisa bersaing dengan marketplace lain.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h2>Mengapa kami membuat <a class="fw-bold fc-teal text-decoration-none">Kretix</a>?</h2>
            <p>
                Alasan kami membuat Kretix adalah karena perkembangan zaman dan teknologi yang semakin maju,
                khususnya di bidang digital dan membuat aktivitas kita diiringi oleh hal-hal yang berbau digital.
                Oleh karena itu, kami
                memberikan kemudahan bagi masyarakat dalam mencari dan memesan tiket kereta. Dengan adanya Kretix,
                diharapkan dapat bermanfaat bagi masyarakat Indonesia dalam melakukan perjalanan antar kota
                menggunakan moda
                transportasi kereta api.
            </p>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <img class="rd" src="images/tentang.png" width="100%" alt="" />
        </div>
    </div>
</div>
<!-- Stop section 1 -->

<!-- Start section 2 -->
<div class="container mb-5">
    <div class="text-center">
        <h2>Tim Semicolon <a class="fw-bold fc-teal text-decoration-none">PBP B</a></h2>
        <p>Siapa saja dibalik Kretix?</p>
    </div>
    <div class="row fc-dark justify-content-center my-5 mx-5">
        <div class="col d-flex justify-content-center my-3">
            <div class="text-center">
                <img class="rounded-pill" src="images/ivan.png" height="150" alt="" />
                <h5 class="mt-4 fw-bold">Ivan Andika</h5>
                <p style="font-style: italic">672019171</p>
            </div>
        </div>
        <div class="col d-flex justify-content-center my-3">
            <div class="text-center">
                <img class="rounded-pill" src="images/abi.png" height="150" alt="" />
                <h5 class="mt-4 fw-bold">Wibisono Adiyoso</h5>
                <p style="font-style: italic">672019005</p>
            </div>
        </div>
        <div class="col d-flex justify-content-center my-3">
            <div class="text-center">
                <img class="rounded-pill" src="images/joni.png" height="150" alt="" />
                <h5 class="mt-4 fw-bold">Jonathan Velentino</h5>
                <p style="font-style: italic">672019029</p>
            </div>
        </div>
        <div class="col d-flex justify-content-center my-3">
            <div class="text-center">
                <img class="rounded-pill" src="images/kezia.png" height="150" alt="" />
                <h5 class="mt-4 fw-bold">Anastasia Kezia</h5>
                <p style="font-style: italic">672019208</p>
            </div>
        </div>
    </div>
</div>
@endsection