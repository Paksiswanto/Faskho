<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:42:31 GMT -->

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
            <div class="info-holder my-auto" >
                <img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 300px">
            </div>
        </div>
       
            <div class="form-holder my-auto ">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Form Login</h3>
                        <p>Login agar dapat mengakses semua menu!!!
                            <br>
                            <br>
                            Belum punya akun?Registrasi dahulu!!!
                        </p>
                        <div class="page-links">
                            <a href="/login" class="active">Login</a>
                            <a href="/register">Register</a>
                        </div>
                        <form action="/loginproses" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="username" type="email" class="form-control @error('email')
                                        is-invalid
                                    @enderror" name="email" placeholder="Username" required>@error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="showPassword()">
                                            <i id="show-password-icon" class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password')
                                        is-invalid
                                    @enderror" name="password" placeholder="Password" required>@error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="input-group-append" style="background-color: transparent">
                                        <span class="input-group-text" onclick="showPassword()">
                                            <i id="show-password-icon" class="fa fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
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
    <script>
        function showPassword() {
            var password = document.getElementById("password");
            var icon = document.getElementById("show-password-icon");
    
            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                password.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:42:35 GMT -->

</html>
