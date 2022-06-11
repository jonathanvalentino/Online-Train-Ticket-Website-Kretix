@extends('layouts.app')

@section('content')

<body class="f-color">
    <!-- start form -->
    <div class="container py-5 my-5 px-0">
        <div class="bd-abu p-5 rd">
            <h2>Tambah Daftar Tiket Kereta Api Jenis Ekonomi</h2>
            <form method="POST" action="{{ url('uploadekonomi') }}">
                {{ csrf_field() }}
                <div class="my-5">
                    <input name="upjenis" type="hidden" value="Ekonomi">
                    <table cellpadding="5" class="w-100">
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
                                <span><input class="field" type="number" name="upGA1"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-1"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H2</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGA2"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-2"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H3</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGA3"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-3"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H4</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGA4"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-4"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H5</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGA5"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-5"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H6</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGA6"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-6"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2">Kapasitas Tiket H7</th>
                            <td>:</td>
                            <td>
                                <span><input class="field" type="number" name="upGA7"
                                        placeholder="Masukkan banyak tiket tersedia pada hari-7"
                                        required /><br /></span>
                            </td>
                        </tr>
                        <input name="upGB1" type="hidden" value="">
                        <input name="upGB2" type="hidden" value="">
                        <input name="upGB3" type="hidden" value="">
                        <input name="upGB4" type="hidden" value="">
                        <input name="upGB5" type="hidden" value="">
                        <input name="upGB6" type="hidden" value="">
                        <input name="upGB7" type="hidden" value="">
                        <input name="upGC1" type="hidden" value="">
                        <input name="upGC2" type="hidden" value="">
                        <input name="upGC3" type="hidden" value="">
                        <input name="upGC4" type="hidden" value="">
                        <input name="upGC5" type="hidden" value="">
                        <input name="upGC6" type="hidden" value="">
                        <input name="upGC7" type="hidden" value="">
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