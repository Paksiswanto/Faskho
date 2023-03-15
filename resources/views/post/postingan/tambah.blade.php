@extends('layout.artikel')


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
                            <div class="mb-3">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                            </div>


                            <div class="col-md-6 mb-2 w-50">
                                <h3>Judul:</h3>
                                <input type="text" name="judul" value="{{old('judul')}}" class="form-control @error('judul')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('judul')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <h3>Thumbnail:</h3>
                                <input type="file" name="foto" class="form-control @error('foto')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('foto')}}" aria-describedby="emailHelp">@error('foto')
                                {{$message}}
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Deskripsi:</h5>
                                <textarea   name="deskripsi" style="white-space: nowrap;" value="{{old('deskripsi')}}" class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('deskripsi') 
                                {{$message}}
                                @enderror </textarea>
                            </div>

                            <div class="col-md-6 mb-3 w-50">
                                <h5>Kategori:</h5>
                                <select class="form-select" name="kategori_id" id="kategori_id" aria-label="Default select example">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($dtkategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            

                            <div class="mb-3">
                                <h3>Konten:</h3>
                                <textarea name="konten" id="summernote" class="form-control @error('konten')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('konten')}}" aria-describedby="emailHelp">@error('konten')
                                {{$message}}
                                @enderror</textarea>
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
            <p class="card-text">KulinerKu dengan ini menetapkan Syarat dan Ketentuan dalam pengaturan pemakaian situs www.kulinerku.com. Yang mendaftar atau menggunakan situs www.kulinerku.com, maka pengguna dianggap telah membaca dan menyetujui semua isi dalam Syarat dan Ketentuan. Apabila ada yang kurang jelas, dapat menghubungi kami di halaman kontak.</p>
        <br>
            <h5 class="card-title">Penggunaan KulinerKu</h5>
        <p class="card-text">(1) Akses
            untuk dapat menggunakan dan mengakses KulinerKu, pengguna diharuskan untuk berumur lebih dari 18 tahun. Apabila pengguna berumur kurang dari 18 tahun, maka tidak diijinkan untuk menggunakan dan mengakses KulinerKu.
            <br>
            (2) Dilarang untuk menulis dan/atau menjual ulang
            <br>
            (a) KulinerKu adalah produk untuk keperluan non-komersial. Pengguna tidak diijinkan untuk menggunakan KulinerKu untuk kegiatan bisnis, atau kegiatan apapun yang berhubungan dengan menghasilkan profit. Pengguna juga tidak diijinkan untuk mempromosikan kegiatan-kegiatan yang berhubungan dengan agama atau politik.
            <br>
            (b) Dilarang untuk melakukan penulisan ulang review-review yang di-post oleh Pengguna KulinerKu selain Pengguna itu sendiri.
            <br>
            (3) Melakukan post review, Hak Cipta
            <br>
            (a) Pengguna diwajibkan untuk melakukan registrasi untuk melakukan post review di KulinerKu..
            <br>
            (b) Apabila Pengguna melakukan registrasi di KulinerKu, Pengguna secara otomatis memberikan kuasa dan ijin kepada Perusahaan untuk dapat melakukan penulisan ulang, pendistribusian, sub-lisensi hal-hal yang Pengguna post di KulinerKu, termasuk di dalamnya adalah review.
            <br>
            (c) Pengguna menjamin kepada Perusahaan bahwa mereka memiliki hak-hak atas review yang mereka post. Pengguna juga menjamin bahwa review yang mereka post tidak melanggar hukum-hukum yang berlaku, hak-hak orang lain ataupun hak cipta pihak ketiga.
            <br>
            (d) Perusahaan atau pihak ketiga yang menerima sub-lisensi dari Perusahaan, dapat menggunakan review yang di-post oleh Pengguna KulinerKu dengan menggunakan isi dari konten-konten tersebut. Dalam hal ini, perlu diketahui bahwa ada kemungkinan terjadi sedikit perubahan-perubahan terhadap review untuk kenyamanan. Untuk kegiatan-kegiatan seperti ini, Perusahaan menjamin akan menampilkan akun Pengguna yang mem-post review tersebut.
            <br>
            (4) Kondisi untuk menggunakan PergiKuliner
            Dengan menggunakan KulinerKu, Pengguna setuju dengan Syarat dan Ketentuan yang ditentukan.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
      </div>
    </div>
  </div>

                            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Posting</button>
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
    // ambil elemen textarea
let textarea = document.getElementById('my-textarea');

// tambahkan event listener pada textarea
textarea.addEventListener('input', function() {
  // hapus whitespace pada nilai input
  let value = this.value.trim();
  
  // update nilai textarea dengan nilai yang telah dihapus whitespace-nya
  this.value = value;
});

</script>
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
