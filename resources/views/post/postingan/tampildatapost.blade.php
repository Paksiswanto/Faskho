@extends('layout.artikel')


@section('content')

<body>
    @extends('layout.sidepost')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftarkan Tempat </h4>
                    </div>
                    <div class="add_button ms-2 mb-3">
                    </div>
                    <div class="card-body--">
                        <form class="px-4" action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                                <input type="text" name="judul" value="{{ $data ->judul}}" class="form-control @error('judul')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('judul')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">tag</label>
                                <input type="text" name="tag" class="form-control @error('tag')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{ $data ->tag}}" aria-describedby="emailHelp">@error('tag')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <input type="text" name="Alamat" class="form-control @error('Alamat')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{ $data ->Alamat}}" aria-describedby="emailHelp">@error('Alamat')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Konten:</label>
                                <textarea name="konten" id="summernote" class="form-control @error('konten')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{ $data->konten}}" aria-describedby="emailHelp">@error('konten')
                                {{$message}}
                                @enderror {!! $data->konten !!}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">kirim</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</body>
@endsection
