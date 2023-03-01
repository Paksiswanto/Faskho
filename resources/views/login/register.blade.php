<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:43:07 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/css/iofrm-theme5.css') }}">
    <style>
         //login

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');
route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    </style>
</head>
<body>
    <br>
    <br>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 300px">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Form Registrasi</h3>
                        <p>Lakukan registrasi terlebih dahulu!!!</p>
                        <div class="page-links">
                            <a href="/login">Login</a><a href="/register" class="active">Register</a>
                        </div>
                        <form action="/registeruser" method="post">
                        @csrf
                            <input class="form-control @error('name')
                                is-invalid
                            @enderror" type="text" value="{{old('name')}}" name="name" placeholder="Nama Lengkap" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <input class="form-control @error('email')
                                is-invalid
                            @enderror" type="email" name="email" placeholder="Email" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <input class="form-control @error('password')
                                is-invalid
                            @enderror" type="password" name="password" placeholder="Password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/jquery.min.js')}}"></script>
<script src="{{asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/popper.min.js')}}"></script>
<script src="{{asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/bootstrap.min.js')}}"></script>
<script src="{{asset('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/main.js')}}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:43:07 GMT -->
</html>