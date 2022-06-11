@extends('layouts.app')
@section('content')
<div class="container py-5 my-5 p-0">
    <div class="row g-3">
        <div class="col-md-8">
            <div class="bd-abu rd p-5">
                <form method="post" action="{{ url('bayar') }}">
                    @csrf
                    <h2>Metode Pembayaran</h2>
                    <p>Silakan mengisi data dengan lengkap untuk melakukan pembayaran.</p>
                    <select id="bayi" class="form-select rounded-pill px-3 my-2 p-1 bd-teal"
                        aria-label="Default select example" name="bayi" required>
                        <option hidden value="">Layanan</option>
                        <option disabled class="fc-dark fw-bold bg-abu" value="">Pembayaran E-Money</option>
                        <option value="gopay">Gopay : 081212888888</option>
                        <option value="2">Dana : 081212888888</option>
                        <option value="3">OVO : 081212888888</option>
                        <option disabled class="fc-dark fw-bold bg-abu" value="">Transfer Bank</option>
                        <option value="4">BCA : 0231321123</option>
                        <option value="5">BRI : 2233324323</option>
                        <option value="6">Mandiri : 128372938</option>
                    </select>
                    <span><input class="field" type="text" name="" placeholder="Atas Nama Pembayar" required /></span>
                    <span><input class="field" type="text" name="" placeholder="Nomor e-money atau rekening"
                            required /></span>
                    <br />
                    <h2>Total Biaya</h2>
                    <p>Berikut adalah rincian biaya yang harus anda bayarkan.</p>
                    <div class="row">
                        <div class="col-md-10">Harga</div>
                        <div class="col-md-2 text-end">{{ number_format($tiket->harga) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Jumlah Tiket</div>
                        <div class="col-md-2 text-end">{{ $dewasa }}</div>
                    </div>
                    <div class="w-100 bg-dark border-bottom my-2"></div>
                    <div class="row">
                        <div class="col-md-10"><b>Harga Total</b></div>
                        <div class="col-md-2 text-end"><b>{{ number_format($tiket->harga*$dewasa) }}</b></div>
                    </div>
                    <input class="field" type="hidden" name="id" value="{{ $tiket->id }}" />
                    <input class="field" type="hidden" name="hari" value="{{ $hari }}" />
                    <input class="field" type="hidden" name="dewasa" value="{{ $dewasa }}" />
                    <input class="field" type="hidden" name="bayi" value="{{ $bayi }}" />
                    <input class="field" type="hidden" name="tanggal" value="{{ $tanggal }}" />
                    <input class="field" type="hidden" name="penumpang1" value="{{ $penumpang1 }}" />
                    <input class="field" type="hidden" name="penumpang2" value="{{ $penumpang2 }}" />
                    <input class="field" type="hidden" name="penumpang3" value="{{ $penumpang3 }}" />
                    <input class="field" type="hidden" name="penumpang4" value="{{ $penumpang4 }}" />
                    <input class="field" type="hidden" name="nik1" value="{{ $nik1 }}" />
                    <input class="field" type="hidden" name="nik2" value="{{ $nik2 }}" />
                    <input class="field" type="hidden" name="nik3" value="{{ $nik3 }}" />
                    <input class="field" type="hidden" name="nik4" value="{{ $nik4 }}" />
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-kretix me-2" onclick="window.history.back()">Batal</a>
                        <button class="btn btn-kretix" type="submit">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bd-abu rd p-5">
                <h2>Cara Melakukan Pembayaran</h2>
                <ul>
                    <li class="border-bottom py-2">Pilih layanan pembayaran yang akan anda gunakan</li>
                    <li class="border-bottom py-2">Isi atas nama pembayar</li>
                    <li class="border-bottom py-2">Isi nomor e-money atau rekening</li>
                    <li class="border-bottom py-2">Anda dapat melihat rincian pembayaran pada bagian Total Biaya</li>
                    <li class="py-2">Jika semua data sudah dipastikan benar, silakan klik tombol Bayar</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
