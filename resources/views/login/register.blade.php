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
</head>
<body>
    <br>
    <br>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="https://i.pinimg.com/564x/43/00/48/430048f53d07e801799c90612618c834.jpg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Form Registrasi</h3>
                        <p>Lakukan registrasi terlebih dahulu!!!</p>
                        <div class="page-links">
                            <a href="/login">Login</a><a href="register5.html" class="active">Register</a>
                        </div>
                        <form action="/registeruser" method="post">
                        @csrf
                            <input class="form-control" type="text" name="name" placeholder="Nama Lengkap" required>
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/jquery.min.js') }}"></script>
<script src="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/popper.min.js') }}"></script>
<script src="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/bootstrap.min.js') }}"></script>
<script src="{{asset ('yummy-master/yummy-master/loginku/brandio.io/envato/iofrm/html/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:43:07 GMT -->
</html>