@extends('layout.artikel')

@section('content')

    <body>
        @extends('layout.sidepost')



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
