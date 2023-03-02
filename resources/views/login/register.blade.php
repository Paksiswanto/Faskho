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
    <link rel="icon" href="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png') }}">
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
                        <div class="form-group">
                           
                                <input  value="{{old('name')}}" id="username" type="text" class="form-control @error('name')
                                    is-invalid
                                @enderror" name="name" placeholder="Username" required>@error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                                

                                    

                        </div>
                        <div class="form-group">
                           

                                <input value="{{old('email')}}" id="email" type="email" class="form-control @error('email')
                                    is-invalid
                                @enderror" name="email" placeholder="Email" required>@error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror

                                   
                                        


                        </div>
                        
                            <div class="form-group" style="">
                                
                                
                                    <input  id="password" type="password" class="form-control col-100 @error('password')
                                        is-invalid
                                    @enderror" name="password" placeholder="Password" required>@error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror

                            </div>
                            
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

<!-- Mirrored from brandio.io/envato/iofrm/html/register5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2023 02:43:07 GMT -->
</html>