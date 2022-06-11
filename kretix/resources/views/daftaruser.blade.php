@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<body class="fc-dark">
    <!-- Start Tabel -->
    <div class="container my-8">
        <h2>Halaman Admin - CRUD User</h2>
        <p>Halaman ini digunakan untuk mengelola data user yang terdaftar di database.</p>
        <table class="w-100" cellpadding="15">
            <thead class="fc-dark border-bottom">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                ?>
                @foreach ($users as $us)
                @if($us->hasRole('user'))
                <tr>
                    <th scope="row"><?=$i+1;?></th>
                    <td>{{ $us->id }}</td>
                    <td>{{ $us->name }}</td>
                    <td>{{ $us->email }}</td>
                    <td>
                        <button type="button" class="btn btn-kretix" data-bs-toggle="modal"
                            data-bs-target="#EditModal<?= $i ?>">Ubah</button>
                        <button type="button" class="btn btn-danger rounded-pill px-4 shd-blue me-2"
                            data-bs-toggle="modal" data-bs-target="#HapusModal<?= $i ?>"><i
                                class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <div class="modal fade" id="HapusModal<?= $i ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="HapusModalLabel<?= $i ?>">Hapus</h5>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin menghapus data {{ $us->id }} {{ $us->name }} dari database?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                    data-bs-dismiss="modal">Batal</button>
                                <a type="submit" class="btn btn-danger rounded-pill px-3 me-2"
                                    href="{{ url('hapususer', [$us->id]) }}">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="EditModal<?= $i ?>" tabindex="-1" aria-labelledby="EditModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditModalLabel<?= $i ?>">Ubah Data User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('ubahuser') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $us->id }}" />
                                    <span><input class="field" type="text" name="name"
                                            value="{{ $us->name }}" /><br /></span>
                                    <span><input class="field" type="text" name="email"
                                            value="{{ $us->email }}" /><br /></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit"
                                    class="btn bg-teal fc-white rounded-pill px-3 me-2">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Stop Tabel -->
</body>

</html>
@endsection