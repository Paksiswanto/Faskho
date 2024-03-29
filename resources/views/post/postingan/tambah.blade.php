@extends('layout.artikel')
@push('css')
<style>
    #submitBtn {
        background-color: green;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    #submitBtn[disabled] {
        background-color: red;
        cursor: not-allowed;
    }

</style>
@endpush

@section('content')

<body>
    <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <br>
        <br>
        <center>
            <div class="top-left">
                <div class="navbar-header">
                    <a class=" ml-5 mr-5" href="/"><img src="{{asset('yummy-master/yummy-master/img/IMG_20230301_090831.png')}}" alt="" style="width: 80px"></a>
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


            <li class=" {{ Request::is('posts') ? 'active' : '' }}{{ Request::is('penutup') ? 'active' : '' }}{{ Request::is('utama') ? 'active' : '' }} ">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset ('user/demo.dashboardpack.com/sales-html/img/menu-icon/dashboard.svg') }}" alt="">
                    </div>
                    <span>Postingan</span>
                </a>
                <ul>
                <li class="{{ Request::is('pending') ? 'active' : '' }}"><a href="/pending/{{Auth::user()->id }}">pending</a></li>
                <li><a href="/posts/{{Auth::user()->id}}">Diterima</a></li>
                <li><a href="/tolak/{{Auth::user()->id}}">Ditolak</a></li>
                </ul>
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
                        <h4 class="box-title"> </h4>
                    </div>
                    <div class="add_button ms-2 mb-3">
                    </div>
                    <div class="card-body--">
                        <form class="px-4" action="{{Route('insertdatapost')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2 w-50">
                                    <h3>Judul:</h3>
                                    <input  style="width:100%"type="text" name="judul" value="{{old('judul')}}" class="form-control @error('judul')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('judul')
                                    {{$message}}
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h3>Thumbnail:</h3>
                                    <input type="file" name="thumbnail" class="form-control @error('thumbnail')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('thumbnail')}}" aria-describedby="emailHelp">@error('thumbnail')
                                    {{$message}}
                                    @enderror
                                </div>

                               <div class="col-md-6 mb-3 w-50">
    <h5>Deskripsi:</h5>
    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleInputEmail1" >{{ old('deskripsi') }}</textarea>
    @error('deskripsi')
    {{$message}}
    @enderror
</div>

                                {{-- <div class="col-md-6 mb-3 w-50">
                                    <h5>Deskripsi:</h5>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('deskripsi')}}" aria-describedby="emailHelp">@error('deskripsi')
                                {{$message}}
                                @enderror</textarea>
                                </div> --}}
                               <div class="col-md-6 mb-3 w-50">
    <h5>Kategori:</h5>
    <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id" aria-label="Default select example">
        <option value="">Pilih Kategori</option>
        @foreach ($dtkategori as $data)
        <option value="{{ $data->id }}" {{ old('kategori_id') == $data->id ? 'selected' : '' }}>{{ $data->kategori }}</option>
        @endforeach
    </select>
    @if ($errors->has('kategori_id'))
        <div class="invalid-feedback">
            {{ $errors->first('kategori_id') }}
        </div>
    @endif
</div>



                                <div class="mb-3">
                                    <h3>Konten:</h3>
                                    <textarea name="konten" id="summernote" class="form-control @error('konten')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('konten')}}">{{ old('konten') }}
                                   </textarea>
                                   @error('konten')
                                {{$message}}
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" name="agree" id="termsCheck">
                                    <label for="agree">
                                        Saya menyetujui
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Syarat dan Ketentuan</button>
                                    </label>

                                    @if($errors->has('agree'))
                                    <div class="invalid-feedback">{{ $errors->first('agree') }}</div>
                                    @endif
                                </div>

                            </div>

                            <!-- Modal -->

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Syarat & Ketentuan Pengguna KulinerKu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <br>
                                            <h5 class="card-title">Penggunaan KulinerKu :6</h5>
                                            @foreach ( $termsAndConditions as $data )
                                                 <p class="card-text">{!! $data->isi !!}</p>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="mb-2" type="submit" id="submitBtn" disabled>Posting</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        @endsection

        @push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

<script>
    const termsCheck = document.querySelector('#termsCheck');
    const submitBtn = document.querySelector('#submitBtn');

    // Memeriksa checkbox setiap kali diperbarui
    termsCheck.addEventListener('change', function() {
        if (this.checked) {
            // Checkbox dicentang, aktifkan tombol submit
            submitBtn.removeAttribute('disabled');
        } else {
            // Checkbox tidak dicentang, nonaktifkan tombol submit
            submitBtn.setAttribute('disabled', true);
        }
    });

</script>


@endpush
