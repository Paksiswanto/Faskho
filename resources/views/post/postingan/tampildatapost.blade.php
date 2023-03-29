@extends('layout.artikel')


@section('content')

<body>
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <br>
    <br>
   <center> <div class="top-left">
        <div class="navbar-header">
            <a class=" ml-5 mr-5" href="/"><img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 80px"></a>
        </div>
    </div>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div></center>
    <br>
    <br>
    <ul id="sidebar_menu">


        <li class="">
            <a href="/posts/{{Auth::user()->id }}" aria-expanded="false">
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



        <li class="">
            <a href="/statistik/{{Auth::user()->id }}" aria-expanded="false">
                <div class="icon_menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: #eb8b1f; width:20px;" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </div>
                <span>Statistik</span>
            </a>
        </li>

        <li class="">
            <a href="/komenku/{{Auth::user()->id }}" aria-expanded="false">
                <div class="icon_menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="color: #eb8b1f; width: 20px;" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>
                </div>
                <span>Komentar</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('litindex') }}" aria-expanded="false">
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
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    </div>
                    <div class="add_button ms-2 mb-3">
                    </div>
                    <div class="card-body--">
                        <form class="px-4" action="/updt/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                            <div class="mb-3">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                            </div>

                             <div class="mb-3">
                                <input type="hidden" name="kategori_id" value="{{ auth()->user()->id}}">
                            </div>

                            <div class="col-md-6 mb-2 w-50">
                                <h3>Judul:</h3>
                                <input type="text" name="judul" value="{{ $data ->judul}}" class="form-control @error('judul')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('judul')
                                {{$message}}
                                @enderror
                            </div>

                             <div class="col-md-6 mb-2 w-50">
                                <h3>Thumbnail:</h3>
                                <input type="file" name="foto"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data ->foto }}">
                                <img src="{{ asset('thumbnail/'.$data->foto) }}" alt="" style="width: 130px;">
                            </div>

                             <div class="col-md-6 mb-3 w-50">
                                <h5>Deskripsi:</h5>
                                <textarea  name="deskripsi"  value="{{$data ->deskripsi}}" class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"> @error('deskripsi') 
                                {{$message}}
                                @enderror {{$data ->deskripsi}}</textarea>
                            </div>

                             <div class="col-md-6 mb-3 w-50">
                                <h5>Kategori:</h5>
                                <select class="form-select" name="kategori_id" id="kategori_id" aria-label="Default select example">
                                    <option disabled value>Pilih Kategori</option>
                                    <option value="{{ $kt->kategori_id }}">{{ $kt->kategori->kategori }}</option>
                                    @foreach ($dtkategori as $kt)
                                    <option value="{{ $kt->id }}">{{ $kt->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Konten:</label>
                                <textarea name="konten" id="summernote" class="form-control @error('konten')
                                    is-invalid
                                @enderror" id="exampleInputEmail1"  aria-describedby="emailHelp">@error('konten')
                                {{$message}}
                                @enderror {!! $data->konten !!}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">kirim</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
@endsection
