@extends('layout.artikel')

@section('content')

<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <center> <div class="top-left">
        <div class="navbar-header">
            <a class=" ml-5 mr-5" href="./"><img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 80px"></a>
        </div>
    </div>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div></center>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <ul id="sidebar_menu">
          

        <li class="">
            <a href="/" aria-expanded="false">
                <div class="icon_menu">
                    <!-- <i class="fa fa-book"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: red; width:25px;"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>

                </div>
                <span>HOME</span>
            </a>
        </li>
    </nav>

    <body>



        <div class="main_content_iner ">
            <div class="container-fluid p-0 ">
                <div class="row ">
                    <div class="col-12">
                        <div class="dashboard_header mb_50">
                            <div class="row">



                                <div class="col-md-6 mx-auto">
                                    <div class="white_box mb_30">
                                        <div class="box_header ">
                                            <div class="main-title">
                                                <h3 class="mb-0"></h3>
                                            </div>
                                        </div>
                                        <div class="profile_box_1">
                                            <div class="profile-cover-image"
                                                style=" filter: blur(4px);
                                            -webkit-filter: blur(4px);">
                                            @if (Auth::user()->foto)
                                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" style="width: 100%" />
                                            @else
                                            <img src="{{ asset('poto.jpg') }}" />
                                            @endif
                                               
                                            </div>
                                            <div class="profile-picture">
                                                @if (Auth::user()->foto)
                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}">
                                                @else
                                            <img src="{{ asset('poto.jpg') }}" />
                                            @endif
                                            </div>
                                            <div class="profile-content">
                                                <h1>
                                                    {{ Auth::user()->name }}
                                                </h1>
                                                <p>
                                                    {{ Auth::user()->deskripsi }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                    <a href="/profilku/{{ Auth::user()->id }}"><button class="btn first p-3">Edit
                                            Profil</button></a>
                                    <style>
                                        .btn {
                                            box-sizing: border-box;
                                            -webkit-appearance: none;
                                            -moz-appearance: none;
                                            appearance: none;
                                            background-color: transparent;
                                            border: 2px solid #e74c3c;
                                            border-radius: 0.6em;
                                            color: #e74c3c;
                                            cursor: pointer;
                                            display: flex;
                                            align-self: center;
                                            font-size: 1rem;
                                            font-weight: 400;
                                            line-height: 1;
                                            margin: 20px;
                                            padding: 1.2em 2.8em;
                                            text-decoration: none;
                                            text-align: center;
                                            text-transform: uppercase;
                                            font-family: 'Montserrat', sans-serif;
                                            font-weight: 700;
                                        }

                                        .btn:hover,
                                        .btn:focus {
                                            color: #fff;
                                            outline: 0;
                                        }

                                        .first {
                                            transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
                                        }

                                        .first:hover {
                                            box-shadow: 0 0 40px 40px #e74c3c inset;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>



    </body>

    <!-- Mirrored from demo.dashboardpack.com/sales-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 06:37:07 GMT -->
@endsection
