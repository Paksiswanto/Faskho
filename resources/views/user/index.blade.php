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
    <link rel="icon" href="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png') }}">

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
    <style>
        img.square {
          width:800px;
          height: 600px;
          object-fit: cover;
        }
        </style>

    <style>
    img.myuu {
      width:400px;
      height: 200px;
      object-fit: cover;
    }
    </style>

    <style>
        img.pyuu {
          width:100px;
          height: 350px;
          object-fit: cover;
        }
        </style>
         <style>
        img.pia {
          width:300px;
          height: 150px;
          object-fit: cover;
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
        
      </div>
      <br>
    <!-- ****** Welcome Post Area Start ****** -->
    <section class="welcome-post-sliders owl-carousel">

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-1.jpg')}}" alt="">
            <!-- Overlay Text -->
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-2.jpg')}}" alt="">
            <!-- Overlay Text -->
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-3.jpg')}}" alt="">
            <!-- Overlay Text -->
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-4.jpg')}}" alt="">
            <!-- Overlay Text -->
        </div>

        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/bg-img/slide-4.jpg')}}" alt="">
            <!-- Overlay Text -->
        </div>

    </section>
    <!-- ****** Welcome Area End ****** -->
     

    <!-- ****** Blog Area Start ****** -->
    <section class="blog_area section_padding_0_80 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">

                        @foreach ( $trend as $item)
                            
                       
                        <!-- Single Post -->
                        <div class="col-12">
                            <div class="single-post wow fadeInUp" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{asset('thumbnail/'.$item->foto)}}" class="square" >
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">{{ $item->name }}</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ $item->created_at}}</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->

                                        </div>
                                    </div>
                                    <a href="#">
                                        <h2 class="post-headline"> {{$item->judul}}</h2>
                                    </a>
                                    <p>{{$item->deskripsi}}</p>
                                    <a href="/tampil/{{$item->id}}" class="read-more">Mulai baca...</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Post -->
                        @foreach ($randomData as $item )
                            
                        <div class="col-12 col-md-6">
                            <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{asset('thumbnail/'.$item->foto)}}" class="myuu" >
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">{{$item->name}}</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{$item->created_at}}</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                          
                                        </div>
                                        </div>
                                        <a href="#">
                                            <h2 class="post-headline"> {{$item->judul}}</h2>
                                        </a>
                                        <p>{{$item->deskripsi}}</p>
                                        <a href="/tampil/{{$item->id}}" class="read-more">Mulai baca...</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

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
                        @foreach ($posts as $item)
                        <div class="col-12">
                            <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('thumbnail/'.$item->foto) }}" style="width: 100%" class="pyuu">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <div class="post-author">
                                                <a href="#">{{$item->name}}</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ $item->created_at}}</a>                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h4 class="post-headline"> {{$item->judul}} </h4>
                                    </a>
                                    <p>{{$item->deskripsi}}{{Str::limit($item->deskripsi,10) }}</p>
                                    <a href="/tampil/{{$item->id}}" class="read-more">Mulai Baca...</a>
                                </div>
                            </div>
                        </div>

                       
                @endforeach
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
                            @foreach ($data as $item )
                        
                            <div class="single-populer-post d-flex">
                                <img src="{{ asset('thumbnail/'.$item->foto) }}" class="pia">
                                <div class="post-content">
                                    <a href="#">
                                        <h6> {{$item->judul}} </h6>
                                    </a>
                                    <p>{{$item->created_at}}</p>
                                    <div class="media">
                                        <svg style="width:10%;margin-top: 3px"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>
                                          <p class="media-body ml-1" style="margin-bottom:2px">{{$item->views}}</p>

                                   
                                </div>
                            </div>
                            </div>
                                    
                            @endforeach
                            
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
