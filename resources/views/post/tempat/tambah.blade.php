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
                        <form class="px-4" action="{{Route('insertdatatempat')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('nama')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jam oprasional</label>
                                <input type="text" name="jam_oprasional" class="form-control @error('jam_oprasional')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('jam_oprasional')}}" aria-describedby="emailHelp">@error('jam_oprasional')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" value="{{old('alamat')}}" aria-describedby="emailHelp">@error('alamat')
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
