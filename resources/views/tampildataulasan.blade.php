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
                        <form class="p-2"action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp "  value="{{ $data ->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">isi komentar</label>
                                <input type="text" name="komentar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $data ->komentar }}">
                            </div>

                        <button type="submit" class="btn btn-primary">update data</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</body>
@endsection
