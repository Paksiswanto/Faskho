<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>KulinerKu - Food Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Favicon -->
    <link rel="iacon" href="{{asset('yummy-master/yummy-master/img/core-img/mkmk-removebg-preview.png')}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('yummy-master/yummy-master/style.css')}}" rel="stylesheet">
    <style>
.search-container {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

.search-box {
  display: flex;
  align-items: center;
  width: 300px;
  border: 1px solid #ccc;
  border-radius: 25px;
  overflow: hidden;
}

.search-box input[type="text"] {
  flex: 1;
  border: none;
  outline: none;
  padding: 10px;
  font-size: 16px;
}

.search-box button {
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 0 25px 25px 0;
  cursor: pointer;
  padding: 10px 20px;
  font-size: 16px;
}

    </style>

    <!-- Responsive CSS -->
    <link href="{{asset('yummy-master/yummy-master/css/responsive/responsive.css')}}" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

    <!-- Background Pattern Swither -->


    <!-- ****** Top Header Area Start ****** -->
    @include('layout.navkul')
    <!-- ****** Header Area End ****** -->
    <div class="search-container">
        <form>
          <div class="search-box">
            <input type="text" placeholder="Search...">
            <button type="submit"><span class="fas fa-search"></span>
            </button>
          </div>
        </form>
      </div>
      <br>
    <!-- ****** Welcome Post Area Start ****** -->
    <section class="welcome-post-sliders owl-carousel">

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-1.jpg')}}" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">Mei 19, 2017</a>
                    <a href="#">5 Comment</a>
                </div>
                <a href="#">
                    <h5>“I've Come and I’m Gone”: A Tribute to Istanbul’s Street</h5>
                </a>
            </div>
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-2.jpg')}}" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">Mei 19, 2017</a>
                    <a href="#">5 Comment</a>
                </div>
                <a href="#">
                    <h5>“I’ve Come and I’m Gone”: A Tribute to Istanbul’s Street</h5>
                </a>
            </div>
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-3.jpg')}}" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">Mei 19, 2017</a>
                    <a href="#">5 Comment</a>
                </div>
                <a href="#">
                    <h5>“I’ve Come and I’m Gone”: A Tribute to Istanbul’s Street</h5>
                </a>
            </div>
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-4.jpg')}}" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">Mei 19, 2017</a>
                    <a href="#">5 Comment</a>
                </div>
                <a href="#">
                    <h5>“I’ve Come and I’m Gone”: A Tribute to Istanbul’s Street</h5>
                </a>
            </div>
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-4.jpg')}}" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#">Mei 19, 2017</a>
                    <a href="#">5 Comment</a>
                </div>
                <a href="#">
                    <h5>“I’ve Come and I’m Gone”: A Tribute to Istanbul’s Street</h5>
                </a>
            </div>
        </div>

    </section>
    <!-- ****** Welcome Area End ****** -->
     

    <!-- ****** Blog Area Start ****** -->
    <section class="blog_area section_padding_0_80 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">

                        <!-- Single Post -->
                        <div class="col-12">
                            <div class="single-post wow fadeInUp" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{asset('yummy-master/yummy-master/img/blog-img/1.jpg')}}" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By Marian</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">May 19, 2017</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h2 class="post-headline">Sop Ayam Pak Min Klaten</h2>
                                    </a>
                                    <p>Sop ayam Pak Min Klaten tak cuma mengandalkan branding saja. Rasanya terkenal sedap, apalagi mereka menggunakan ayam kampung. Kamu dapat mengunjungi salah satu cabangnya yang cukup ramai di Jalan Meruya Selatan Nomor 19, Jakarta Barat.</p>
                                    <a href="#" class="read-more">Lanjut Membaca...</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{asset('yummy-master/yummy-master/img/blog-img/45.jpg')}}" style="width: 75%;height:fit-content;">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By Marian</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">May 19, 2017</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/single1">
                                        <h4 class="post-headline">Swara Alam Suasana Sejuk Aman di kantong</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{asset('yummy-master/yummy-master/img/blog-img/10.jpg')}}" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By Marian</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">May 19, 2017</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="single.html">
                                        <h4 class="post-headline">Tempat Mendapatkan Sunday Roast Terbaik Di Malang</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-post wow fadeInUp" data-wow-delay=".6s">
                                <!-- Post Thumb -->
                              
                            </div>
                        </div>

                        <!-- Single Post -->
                        

                        <!-- Single Post -->
                        

                        <!-- ******* List Blog Area Start ******* -->

                        <!-- Single Post -->
                        <div class="col-12">
                            <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="img/blog-img/6.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By Marian</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">May 19, 2017</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h4 class="post-headline">10 Bar Terbaik Di Tepi Laut Di Malang Selatan, Malang</h4>
                                    </a>
                                    <p>Pada saat yang sama mereka jatuh ke dalam rasa sakit dan penderitaan yang luar biasa. Untuk sampai ke detail terkecil, apa latihan kita?</p>
                                    <a href="#" class="read-more">Lanjut Membaca...</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12">
                            <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".4s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="img/blog-img/7.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By Marian</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">May 19, 2017</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h4 class="post-headline">Cara Membuat Seorang Narsisis Merasakan Empati</h4>
                                    </a>
                                    <p>Pada saat yang sama mereka jatuh ke dalam rasa sakit dan penderitaan yang luar biasa. Untuk sampai ke detail terkecil, apa latihan kita?</p>
                                    <a href="#" class="read-more">Lanjut Membaca...</a>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                <!-- ****** Blog Sidebar ****** -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="blog-sidebar mt-5 mt-lg-0">
                        <!-- Single Widget Area -->
                       

                        <!-- Single Widget Area -->
                        

                        <!-- Single Widget Area -->
                        <div class="single-widget-area popular-post-widget">
                            <div class="widget-title text-center">
                                <h6>Postingan Populer</h6>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="img/sidebar-img/1.jpg" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Kilang Anggur Terbaik Untuk Dikunjungi Di Malang</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="img/sidebar-img/2.jpg" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6> Makanan Terbaik di Malang</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="img/sidebar-img/3.jpg" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Tempat Festival Terbaik di Malang</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="img/sidebar-img/4.jpg" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>10 Unggulan Makanan Pemimpin di Malang</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="img/sidebar-img/5.jpg" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Makan Dengan Anggaran Terjangkau</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Widget Area -->
                       

                        <!-- Single Widget Area -->
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Blog Area End ****** -->

    <!-- ****** Instagram Area Start ****** -->
    <div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/1.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/2.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/3.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/4.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/5.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/6.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/1.jpg')}}" alt="">
            <!-- Hover -->
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/2.jpg')}}" alt="">
            <!-- Hover -->
        </div>

    </div>
    <!-- ****** Our Creative Portfolio Area End ****** -->

    <!-- ****** Footer Social Icon Area Start ****** -->
   @include('layout.footer')

    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="{{asset('yummy-master/yummy-master/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('yummy-master/yummy-master/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('yummy-master/yummy-master/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins  -->
    <script src="{{asset('yummy-master/yummy-master/js/others/plugins.js')}}"></script>
    <!-- Active  -->
    <script src="{{asset('yummy-master/yummy-master/js/active.js')}}"></script>
    
</body>
