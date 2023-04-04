@extends('layout.artikel')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')


    <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <br>
        <br>
        <center>
            <div class="top-left">
                <div class="navbar-header">
                    <a class=" ml-5 mr-5" href="/"><img
                            src="{{ asset('yummy-master/yummy-master/img/IMG_20230301_090831.png') }}" alt=""
                            style="width: 80px"></a>
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
                <a href="/posts/{{ Auth::user()->id }}" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset('user/demo.dashboardpack.com/sales-html/img/menu-icon/dashboard.svg') }}"
                            alt="">
                    </div>
                    <span>Postingan</span>
                </a>
            </li>



            <li class="">
                <a href="/tambahpostingan" aria-expanded="false">
                    <div class="icon_menu">
                        <!-- <i class="fa fa-book"></i> -->
                        <img src="{{ asset('user/demo.dashboardpack.com/sales-html/img/menu-icon/2.svg ') }}"
                            alt="">
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
                <a href="/statistik/{{ Auth::user()->id }}" aria-expanded="false">
                    <div class="icon_menu">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: #eb8b1f; width:20px;"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                    </div>
                    <span>Statistik</span>
                </a>
            </li>

            <li class="">
                <a href="/komenku/{{ Auth::user()->id }}" aria-expanded="false">
                    <div class="icon_menu">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: #eb8b1f; width: 20px;"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </div>
                    <span>Komentar</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('litindex') }}" aria-expanded="false">
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
                            @if (count($notifications) > 0)
                            <ul>
                                @foreach ($notifications as $notification)
                                <div class="card">
                                        <div class="notification {{ $notification->read_at ? 'read' : 'unread' }} ">
                                            <li>
                                                <p class="mt-2" style="font-size: 100%;font-family:sans-serif">{{ $notification->content }}</p>
                                                <span
                                                    class="pull-right ma">{{ $notification->created_at->diffForHumans() }}</span>
                                            </li>
                                            @if (!$notification->read_at)
                                                <form action="{{ route('notifications.markAsRead', $notification->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary mt-2 p-1 mb-2">Mark as read</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada notifikasi</p>
                            @endif
                        </div>


                        <div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div><!-- .animated -->
    </div><!-- .content -->
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
    <Script>
        $('.delete').click(function() {
            var postinganid = $(this).attr('data-id');
            var judul = $(this).attr('data-judul');
            swal({
                    title: "Yakin Mau Hapus Data ?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/hapus/" + postinganid + ""
                        swal("Data Berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        })
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
