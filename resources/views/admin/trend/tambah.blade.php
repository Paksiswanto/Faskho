@extends('layout.admin')


@section('content')

<body>
    @extends('layout.sidebar')
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
                        <form class="px-4" action="{{Route('insertdatatrend')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori:</label>
                                <select class="form-select" name="kategori_id" id="kategori_id" aria-label="Default select example">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($dtkategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">kirim</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</body>
@endsection
