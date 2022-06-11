@extends('layouts.app')

@section('content')

<body class="f-color">
    <!-- start form -->
    <div class="container py-5 my-5 px-0">
        <div class="bd-abu p-5 rd">
            <h2>Tambah Daftar Tiket Kereta Api Jenis Eksekutif</h2>
            <form method="POST" action="{{ url('uploadeksekutif') }}">
                {{ csrf_field() }}
                <div class="my-5">
                    <input name="upjenis" type="hidden" value="Eksekutif">
                    <table cellpadding="5" class="">
                        <tr>
                            <th class="col-2">Nama Kereta Api</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="text" name="upnama_kereta"
                                        placeholder="Masukkan nama kereta api" required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Stasiun Asal</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="text" name="upasal"
                                        placeholder="Masukkan stasiun asal pemberangkatan kereta api"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Stasiun Tujuan</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="text" name="uptujuan"
                                        placeholder="Masukkan stasiun tujuan kedatangan kereta api"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Jam Berangkat</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="time" name="upberangkat"
                                        placeholder="Masukkan jam keberangkatan kereta api" required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Jam Sampai</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="time" name="upsampai"
                                        placeholder="Masukkan jam sampai tujuan kereta api" required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Harga Tiket</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upharga"
                                        placeholder="Masukkan harga tiket kereta api" required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H1</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC1"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-1"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H2</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC2"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-2"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H3</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC3"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-3"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H4</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC4"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-4"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H5</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC5"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-5"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H6</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC6"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-6"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H7</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGC7"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-7"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <input name="upGA1" type="hidden" value="">
                        <input name="upGA2" type="hidden" value="">
                        <input name="upGA3" type="hidden" value="">
                        <input name="upGA4" type="hidden" value="">
                        <input name="upGA5" type="hidden" value="">
                        <input name="upGA6" type="hidden" value="">
                        <input name="upGA7" type="hidden" value="">
                        <input name="upGB1" type="hidden" value="">
                        <input name="upGB2" type="hidden" value="">
                        <input name="upGB3" type="hidden" value="">
                        <input name="upGB4" type="hidden" value="">
                        <input name="upGB5" type="hidden" value="">
                        <input name="upGB6" type="hidden" value="">
                        <input name="upGB7" type="hidden" value="">
                    </table>
                </div>
                <div class="w-100 d-flex justify-content-end">
                    <a type="submit" class="btn btn-outline-kretix me-2" href="{{ url('daftartiket') }}">Batal</a>
                    <button type="submit" class="btn btn-kretix">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection