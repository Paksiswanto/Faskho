@include('layout.headuser')

<body>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- Background Pattern Swither -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @include('layout.navkul')
    <style>
        img.nov {
            width: 800px;
            height: 500px;
            object-fit: cover;
        }

    </style>
    <style>
        img.nova {
            width: 400px;
            height: 200px;
            object-fit: cover;
        }

    </style>
    <style>
        #like-button {
            width: 30px;
            height: 30px;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        #like-button .fa-heart {
            color: gray;
        }

        #like-button.liked .fa-heart {
            color: red;
        }

    </style>
    <style>
        .btn-balas, 
        .delete {
            display: inline-block;
            margin-right: 5px; /* jika ingin menambahkan jarak antara dua tombol */
        }
        .delete {
        font-size: 15px;
        width: 80px;
        height: 35px;
        }

        </style>
  
    <!-- ** Breadcumb Area Start ** -->
    
    <div class="breadcumb-area" style="background-image: url({{ asset('thumbnail/' . $data->thumbnail) }});">
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('artikel') }}">Artikel </a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="/kategori/{{ $data->kategori_id }}">{{ $data->kategori->kategori }} </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->judul }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ** Breadcumb Area End ** -->

    <!-- ** Single Blog Area Start ** -->
    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">

                        <!-- Single Post Share Info -->
                        <div class="col-2 col-sm-1">
                         
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
                                    <img src="{{ asset('thumbnail/' . $data->thumbnail) }}" class="nov">

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
                                        <h1 class="post-headline">{{ $data->judul }}</h1>
                                    </a>
                                    <hr>
                                    <div>{!! $data->konten !!}</div>
                                </div>
                            </div>

                            <!-- Tags Area -->

                            <!-- Comment Area Start -->
                            <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30">{{ $komenhi }} Komentar</h4>

                                @foreach ($komentars->where('parent',0) as $komentar)

                                <div class="mt-2" style="border-top: 2px solid silver;margin-bottom:20px;">
                                    <div class="comment-author mt-3 media mr-3" style="display: flex">
                                        @if ($komentar->user->foto == null)
                                        <img class="user-avatar rounded-circle" style="width: 45px;margin-left:-7%" style="height: 45px" src="{{ asset('poto.jpg') }}" alt="User Avatar" />
                                        @else
                                        <img class="user-avatar rounded-circle" style="width: 45px;margin-left:-7%; height: 45px; border-radius: 50%;" src="{{asset('storage/' . $komentar->user->foto)}}" alt="User Avatar">
                                        @endif
                                        <div class="media-body ml-2">
                                            <h5 style="margin-left: -3px">{{ $komentar->nama }}</h5>
                                            <p style="margin-bottom: -10px">{{ $komentar->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                

                                <img src="{{asset('storage/komentar/'.$komentar->foto)}}" alt="" style="width: 200px">
                                <p style="font-size: 20px">{!! $komentar->pesan!!}</p>
                                <div style="display: inline-block">

                                    {{-- <a href="/like/{{$komentar->id}}" class="text-danger" id="like-link">
                                        <button id="like-button" class="{{ auth()->user() && $komentar->like->contains('user_id', auth()->user()->id) ? 'liked' : '' }}">
                                            <i class="fa {{ auth()->user() && $komentar->like->contains('user_id', auth()->user()->id) ? 'fa-heart text-danger' : 'fa-heart' }}"></i>
                                        </button>
                                        <span id="like-count" class="{{ $komentar->like->count() > 0 ? 'text-danger' : '' }}">{{ $komentar->like->count() }}</span> like
                                    </a> --}}
                                <form class="like-form" action="{{ route('like', ['id' => $komentar->id]) }}" method="GET">
        @csrf
        <button class="like-button {{ auth()->user() && $komentar->like->contains('user_id', auth()->user()->id) ? 'liked' : '' }}">
            <i class="fa {{ auth()->user() && $komentar->like->contains('user_id', auth()->user()->id) ? 'fa-heart text-danger' : 'fa-heart' }}"></i>
        </button>
        <span class="like-count {{ $komentar->like->count() > 0 ? 'text-danger' : '' }}">{{ $komentar->like->count() }}</span> like
    </form>

    
</div>
                            
<br>
                                <div class="d-flex">
                                    @if(Auth::check())
                                    <div class="balaskomen" data-id="balas-{{$komentar->id}}">
                                        <button class="btn btn-default btn-balas">Balas</button>
                                    </div>
                                @endif
                                
                                @if (auth()->check() && auth()->user()->id == $komentar->user_id)
                                <a href="#" class="btn btn-danger delete mr-2" data-id="{{ $komentar->id }}" data-judul="{{ $data->judul }}">Hapus</a>
                                @endif
                        </div>
                                {{-- <a href="#" class="btn btn-danger delete" data-id="{{ $komentar->id }}" data-judul="{{ $data->judul }}">Hapus</a>
                                <div class="balaskomen" data-id="balas-{{$komentar->id}}">
                                    <button class="btn btn-default btn-balas">Balas</button>
                                </div> --}}
                                {{-- <button type="button" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" class="bi bi-trash-fill">
                                        ::before
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0zM2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                    </svg>Hapus</button> --}}
                                
                                <form action="{{ route('komentar.store',['id'=>$data->id]) }}" style="margin-top:-1%;display:none;" class="balas" id="balas-{{$komentar->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="komen_id" value="{{ $komentar->id }}">
                                    <input type="hidden" name="postingan_id" value=" {{ $data->id }} ">
                                    @auth
                                    <input type="hidden" name="user_id" value=" {{ Auth::user()->id }} ">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="nama" id="contact-name" value="{{Auth::user()->name}}" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="email" class="form-control" id="contact-email" value="{{Auth::user()->email}}" placeholder="Email">
                                    </div>
                                    @endauth
                                    <div class="form-group-append">
                                        <input type="hidden" name="parent" value="{{$komentar->id}}" id="contact-foto" placeholder="upload foto">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control " id="balas" name="pesan" cols="30" rows="10" placeholder="balas">
                                    </div>
                                    <button type="submit" class="btn contact-btn mb-3" style="margin-top: -1%">Balas Komentar</button>
                                </form>
                                
                                @foreach ($komentar->childs as $child)
                                <div class="">
                                    
                                    <div class="comment-author mt-3 mb-3 media mr-3" style="display: flex">
                                        @if ($child->user->foto == null)
                                        <img class="user-avatar rounded-circle" style="width: 45px;margin-left:7%" style="height: 45px" src="{{ asset('poto.jpg') }}" alt="User Avatar" />
                                        @else
                                        <img class="user-avatar rounded-circle" style="width: 45px;margin-left:7%; height: 45px; border-radius: 50%;" src="{{asset('storage/' . $komentar->user->foto)}}" alt="User Avatar">
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
                                        

                                        <form action="{{ route('komentar.store', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="postingan_id" value=" {{ $data->id }} ">

                                            <input type="hidden" name="user_id" value=" {{ Auth::user()->id }} ">

                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="nama" id="contact-name" value="{{ Auth::user()->name }}" placeholder="Nama">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="email" class="form-control" id="contact-email" value="{{ Auth::user()->email }}" placeholder="Email">
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" name="pesan" id="summernote" cols="30" rows="10" placeholder="Pesan"></textarea>
                                            </div>
                                            <button type="submit" class="btn contact-btn">Posting Komentar</button>
                                        </form>
                                    </div>
                                </div>
                                @else
                                <center>
                                    <p style="font-size:22px">Silahkan <a href="{{ route ('login') }}">Login</a> Terlebih Dahulu.</p>
                                </center>
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
                            <img src="{{ asset('thumbnail/' . $data->thumbnail) }}" class="nova">
                            <div class="post-content">
                                <a href="#">
                                    <a href="/tampil/{{$data->id}}">
                                        <h3>{{$data->judul}}</h3>
                                    </a>
                                    <p style="font-size: 15pt">{{$data->deskripsi}}</p>
                                </a>
                                <p>{{ date('D-M-Y',strtotime($data->created_at)) }}</p>
                            </div>
                        </div>
                        @endforeach



                        <!-- Single Widget Area -->
                       
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ** Single Blog Area End ** -->

    <!-- ** Instagram Area Start ** -->
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
    <!-- ** Our Creative Portfolio Area End ** -->

    <!-- ** Footer Social Icon Area Start ** -->
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
    <!-- ** Footer Social Icon Area End ** -->

    <!-- ** Footer Menu Area Start ** -->
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
    <!-- ** Footer Menu Area End ** -->

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
    <script src="{{ asset ('user/demo.dashboardpack.com/sales-html/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
        $(document).ready(function() {
            $('.balaskomen').click(function() {
                var id = $(this).data('id');
                console.log(id)
                $('#' + id).toggle('slide')
            })
        })

    </script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Tulis komentar anda'
            , tabsize: 2
            , height: 120
            , toolbar: [
                ['style', ['style']]
                , ['font', ['bold', 'underline', 'clear']]
                , ['color', ['color']]
                , ['para', ['ul', 'ol', 'paragraph']]
                , ['insert', ['link', 'picture']]
                , ['view', ['codeview', 'help']]
            ]
        });

    </script>
    <Script>
        $('.delete').click(function() {
            var komenid = $(this).attr('data-id');
            var judul = $(this).attr('data-judul');
            swal({
                    title: "Yakin Mau Hapus Komentar ?"
                    , text: ""
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletekomenku/" + komenid + ""
                        swal("Komentar Berhasil dihapus", {
                            icon: "success"
                        , });
                    } else {
                        swal("Komentar tidak jadi dihapus");
                    }
                });
        })
    
    </script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    
        @endif
    
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#like-link').click(function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                var likeButton = $('#like-button');
                var likeCount = $('#like-count');
                $.ajax({
                    url: url
                    , method: 'GET'
                    , dataType: 'json'
                    , success: function(response) {
                        if (response.liked) {
                            likeButton.addClass('liked');
                            likeButton.find('i').removeClass('fa-heart').addClass('fa-heart text-danger');
                        } else {
                            likeButton.removeClass('liked');
                            likeButton.find('i').removeClass('fa-heart text-danger').addClass('fa-heart');
                        }
                        likeCount.text(response.like_count);
                        likeCount.toggleClass('text-danger', response.like_count > 0);
                    }
                    , error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    </script> --}}
 <script>
    $(document).ready(function() {
        $('.like-form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var likeButton = form.find('.like-button');
            var likeCount = form.find('.like-count');
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                data: form.serialize(),
                success: function(response) {
                    if (response.liked) {
                        likeButton.addClass('liked');
                        likeButton.find('i').removeClass('fa-heart').addClass('fa-heart text-danger');
                    } else {
                        likeButton.removeClass('liked');
                        likeButton.find('i').removeClass('fa-heart text-danger').addClass('fa-heart');
                    }
                    likeCount.text(response.like_count);
                    likeCount.toggleClass('text-danger', response.like_count > 0);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
