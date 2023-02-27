@extends('layout.admin')


@section('content')

<body>
    @extends('layout.sidebar')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Tambah Ulasan </h4>
                    </div>
                    <div class="add_button ms-2 mb-3">
                    </div>
                    <div class="card-body--">
                        <form class="px-4" action="/insertdataulasan" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="mb-3">
                            
                                <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('nama')
                                {{$message}}
                              @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">isi komentar</label>
                                <input type="text" name="komentar" class="form-control @error('komentar')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('komentar')}}" aria-describedby="emailHelp">@error('komentar')
                                {{$message}}
                              @enderror
                            </div>

                        <button type="submit" class="btn btn-primary">kirim</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</body>
@endsection
