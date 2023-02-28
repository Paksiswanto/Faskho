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
                        <strong class="card-title">Buat Postingan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <div class="add_button ms-2 mb-3">
                                <a href="/tambahpostingan" class="btn btn-success">Tambah+</a>
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
                                    <th>Judul</th>
                                    <th>Tag</th>
                                    <th>Konten </th>
                                    <th>Thumbnail</th>

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
                                    <td>{{ $row->judul}}</td>
                                     <td>{{ $row->tag}}</td>
                                    <td>{{ $row->konten}}</td>
                         <td>
                        <img src="{{ asset('thumbnail/'.$row->foto) }}" alt="" style="width: 130px;;">
                    </td>
                                    <td>
                                        <a href="/tampilkandatapostingan/{{ $row->id }}" class="btn btn-warning">Edit</a>

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

@endsection
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->

