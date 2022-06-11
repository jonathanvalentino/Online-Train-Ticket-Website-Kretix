<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Lupa Kata Sandi</title>
</head>

<body class="fc-dark">
    <div class="bg-lupasandi h-100 d-flex justify-content-center align-items-center">
        <div class="w-25 bg-white text-center rd">
            <div class="row m-0">
                <a class="rd-t col bg-teal text-decoration-none fc-white px-5 py-2"><b>Ubah Kata Sandi</b></a>
            </div>
            <div class="row">
                <div class="col p-5">
                    <img class="mb-4" src="{{ asset('images/logo-icon.png') }}" height="50px" alt="">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input id="email" type="email" class="field @error('email') is-invalid @enderror" name="email"
                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="password" type="password" class="field @error('password') is-invalid @enderror"
                            name="password" placeholder="Kata Sandi Baru" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="password-confirm" type="password" class="field" name="password_confirmation"
                            placeholder="Konfirmasi Kata Sandi" required autocomplete="new-password">
                        <button class="btn bg-teal fc-white rounded-pill mt-4 px-4" type="submit">Ubah</button>
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
