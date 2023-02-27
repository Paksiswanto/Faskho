@extends('layout.artikel')


@section('content')


<div class="content">
    <div class="animated fadeIn">
        <div class="row">
 @extends('layout.sidepost')
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Tempat</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <div class="add_button ms-2 mb-3">
                                <a href="/tambahtempat" class="btn btn-success">Tambah+</a>
                                <div class="my-3">
                                    <form action="" method="get">
                                        <div class="input-group mb-3 col-12 col-sm-8 col-md-6">
                                                <input type="text" class="form-control" name="keyword" placeholder="Cari Data">
                                                 <button  class="input-group-text btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Tempat</th>
                                    <th>jam Oprasional</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($data as $index=>$row )
                                <tr>
                                    <th scope="row">{{ $index +$data->firstitem()}}</th>
                                    <td>{{ $row->Nama}}</td>
                                    <td>{{ $row->jam_oprasional}}</td>

                                    <td>{{ $row->alamat}}</td>

                                    <td>
                                        <a href="/updatetempat/{{ $row->id }}" class="btn btn-warning">Edit</a>

                                        <a href="/deletetempat/{{ $row->id }}" class="btn btn-danger delete">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            showing
                            {{ $data->firstitem() }}
                            to
                            {{ $data->lastitem() }}
                            of
                            {{ $data->total() }}
                            entries
                        </div>
                        <div class="pull-right">
                            {{ $data ->withQueryString()-> links() }}
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    {{-- <div class="content">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Data Ulasan </h4>
                </div>
                <div class="add_button ms-2 mb-3">
                    <a href="/tambahulasan" class="btn btn-success">Tambah+</a>
                </div>
                <div class="card-body--">
                    <div class="table-stats ">
                        <table class="table p-5 table table-bordered shadow p-3 mb-5 bg-white rounded table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">komentar</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($data as $index=>$row )
                                <tr>
                                    <th scope="row">{{ $index +$data->firstitem()}}</th>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->komentar }}</td>
    <td>{{ $row->created_at->format('D M Y') }}</td>
    <td>
        <a href="/tampilkandataulasan/{{$row->id}}" class="btn btn-warning">edit</a>
        <a href="/deletedata/{{ $row->id }}" class="btn btn-danger delete">Hapus</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    {{ $data->links() }}
</div>
</div>
</div>
</div>

</div> --}}
@endsection
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->

