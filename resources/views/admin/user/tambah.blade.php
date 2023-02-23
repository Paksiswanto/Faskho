@extends('layout.admin')


@section('content')

<body>
    @extends('layout.sidebar')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Tambah user </h4>
                    </div>
                    <div class="add_button ms-2 mb-3">
                    </div>
                    <div class="card-body--">
                        <form class="px-4" action="/insertdatauser" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name Pengguna</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                {{$message}}
                              @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Password</label>
                                <input type="password" name="password" class="form-control @error('password')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">@error('password')
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
