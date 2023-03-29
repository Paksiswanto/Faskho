@include('layout.headuser')

<body>
    <!-- Background Pattern Swither -->

    @include('layout.navkul')
    <style>
img.nov {
  width:800px;
  height: 500px;
  object-fit: cover;
}
</style>
<style>
img.nova {
  width:400px;
  height: 200px;
  object-fit: cover;
}
</style>
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{ asset('thumbnail/' . $data->foto) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>{{ $data->judul }}</h2>
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
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i>
                                    Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('artikel') }}">Artikel </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route($data->kategori->kategori) }}">{{ $data->kategori->kategori }} </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->judul }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">

                        <!-- Single Post Share Info -->
                        <div class="col-2 col-sm-1">
                            <div class="single-post-share-info mt-100">
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="googleplus"><i class="fa fa-google-plus"
                                        aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                @php
                                    // increment article views count
                                    DB::table('postingans')
                                        ->where('id', $data->id)
                                        ->increment('views');
                                @endphp
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('thumbnail/' . $data->foto) }}" class="nov">

                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By {{ $data->users->name }}</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ $data->created_at->format('d F Y') }}</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->

                                        </div>
                                    </div>
                                    <a href="#">
                                        <h3 class="post-headline">{{ $data->judul }}</h3>
                                    </a>
                                    <hr>
                                    <div>{!! $data->konten !!}</div>
                                </div>
                            </div>

                            <!-- Tags Area -->
                         
                            <!-- Comment Area Start -->
                            <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30"> Komentar</h4>

                                
                                @foreach ($komentars->where('parent',0) as $komentar)

                                <div class="mt-2" style="border-top: 2px solid silver;margin-bottom:20px;">
                                <div class="comment-author mt-3 media mr-3" style="display: flex">
                                    @if ($komentar->user->foto == null)
                                    <img class="user-avatar rounded-circle" style="width: 45px;margin-left:-7%" style="height: 45px" src="{{ asset('poto.jpg') }}"alt="User Avatar" />
                                    @else
                                    <img class="user-avatar rounded-circle" style="width: 45px;margin-left:-7%" style="height: 45px" src="{{asset('storage/' . $komentar->user->foto)}}"
                                    alt="User Avatar">
                                    @endif
                                    <div class="media-body ml-2">
                                    <h5 style="margin-left: -3px">{{ $komentar->nama }}</h5>
                                    <p style="margin-bottom: -10px">{{ $komentar->email }}</p>
                            
                                </div>
                            </div>
                        </div>
                              
                            <img src="{{asset('storage/komentar/'.$komentar->foto)}}" alt="" style="width: 200px"> 
                            <p style="font-size: 20px" >{{ $komentar->pesan }}</p>     
                              {{-- <a href="/like/{{$komentar->id}}"class="text-danger"><i class ="fas fa-heart"></i>  <span>{{$totallike++}} like</span></a> --}}

                              <div class="balaskomen" data-id="balas-{{$komentar->id}}">
                                {{-- @dd($komentar->id) --}}
                                <button class="btn btn-default btn-balas">Balas</button>
                              </div>
                              <form action="{{ route('komentar.store',['id'=>$data->id]) }}" style="margin-top:-1%;display:none;" class="balas" id="balas-{{$komentar->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="hidden" name="postingan_id"
                                    value=" {{ $data->id }} ">

                                    <input type="hidden" name="user_id"
                                    value=" {{ Auth::user()->id }} ">
                                
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nama"
                                         id="contact-name" value="{{Auth::user()->name}}" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="email" class="form-control"
                                        id="contact-email" value="{{Auth::user()->email}}" placeholder="Email">
                                </div>
                                <div class="form-group-append">
                                    <input type="hidden" name="parent" value="{{$komentar->id}}"
                                        id="contact-foto" placeholder="upload foto">
                                </div>
                                <div class="form-group">
                                    <input class="form-control " id="balas" name="pesan"  cols="30" rows="10" placeholder="balas" >
                                </div>
                                <button type="submit" class="btn contact-btn mb-3" style="margin-top: -1%">Balas Komentar</button>
                            </form>

                              @foreach ($komentar->childs as $child)
                              <div class="">
                                
                                    <div class="comment-author mt-3 mb-3 media mr-3" style="display: flex">
                                        @if ($child->user->foto == null)
                                        <img class="user-avatar rounded-circle" style="width: 45px;margin-left:7%" style="height: 45px" src="{{ asset('poto.jpg') }}"alt="User Avatar" />
                                        @else
                                        <img class="user-avatar rounded-circle" style="width: 45px;margin-left:7%" style="height: 45px" src="{{asset('storage/' . $child->user->foto)}}" alt="User Avatar">
                                        @endif
                                        <div class="media-body ml-2">
                                        <h5 style="margin-left: -3px">{{ $child->nama }}</h5>
                                        <p style="margin-bottom: -10px">{{ $child->pesan }}</p>
                                </div>
                            </div>
                                </div>
                              @endforeach
                              

        
                                @endforeach
                                <div style="border-bottom: 2px solid silver"></div>

                                <!-- Leave A Comment -->
                                @auth
                                    <div class="leave-comment-area section_padding_50 clearfix">
                                        <div class="comment-form">
                                            <h4 class="mb-30">Tinggalkan Komentar</h4>


                                            <form action="{{ route('komentar.store', ['id' => $data->id]) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="postingan_id" value=" {{ $data->id }} ">

                                                <input type="hidden" name="user_id" value=" {{ Auth::user()->id }} ">

                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="nama"
                                                        id="contact-name" value="{{ Auth::user()->name }}"
                                                        placeholder="Nama">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="email" class="form-control"
                                                        id="contact-email" value="{{ Auth::user()->email }}"
                                                        placeholder="Email">
                                                </div>
                                                <div class="form-group-append">
                                                    <input type="file" name="foto" class="form-control"
                                                        id="contact-foto" placeholder="upload foto">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="pesan" id="message" cols="30" rows="10" placeholder="Pesan"></textarea>
                                                </div>
                                                <button type="submit" class="btn contact-btn">Posting Komentar</button>
                                            </form>
                                        </div>
                                    </div>
                                    @else
                                           <center>     <p style="font-size:22px">Silahkan <a href="{{ route ('login') }}">Login</a> Terlebih Dahulu.</p></center>
                                @endauth
                            </div>
                        </div>
                    </div>


                    <!-- Single Widget Area -->
                    <div class="single-widget-area popular-post-widget">
                        <div class="widget-title text-center">
                            <h6>Postingan Populer</h6>
                        </div>
                        <!-- Single Popular Post -->
                        @foreach ($trend as $data)
                            
                        <div class="single-populer-post d-flex">
                            <img src="{{ asset('thumbnail/' . $data->foto) }}" class="nova">
                            <div class="post-content">
                                <a href="#">
                                    <a href="/tampil/{{$data->id}}"><h3>{{$data->judul}}</h3></a>
                                    <p style="font-size: 15pt">{{$data->deskripsi}}</p>
                                </a>
                                <p>{{$data->created_at}}</p>
                            </div>
                        </div>
                        @endforeach
                       


                    <!-- Single Widget Area -->
                    <div class="single-widget-area newsletter-widget mt-5">
                        <div class="widget-title text-center">
                            <h6>Newsletter</h6>
                        </div>
                        <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.
                            <div class="newsletter-form">
                            <form action="#" method="post">
                                <input type="email" name="newsletter-email" id="email">
                        </p>
                                   <placeholder="Your email">
                                <button type="submit"><i class="fa fa-paper-plane-o"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ****** Single Blog Area End ****** -->

    <!-- ****** Instagram Area Start ****** -->
    <div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/1.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/2.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/3.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/4.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/5.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/6.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/1.jpg') }}" alt="">
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
            <img src="{{ asset('yummy-master/yummy-master/img/instagram-img/2.jpg') }}" alt="">
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
                            <a href="#"><i class="fa fa-facebook"
                                    aria-hidden="true"></i><span>facebook</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-twitter"
                                    aria-hidden="true"></i><span>Twitter</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-google-plus"
                                    aria-hidden="true"></i><span>GOOGLE+</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-linkedin-square"
                                    aria-hidden="true"></i><span>linkedin</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-instagram"
                                    aria-hidden="true"></i><span>Instagram</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i><span>VIMEO</span></a>
                        </div>
                        <div class="single-icon">
                            <a href="#"><i class="fa fa-youtube-play"
                                    aria-hidden="true"></i><span>YOUTUBE</span></a>
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
                            <a href="index.html" class="yummy-logo">KulinerKu</a>
                        </div>
                        <!-- Menu Area Start -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>KELOMPOK NOVA <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href=""
                                target="_blank">Hummasoft</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="{{ asset('yummy-master/yummy-master/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('yummy-master/yummy-master/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{ asset('yummy-master/yummy-master/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{ asset('yummy-master/yummy-master/js/others/plugins.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('yummy-master/yummy-master/js/active.js') }}"></script>
    <script>
               $(document).ready(function () {
            $('.balaskomen').click(function () {
                var id = $(this).data('id');
                console.log(id)
                $('#'+id).toggle('slide')
            })
        })
    </script>
<<<<<<< Updated upstream

=======
   
</body>
>>>>>>> Stashed changes

</body>
