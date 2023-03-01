@extends('layout.artikel')


@section('content')

<body>
    @extends('layout.sidepost')
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

                            <div class="mb-3">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            </div>


                            <div class="mb-3">
                                <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                            </div>


                            <div class="mb-3">
                                <h3>Judul:</h3>
                                <input type="text" name="judul" value="{{old('judul')}}" class="form-control @error('judul')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('judul')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-4">
                                <h3>Tag:</h3>
                                <input type="text" name="tag" class="form-control @error('tag')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('tag')}}" aria-describedby="emailHelp">@error('tag')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <h3>Deskripsi:</h3>
                                <input type="text" name="deskripsi" value="{{old('deskripsi')}}" class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('deskripsi')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori:</label>
                                <select class="form-select" name="kategori_id" aria-label="Default select example">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($datakategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <h3>Thumbnail:</h3>
                                <input type="file" name="foto" class="form-control @error('foto')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('foto')}}" aria-describedby="emailHelp">@error('foto')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <h3>Konten:</h3>
                                <textarea name="konten" id="summernote" class="form-control @error('konten')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('konten')}}" aria-describedby="emailHelp">@error('konten')
                                {{$message}}
                                @enderror</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">kirim</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</body>
@endsection
