@extends('layouts.app')
@section('content')

<body class="fc-dark">
    <img src="images/logo-background.png" alt="" height="100px" width="100px" class="logo-kereta">
    <img src="images/logo-background.png" alt="" height="100px" width="100px" class="logo-kereta kanan">
    <div class="container py-7 px-5">
        <div class="row gx-3">
            <div class="d-flex justify-content-center">
                <div class="col-md-8 my-4">
                    <div class="bg-white bd-abu rd p-5">
                        <h2 class="fc-teal"><b>Profil Pengguna</b></h2>
                        <!-- Start Foto -->
                        <div class="row">
                            <div class="col py-2 mx-5 d-flex align-items-center">

                                <!-- <img src="./images/image-ft-1.png" class="pp" alt="" />
                                            <a class="editpp" href="">aaaaaa</a> -->
                                <div class="container-profilepic card rounded-circle overflow-hidden">
                                    <div class="card-img w-100 h-100 pp"><img height="100"
                                            src="/fotoprofil/{{ $user->foto }}" alt="" />
                                    </div>
                                    <div
                                        class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">
                                        <div class="text-profilepic">
                                            <i class="fas fa-camera"></i>
                                            <a data-bs-toggle="modal" data-bs-target="#editFoto"
                                                class="f-color text-decoration-none text-profilepic">Ubah</a>
                                        </div>
                                    </div>
                                </div>


                                <!--Modal gambar -->
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Ubah foto profil</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('ubahfoto') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" class="form-control" id="customFile"
                                                        name="gambar" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit"
                                                    class="btn btn-primary rounded-pill px-3 me-2">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 py-3 m-3">
                                <h3><b>{{ $user->name }}
                                    </b><a style="color:teal;" href="#" id="mylink" onclick="myfunction()"><i
                                            class="far fa-edit fa-xs"></i></a></i></h3>

                                <div id="myform" style="display:none">
                                    <form method="POST" class="w-100" action="{{ url('ubahnama') }}">
                                        <div class="d-flex">
                                            @csrf
                                            <span><input class="field" type="text" name="name"
                                                    placeholder="Nama lengkap" value="{{ $user->name }}" /><br /></span>
                                            <button class="btn bg-teal rounded-pill fc-white px-4 m-3"
                                                type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <script>
                                    function myfunction() {
                                        document.getElementById("myform").style.display = "block";
                                        document.getElementById("mylink").style.display = "none";
                                    }

                                    $(document).ready(function () {
                                        $("#mylink").click(function () {
                                            $("h3").remove();
                                        });
                                    });

                                </script>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                        <!-- Stop Foto -->
                        <!-- Start Form Lupa Kata Sandi -->
                        <form method="POST" action="{{ url('ubahsandi') }}">
                            @csrf
                            <div class="mt-3">
                                <h2><b>Ubah Kata Sandi</b></h2>
                                <form action="post" class="mt-4 w-100">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label for="">Kata sandi baru</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                class="field-ganti-sandi @error('password') is-invalid @enderror"
                                                name="password" placeholder="Kata sandi baru"><br />
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 mt-2">
                                            <label for="">Konfirmasi kata sandi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="field-ganti-sandi"
                                                name="password_confirmation" placeholder="Konfirmasi kata sandi" />
                                        </div>
                                    </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn bg-teal rounded-pill fc-white ms-2 px-4 mt-4"
                                    type="submit">Ubah</button>
                            </div>
                        </form>
                        <!-- Stop From Lupa Kata Sandi -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
