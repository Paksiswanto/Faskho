   
   <style>
   .nav-link {
    display: flex;
    align-items: center;
  }
  
  .nav-link i {
    margin-right: 5px;
  }
   </style>
   <!-- ****** Top Header Area Start ****** -->
<div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area  d-flex">
                            @auth
                            <p class="mt-2">Selamat datang {{Auth::user()->name}}</p> 
                            @endauth
                            <div class="user-area dropdown float-left" >
                                <svg class="ml-1"style="width:5"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    @auth
                                    @if (Auth::user()->foto)
                                    <img class="user-avatar rounded-circle mt-1" src="{{asset('storage/' . Auth::user()->foto)}}" alt="User Avatar" style="width: 35px;height:35px;border-radius:50%">
                                    @else
                                    <img class="user-avatar rounded-circle mt-1" src="{{ asset('poto.jpg') }}"alt="" style="width: 30px">
                                    @endif
                                    @endauth
                                  </a>
                                      @guest
                                       <img class="user-avatar rounded-circle" src="{{ asset('poto.jpg') }}"alt="User Avatar" style="width: 30px">
                                       @endguest 
                                        
                                  </svg>
                                  @if ($unreadCount > 0)
                                  <span class="badge badge-danger">{{ $unreadCount }}</span>
                              @endif
                                </a>
                                <div class="user-menu dropdown-menu" id="yummyDropdown">
                                    @auth

                                    <a class="nav-link mr-2" href="/posts/{{ auth::user()->id }}"><i class="fa fa-plus"></i>Tambah Artikel</a>
                                    <a class="nav-link mr-2"  href="/profile/{{ Auth::user()->id }}"><i class="fa fa-user"></i>Profil</a>
                                    @if (auth::user()->role=='admin')
                                   
                                    <a class="nav-link mr-2" href="/admin"><i class="fa fa-wrench"></i>Admin</a>
                                    @endif
                                    <a class="nav-link mr-2" href="/notif/{{auth::user()->id}}">
                                        <i class="fa fa-bell" style="width: 8%;margin-right:5%"></i>Notifikasi
                                        @if ($unreadCount > 0)
                                            <span class="badge badge-danger">{{ $unreadCount }}</span>
                                        @endif
                                    </a>
                                    <a class="nav-link mr-2" href="/logout"><i class="fa fa-power-off"></i>Keluar</a>
                                   
                                        @else
                                        <a class="nav-link mr-2" href="/login"><i class="fa fa-power-off"></i>Masuk</a>
                                    @endauth
                                


                                </div>
                            </div>
                        <!-- Search Button Area -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="/" class="yummy-logo">KulinerKu</a>
                    </div>
                </div>
            </div>
              

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                                
                                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                                </li> 
                              
                                
                                <li class="nav-item {{ Request::routeIs('kategori2') || Request::routeIs('lainnya')  ? 'active' : '' }}">
                                    <a class="nav-link" href="{{Route('lainnya')}}">Kategori</a>
                                </li>
                                    
                                <li class="nav-item {{ Request::is('artikel')  || Request::routeIs('tampil') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{Route('artikel')}}">Artikel</a>
                                </li>
                                
                                <li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}">
                                    <a class="nav-link" href="/kontak">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

    </header>
    
    