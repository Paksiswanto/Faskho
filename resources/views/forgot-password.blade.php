<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:42:31 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="icon" href="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/iofrm-theme5.css') }}">
    <style>
        #wrapper {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 960px;
            /* sesuaikan dengan lebar konten Anda */
        }

    </style>
</head>

<body>
    <br>
    <br>
    <div class="row">
        <div class="img-holder">
            <div class="info-holder my-auto">
                <img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 300px">
            </div>
        </div>


        <div class="form-holder my-auto ">
            <div class="form-content">
                <div class="form-items">
                    <h3>Masukkan Email</h3>
                    <p> Pastikan Email Sudah Terdafta Di Web.
                        <br>
                        <br>
                    </p>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <p style="font-family: Lucida Sans;">{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="page-links">
                            <a href="/login" >Login</a>
                        </div>
                 <form method="POST" action="{{ route('forgot.password') }}">
                        @csrf
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/jquery.min.js') }}"></script>
    <script src="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/popper.min.js') }}"></script>
    <script src="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:42:35 GMT -->

