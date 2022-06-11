<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ url('images/logo-icon.png') }}" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".preloader").delay(800).fadeOut();
        })
        $(window).on('load', function () {
            $('#no').css('display', 'none');
            $('#no').delay(200).fadeIn(1500);
            $('#fadeinslow').delay(200).css('display', 'none');
            $('#fadeinslow').delay(1300).fadeIn(500);
        });

    </script>

    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

    </style>
    <title>Masuk</title>
</head>

<body id="no" class="fc-dark">
    <div class="preloader">
        <div class="loading">
            <img src="images/loading.gif" width="80">
        </div>
    </div>
    <div class="bg-masuk h-100 d-flex justify-content-center align-items-center">
        <div id="fadeinslow" class="w-25 bg-white text-center rd">
            <div class="row m-0">
                <a class="rd-mr-ms col-lg-6 text-decoration-none oth-btn-teal"
                    href="{{ route('login') }}"><b>Masuk</b></a>
                <a class="rd-mr-df col-lg-6 text-decoration-none oth-btn-abu"
                    href="{{ route('register') }}"><b>Daftar</b></a>
            </div>
            <div class="row">
                <div class="text-start px-5 pt-4">
                    <a class="text-decoration-none fc-teal" href="{{ url('/') }}">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="col pb-5 px-5">
                    <a href="{{ url('/') }}"><img class="mb-3" src="images/logo-icon.png" height="50px" alt="" /></a>
                    <h4 class="mb-3">Masuk <b class="fc-teal">Kretix</b></h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <span>
                            <input id="email" class="field @error('email') is-invalid @enderror" type="email"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Alamat Email" autofocus /><br />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </span>
                        <span>
                            <input id="password" type="password" class="field @error('password') is-invalid @enderror"
                                placeholder="Kata sandi" name="password" required
                                autocomplete="current-password" /><br />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </span><br />
                        @if (Route::has('password.request'))
                        <a class="text-decoration-none fc-teal" href="{{ route('password.request') }}">
                            {{ __('Lupa Kata Sandi?') }}
                        </a>
                        @endif
                        <br />
                        <button type="submit" class="btn btn-kretix mt-3">{{ __('Masuk') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
