@extends('layout.artikel')


@section('content')


<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <br>
    <br>
    <center>
        <div class="top-left">
            <div class="navbar-header">
                <a class=" ml-5 mr-5" href="./"><img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 80px"></a>
            </div>
        </div>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
        </div>
    </center>
    <br>
    <br>
    <ul id="sidebar_menu">


        <li class="">
            <a href="/posts" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset ('user/demo.dashboardpack.com/sales-html/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <span>Postingan</span>
            </a>
        </li>



        <li class="">
            <a href="/tambahpostingan" aria-expanded="false">
                <div class="icon_menu">
                    <!-- <i class="fa fa-book"></i> -->
                    <img src="{{ asset ('user/demo.dashboardpack.com/sales-html/img/menu-icon/2.svg ')}}" alt="">
                </div>
                <span>Tambah Postingan</span>
            </a>
        </li>

        {{-- <li class="">
            <a href="/tempat" aria-expanded="false">
                <div class="icon_menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: #eb8b1f; width:20px;" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                    </svg>
                </div>
                <span>Tambah Tempat</span>
            </a>
        </li> --}}



        <li class="">
            <a href="" aria-expanded="false">
                <div class="icon_menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: #eb8b1f; width:20px;" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </div>
                <span>Statistik</span>
            </a>
        </li>
        
        <li class="">
            <a href="./" aria-expanded="false">
                <div class="icon_menu">
                    <!-- <i class="fa fa-book"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: red; width:20px;" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>

                </div>
                <span>HOME</span>
            </a>
        </li>

</nav>

<div class="main_content_iner ">
    <div class="container-fluid p-0 ">
        <div class="row ">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3></h3>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Syarat & Ketentuan </div>
                            <div class="card-body">
                                <h5>1. Faktual</h5>
                                <p class="card-text">WPeristiwa atau kejadian yang akan disampaikan sebagai berita harus bersifat faktual atau fakta. Apa itu fakta? Fakta adalah berdasarkan kenyataan atau mengandung kebenaran, bukan berdasarkan imajinasi atau khayalan.

                                    Saat membaca cerpen dan novel, memang membaca paparan mengenai sebuah peristiwa. Namun, itu tidak bisa dikategorikan sebagai berita karena sumber yang diceritakan berdasarkan imajinasi dan tidak mengandung kebenaran faktual.</p>
                                                                    <h5 class="card-title">2. Aktual</h5>
<p class="card-text">Aktual adalah istilah lain dari up to date, atau kejadian yang terkini. Sebuah peristiwa baru bisa menjadi berita kalau kejadiannya masih baru atau hangat. Buat apa menceritakan sesuatu yang sudah lama terjadi dan kemungkinan semua orang sudah tahu? Karena itu, dalam jurnalistik juga dikenal prinsip aktualitas.</p>
                                                                    <h5 class="card-title">3. Tidak Memihak</h5>
<p class="card-text">Peristiwa yang akan disajikan menjadi sebuah berita harus bersifat objektif alias tidak memihak. Misalnya, ketika melihat sebuah peristiwa tawuran antarpelajar, lalu Sobat SMP akan menyajikannya menjadi sebuah berita. Cobalah untuk menempatkan diri pada posisi yang netral, tidak boleh berpihak kepada salah satu kelompok pelajar yang tawuran tersebut.</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>
@endsection
