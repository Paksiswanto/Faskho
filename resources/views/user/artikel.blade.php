@include('layout.headuser')
<body>

    <!-- ****** Top Header Area Start ****** -->
    @include('layout.navkul')
    <!-- ****** Header Area End ****** -->
<style>
    .dropdown {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  margin: 2px;
  background-color: #000;
}

.menu {
  display: none;
  position: absolute;
  top: 30px;
  right: 0;
  padding: 0;
  margin: 0;
  list-style: none;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.menu li {
  padding: 10px;
}

.dropdown:hover .menu {
  display: block;
}

height{

height: 100vh;
}

.form{

position: relative;
}

.form .fa-search{

position: absolute;
top:20px;
left: 20px;
color: #9ca3af;

}

.form span{

    position: absolute;
right: 17px;
top: 13px;
padding: 2px;
border-left: 1px solid #d1d5db;

}

.left-pan{
padding-left: 7px;
}

.left-pan i{

padding-left: 10px;
}

.form-input{

height: 55px;
text-indent: 33px;
border-radius: 20px;
}

.form-input:focus{

box-shadow: none;
border:none;
}
.comment-form {
  display: none;
}

#report-form {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
  z-index: 9999;
}

#report-form.show {
  display: block;
}

</style>

<style>
img.square {
  width:400px;
  height: 200px;
  object-fit: cover;
}
</style>

    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url(https://png.pngtree.com/png-clipart/20210430/ourlarge/pngtree-korean-food-cute-cartoon-doodle-png-image_3253417.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Artikel</h2>
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
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="form">
              <i class="fa fa-search"></i>
              <form action="{{route('artikel')}}" method="get">
              <input type="text" class="form-control form-input" name="key" value="{{Request::get('key')}}" placeholder="Cari...">
            </form>
            </div>
          </div>
        </div>
      </div>

    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area section_padding_80">
        <div class="container">
            <div class="row">
                @foreach ($artikel as $data )
                    
               
                <!-- Single Post -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                              <img src="{{ asset('thumbnail/'.$data->thumbnail) }}" class="square" >
                        </div>
                      
                        <!-- Post Content -->
                        <div class="post-content">
                            <div class="post-meta d-flex">
                                <div class="post-author-date-area d-flex">
                                    <!-- Post Author -->
                                    <div class="post-author">
                                        <a href="#">By {{$data->name }}</a>
                                    </div>
                                    <!-- Post Date -->
                                    <div class="post-date">
                                        <a href="#">{{ date('D-M-Y',strtotime($data->created_at)) }}</a>
                                    </div>
                                </div>
                                <!-- Post Comment & Share Area -->
                                @auth
                                    
                                <div class="post-comment-share-area d-flex">
                                    <nav>
                                        <div class="dropdown">
                                          <div class="dot"></div>
                                          <div class="dot"></div>
                                          <div class="dot"></div>
                                          <ul class="menu">
                                              <li><button class="btn btn-warning btn-lapor" data-target="#modal-lapor" data-id="{{ $data->id }}">Laporkan</button>
                                                
                                                
                                              </li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="modal fade" id="modal-lapor" tabindex="-1" role="dialog" aria-labelledby="modal-lapor-label">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modal-lapor-label">Form Laporan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>                                        
                                        </div>
                                        <div class="modal-body">
                                          <form id="form-lapor" method="post" action="/insertdatalaporan">
                                            @csrf
                                            <div class="form-group">
                                              <input type="hidden" name="nama" value="{{Auth::user()->name}}">
                                              <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                              <input type="hidden" name="judul" value="{{$data->judul}}">
                                              <label for="laporan">Laporan</label>
                                              <textarea class="form-control" name="laporan" id="laporan" rows="3" required></textarea>
                                            </div>
                                            <input type="hidden" id="post-id">
                                            <button class="btn btn-rounded btn-danger" type="submit">kirim</button>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  <form id="report-form">
                                    <textarea id="report-text" name="message" placeholder="Laporkan masalah"></textarea>
                                    <button type="submit">Laporkan</button>
                                  </form>
                                  
                                @endauth
                            </div>
                            <a href="{{ route('tampil', $data->id) }}">
                                <h5 class="post-headline">{{$data->judul}}</h5>
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach
                    <!-- Single Post -->
                <div class="col-12">
                    <div class="pagination-area d-sm-flex mt-15">
                        <div>
                            
                            
                            showing
                            {{ $artikel->firstitem() }}
                            to
                            {{ $artikel->lastitem() }}
                            of
                            {{ $artikel->total() }}
                            entries
                        </div>
                        <div class="pull-right">
                            {{ $artikel ->withQueryString()-> links() }}
                        </div>
                    
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ****** Archive Area End ****** -->

    <!-- ****** Instagram Area Start ****** -->
    <div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/1.jpg') }}" alt="">
            <!-- Hover -->
            
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/2.jpg') }}" alt="">
            <!-- Hover -->
            
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/3.jpg') }}" alt="">
            <!-- Hover -->
            
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/4.jpg') }}" alt="">
            <!-- Hover -->
            
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/5.jpg') }}" alt="">
            <!-- Hover -->
            
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/6.jpg') }}" alt="">
            <!-- Hover -->
            
        </div>

        <!-- Instagram Item -->
        <div class="instagram_gallery_item">
            <!-- Instagram Thumb -->
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/1.jpg') }}" alt="">
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
                            <a href="/" class="yummy-logo">KulinerKu</a>
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
                        <p>KELOMPOK NOVA <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Hummasoft</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="{{asset('yummy-master/yummy-master/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{asset('yummy-master/yummy-master/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('yummy-master/yummy-master/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{asset('yummy-master/yummy-master/js/others/plugins.js') }}"></script>
    <!-- Active JS -->
    <script src="{{asset('yummy-master/yummy-master/js/active.js') }}"></script>
    <script>
$(document).ready(function() {
  // Menampilkan modal ketika tombol "Laporkan" ditekan
  $('.btn-lapor').click(function() {
    var postId = $(this).data('id');
    $('#post-id').val(postId);
    $('#modal-lapor').modal('show');
  });
  
  // Mengirim data laporan menggunakan Ajax ketika form disubmit
  $('#btn-kirim-laporan').click(function() {
    var laporan = $('#laporan').val();
    var postId = $('#post-id').val();

    // kode Ajax

    // Menutup modal setelah data terkirim
    $('#modal-lapor').modal('hide');
  });
  
  // Menutup modal ketika tombol close di-klik
  $('#modal-lapor .close').click(function() {
    $('#modal-lapor').modal('hide');
  });
});


    </script>
    <script>

    </script>
</body>
