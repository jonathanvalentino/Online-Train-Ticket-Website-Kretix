<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <title>Invoice</title>
</head>

<body class="fc-dark">
    <div class="my-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <img src="/images/logo-icon.png" height="50" alt="" class="d-inline-block align-text-center" />
                        <h1 class="fw-bold fc-teal ms-3" href="">Kretix</h1>
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="text-end">
                        <p class="text-danger"><b>Harap simpan baik-baik!</b></p>
                        <b>Berlaku hingga {{ $datainvoice->tanggal_berangkat }}</b>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <a class="text-decoration-none me-3 fc-teal" href="{{ url('/tiketku') }}">
                            <i class="fas fa-arrow-circle-left fa-2x"></i>
                        </a>
                        <h2>Bukti Faktur</h2>
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="text-end">
                        <a class="btn btn-kretix shadow-none" href="" onclick="printFunction()">Cetak PDF</a>
                    </div>
                </div>
            </div>
            <!--  -->
            @for ($i = 1; $i < $datainvoice->jumlah_orang+1; $i++)
                <div class="bd-abu rd">
                    <div class="d-flex justify-content-center my-3">
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <h1>P<?= $i; ?></h1>
                        </div>
                        <div class="col-10">
                            <div class="row px-4">
                                <div class="col-8">
                                    <h3 class="card-title">
                                        <b>{{ $datainvoice->jenis_kereta }} - {{ $datainvoice->nama_kereta }}</b>
                                    </h3>
                                    <h5 class="card-text">Rp {{ number_format($datainvoice->harga) }},-</h5>
                                </div>
                                <div class="col-4 text-center">
                                    <a>{{ $datainvoice->asal }}</a><br />
                                    <a>{{ $datainvoice->tujuan }}</a>
                                </div>
                            </div>
                            <div class="row px-4">
                                <div class="bd-biasa my-3"></div>
                                <div class="col-4 my-auto">
                                    <a>
                                        Waktu Berangkat<br />
                                        <b>{{ $datainvoice->jam_berangkat }}</b>
                                    </a>
                                </div>
                                <div class="col-4 my-auto">
                                    <a>
                                        Waktu Tiba<br />
                                        <b>{{ $tiket->sampai }}</b>
                                    </a>
                                </div>
                                <?php $nama= 'nama'.$i ?>
                                <div class="col-4 rsp rsp-2 text-center">
                                    <a><b>{{ $datainvoice->$nama }}</b></a><br />
                                    <a>{{ $datainvoice->tanggal_berangkat }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                @if ($i != $datainvoice->jumlah_orang)
                <div class="d-flex align-items-center">
                    <div class="bd-dash w-100"></div>
                    <i class="fas fa-cut"></i>
                </div>
                @endif
                <!--  -->
                @endfor

                <div class="container text-center mt-2">Terimakasih telah mempercayai layanan <b
                        class="fc-teal text-decoration-none">Kretix</b>!</div>
        </div>
        ​
        <script>
            function printFunction() {
                window.print();
            }

        </script>
</body>

</html>
