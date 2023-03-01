@extends('layout.artikel')


@section('content')

<body>
    @extends('layout.sidepost')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Buat Postingan </h4>
                    </div>
                    <div class="add_button ms-2 mb-3">
                    </div>
                    <div class="card-body--">
                        <form class="px-4" action="/updt/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                            </div>

                             <div class="mb-3">
                                <input type="hidden" name="kategori_id" value="{{ auth()->user()->id}}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul:</label>
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
                                <label for="exampleInputEmail1" class="form-label">Deskripsi:</label>
                                <input type="text" name="deskripsi" class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{ $data ->deskripsi}}" aria-describedby="emailHelp">@error('deskripsi')
                                {{$message}}
                                @enderror
                            </div>

                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori:</label>
                                <select class="form-select" name="kategori_id" id="kategori_id" aria-label="Default select example">
                                    <option disabled value>Pilih Kategori</option>
                                    <option value="{{ $kt->kategori_id }}">{{ $kt->kategori->kategori }}</option>
                                    @foreach ($dtkategori as $kt)
                                    <option value="{{ $kt->id }}">{{ $kt->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Thumbnail</label>
                                <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data ->foto }}">
                                <img src="{{ asset('thumbnail/'.$data->foto) }}" alt="" style="width: 130px;">
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
</body>
@endsection
