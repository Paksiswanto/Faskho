<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:42:31 GMT -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" href="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/iofrm-theme5.css') }}">
    <style>

    </style>
</head>

<body>
    <br>
    <br>
    <div class="row">
        <div class="img-holder" style="width:40%">
            <div class="info-holder my-auto" >
                <img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 300px">
            </div>
        </div>
       
       
            <div class="form-holder my-auto " style="60%">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Form Login</h3>
                        <p>Login agar dapat mengakses semua menu!!!
                            <br>
                            <br>
                            Belum punya akun?Registrasi dahulu!!!
                        </p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p style="font-family: Lucida Sans;">{{ $error }}</p>
                                    <a href="/hubungi"><i class="fa-solid fa-headset" style="margin-top:2%;margin-left:20%"><b>      Hubungi   Kami  !!</b></i></a>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('Error'))
    <div class="alert alert-danger">
        <center>{{ session('Error') }}</center>
        
    </div>
@endif

                        <div class="page-links">
                            <a href="/login" class="active">Login</a>
                            <a href="/register">Register</a>
                        </div>
                        <form action="/loginproses" method="post">
                            @csrf
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn mr-5">Login</button>
                                <a href="/forgot-password">Lupa Password?</a>

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

</html>
