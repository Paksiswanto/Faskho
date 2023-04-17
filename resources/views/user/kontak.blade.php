@include('layout.headuser')
<body>
    <!-- Preloader Start -->
    <!-- Background Pattern Swither -->

    <!-- ****** Top Header Area Start ****** -->
    
    <!-- ****** Header Area End ****** -->
    <!-- ****** Header Area End ****** -->
    <style>
        #kirimBtn {
          background-color: blue;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }
      </style>
@include('layout.navkul')
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url(https://png.pngtree.com/png-clipart/20210729/ourlarge/pngtree-delicious-korean-traditional-foods-doodle-png-image_3731697.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Kontak kita</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak Kita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Contatc Area Start ****** -->
    {{-- <div class="contact-area section_padding_80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="google-map-area">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div> --}}
@foreach ($info as $row )
    

            <!-- Contact Info Area Start -->
            <div class="contact-info-area section_padding_80_50">
                <div class="row">
                    <!-- Single Contact Info -->
                    <!-- Single Contact Info -->
                    <div class="col-12 ml-auto">
                        <div class="single-contact-info mb-30 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <h4>{{ $row->kota }}</h4>
                            <p>{{ $row->alamat }}<br> Email: {{ $row->email }} <br> Telepon: {{ $row->no }}</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                </div>
            </div>
            @endforeach
            <!-- Contact Form  -->
            <div class="contact-form-area">
                <div class="row">
                    <div class="col-12 col-md-5" style="background-image: url('yummy-master/yummy-master/img/bg-img/contact.jpg'); background-attachment:fixed; background-position:start; background-repeat:no-repeat;">
                        <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s" >
                        </div>
                    </div>
                    <div class="col-12 col-md-7 item">
                        <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                            <h2 class="contact-form-title mb-30">Jika Anda Memiliki Pertanyaan Hubungi Kami Sekarang!!</h2>
                            <!-- Contact Form -->
                            <form action="/insertdataulasan" method="post">
                                @csrf
                                @auth
                                <div class="form-group">
                                    <input type="hidden" name="nama" value="{{Auth::user()->name}}" class="form-control" id="contact-name" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}" class="form-control" id="contact-email" placeholder="Email">
                                </div>
                                @endauth
                                <!-- <div class="form-group">
                                    <input type="text" class="form-control" id="contact-website" placeholder="Website">
                                </div> -->
                                <div class="form-group">
                                    <textarea required class="form-control" name="laporan" id="message" cols="30" rows="10" placeholder="Tulis Pernyataan anda"></textarea>
                                </div>
                                <button type="submit" id="kirimBtn">Kirimkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ****** Contact Area End ****** -->

    <!-- ****** Instagram Area Start ****** -->
    <div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/1.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/2.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/3.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/4.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/5.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/6.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/1.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="img/instagram-img/2.jpg" alt="">
            <!-- Hover -->
            <div class="hover_overlay">
                <div class="yummy-table">
                    <div class="yummy-table-cell">
                        <div class="follow-me text-center">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ****** Our Creative Portfolio Area End ****** -->

    <!-- ****** Footer Social Icon Area Start ****** -->
    <div class="social_icon_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-social-area d-flex">
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>facebook</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span>GOOGLE+</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span>linkedin</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i><span>VIMEO</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>YOUTUBE</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Footer Social Icon Area End ****** -->

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content">
                        <!-- Logo Area Start -->
                        <div class="footer-logo-area text-center">
                            <a href="index.html" class="yummy-logo">KulinerKu Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>KELOMPOK NOVA <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Hummasoft</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="{{asset('yummy-master/yummy-master/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('yummy-master/yummy-master/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('yummy-master/yummy-master/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins JS -->
    <script src="{{asset('yummy-master/yummy-master/js/others/plugins.js')}}"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/google-map/map-active.js"></script>
    <!-- Active JS -->
    <script src="{{asset('yummy-master/yummy-master/js/active.js')}}"></script>
    <script>
        const kirimBtn = document.querySelector('#kirimBtn');
        const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
      
        kirimBtn.addEventListener('click', (event) => {
          if (!isLoggedIn) {
            event.preventDefault(); // Mencegah form dikirimkan
            window.location.href = '/login'; // ubah "/login" dengan URL halaman login Anda
          }
        });
      </script>
</body>
