@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<body class="fc-dark">
    <!-- Start Dashboard -->
    <div class="container pt-5 my-5">
        <div class="row fc-white rd p-0">
            <div class="col">
                <div class="bg-dark rd">
                    <div class="bg-dark py-3 px-4 rd-t">
                        <h5>Tiket Tersedia</h5>
                        <h2 class="fc-teal text-end"><b>{{ $tiket }}</b></h2>
                    </div>
                    <a class="fc-white text-decoration-none" href="{{ url('daftartiket') }}">
                        <div class="d-flex justify-content-between oth-btn-teal rd-dsb">
                            <div class="col">Lihat Detail</div>
                            <div class="col text-end px-0"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="bg-dark rd">
                    <div class="bg-dark py-3 px-4 rd-t">
                        <h5>Total Pesanan</h5>
                        <h2 class="fc-teal text-end"><b>{{ $pemesanan }}</b></h2>
                    </div>
                    <a class="fc-white text-decoration-none" href="{{ url('daftarpemesanan') }}">
                        <div class="d-flex justify-content-between oth-btn-teal rd-dsb">
                            <div class="col">Lihat Detail</div>
                            <div class="col text-end px-0"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="bg-dark rd">
                    <div class="bg-dark py-3 px-4 rd-t">
                        <h5>Jumlah Pengguna</h5>
                        <h2 class="fc-teal text-end"><b>{{ $user }}</b></h2>
                    </div>
                    <a class="fc-white text-decoration-none" href="{{ url('daftaruser') }}">
                        <div class="d-flex justify-content-between oth-btn-teal rd-dsb">
                            <div class="col">Lihat Detail</div>
                            <div class="col text-end px-0"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Stop Dashboard -->
    <!-- Start Chart -->
    <div class="mb-5">
        <div class="container p-4 bd-abu rd fs-5">
            <a style="font-size: 24px !important;">{!! $chart->container() !!}</a>
        </div>
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}

        </br>

        <div class="container p-4 bd-abu rd">
            {!! $chart1->container() !!}
        </div>
        <script src="{{ $chart1->cdn() }}"></script>
        {{ $chart1->script() }}

    </div>
    <!-- Stop Chart -->

</body>

</html>
@endsection