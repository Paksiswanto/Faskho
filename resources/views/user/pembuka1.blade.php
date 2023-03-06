
@include('layout.headuser')
<body>
    <!-- Background Pattern Swither -->

    @include('layout.navpem')
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url(https://cdn-2.tstatic.net/kaltim/foto/bank/images/resep-sup-wonton-ayam.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Informasi Terperinci</h2>
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
                            <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                            <li class="breadcrumb-item"><a href="#">Makanan Pembuka</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Informasi Terperinci</li>
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
                                <a href="#" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="https://i0.wp.com/kepo.co/wp-content/uploads/2021/03/Resep-Wonton-Soup.jpeg?fit=700%2C465&ssl=1" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By Krisna</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">Juni 19, 2017</a>
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
                                        <h3 class="post-headline">Hidangan pembuka wonton dari China ini merupakan varian pangsit dengan kulit tipis.</h3>
                                    </a>
                                    <p>Wonton atau Wanton atau Pangsit adalah makanan berupa daging cincang yang dibungkus lembaran tepung terigu. Setelah direbus sebentar, pangsit umumnya dihidangkan di dalam sup. Selain direbus, pangsit juga digoreng dengan minyak goreng yang banyak hingga seperti kerupuk. Pangsit (wonton) termasuk salah satu jenis dim sum.</p>

                                    <h4>Anda Dapat Membeli Online atau Secara Langsung Ke Gerai yang Telah Dibuka</h4>
                                    <p>Isi pangsit umumnya dibuat dari udang, daging babi, atau sayuran. Di Indonesia, isi pangsit terutama dibuat dari udang atau campuran daging ayam dan udang dengan tambahan jahe, bawang bombay, atau bawang putih yang dicincang. Bumbu untuk isi pangsit bisa berupa kecap asin, saus tiram, dan minyak wijen.</p>
                                    <center>
                                    <img class="br-30 mb-30" src="https://public.urbanasia.com/images/post/2021/02/15/1613398426-sup-wonton-pinterest-CanuckCuisine.JPG" alt=""></center>
                                    <p>Kulit pangsit dibuat dari adonan tepung terigu, air, dan garam dapur. Adonan ditipiskan dan dipotong-potong berukuran persegi. Selain bisa dibuat sendiri, kulit pangsit bisa dibeli dalam kemasan berisi 10 hingga 20 lembar. Sewaktu membuat siomay (bukan tahu bakso), kulit pangsit dipakai sebagai pembungkus daging cincang.</p>
                                        <center>
                                    <img class="br-30 mb-30" src="https://public.urbanasia.com/images/post/2021/02/15/1613398483-pinterest-Denise-Wolens.jpeg" alt=""></center>
                                   </div>
                            </div>

                            <!-- Tags Area -->
                            <div class="tags-area">
                                <a href="#">kuliner</a>
                                <a href="#">makananpembuka</a>
                                <a href="#">asia</a>
                            </div>
                            <!-- Comment Area Start -->
                            <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30"> Komentar</h4>

                                @foreach ($komen as $row)
                                <ol> 
                                            <li class="single_comment_area">
                                                <div class="comment-wrapper d-flex">
                                                    <!-- Comment Meta -->
                                                    <div class="comment-author">
                                                        <img src="{{asset('$row->profile') }}" alt="">
                                                    </div>
                                                    <!-- Comment Content -->
                                                    <div class="comment-content">
                                                        <span class="comment-date text-muted">27 Aug 2018</span>
                                                        <div class="rate">

                                                            <input type="radio" id="star5" name="rating" {{($row->rating=='5')?"checked" :""}}  value="5" />
                                                            <label for="star5" title="sangat bagus">5 stars</label>
                                                            <input type="radio" id="star4" name="rating" {{($row->rating=='4')?"checked" :""}}  value="4" />
                                                            <label for="star4" title="bagus">4 stars</label>
                                                            <input type="radio" id="star3" name="rating" {{($row->rating=='3')?"checked" :""}}  value="3" />
                                                            <label for="star3" title="cukup">3 stars</label>
                                                            <input type="radio" id="star2" name="rating" {{($row->rating=='2')?"checked" :""}}  value="2" />
                                                            <label for="star2" title="buruk">2 stars</label>
                                                            <input type="radio" id="star1" name="rating" {{($row->rating=='1')?"checked" :""}}  value="1" />
                                                            <label for="star1" title="sangat buruk">1 star</label>
                                                        </div>  
                                                        <h5>{{$row->nama}}</h5>
                                                        <p>{{$row->email}}</p>
                                                        <img src="{{ asset('foto/' . $row->foto) }}"  alt="..." style="width: 100px"> 
                                                        <p>{{$row->pesan}}</p>
                                                        <a href="#">Suka</a>
                                                        <a class="active" href="#">Balas</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                        @endforeach

                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Tinggalkan Komentar</h4>

                                    <form action="/insert" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="rate">

                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="sangat bagus">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="bagus">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="cukup">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="buruk">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="sangat buruk">1 star</label>
                                        </div>    
                                        <div class="form-group">
                                            <input type="hedden" class="form-control" name="nama" id="contact-nama"
                                                placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="contact-email"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group-append">
                                            <input type="file" class="form-control" name="foto" id="contact-foto"
                                                placeholder="upload foto">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="pesan" id="message" cols="30"
                                                rows="10" placeholder="Pesan"></textarea>
                                        </div>
                                        <button type="submit" class="btn contact-btn">Posting Komentar</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

    
                        <!-- Single Widget Area -->
                        <div class="single-widget-area popular-post-widget">
                            <div class="widget-title text-center">
                                <h6>Postingan Populer</h6>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="{{asset('yummy-master/yummy-master/img/sidebar-img/1.jpg') }}" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Makanan enak di England</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="{{asset('yummy-master/yummy-master/img/sidebar-img/2.jpg') }}" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>8 Makanan Terlezat Di jakarta</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="{{asset('yummy-master/yummy-master/img/sidebar-img/3.jpg') }}" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Tempat kuliner Terbaik</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="{{asset('yummy-master/yummy-master/img/sidebar-img/4.jpg') }}" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Harrogate's top 10 makanan penutup terenak</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="{{asset('yummy-master/yummy-master/img/sidebar-img/5.jpg') }}" alt="">
                                <div class="post-content">
                                    <a href="#">
                                        <h6>Makanan Termurah di Oxford</h6>
                                    </a>
                                    <p>Selasa, Oktober 3, 2017</p>
                                </div>
                            </div>
                        </div>



                        <!-- Single Widget Area -->
                        <div class="single-widget-area newsletter-widget mt-5">
                            <div class="widget-title text-center">
                                <h6>Newsletter</h6>
                            </div>
                            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                            <div class="newsletter-form">
                                <form action="#" method="post">
                                    <input type="email" name="newsletter-email" id="email" placeholder="Your email">
                                    <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/1.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/2.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/3.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/4.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/5.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/6.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/1.jpg') }}" alt="">
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
            <img src="{{asset('yummy-master/yummy-master/img/instagram-img/2.jpg') }}" alt="">
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
</body>
