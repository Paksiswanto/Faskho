@extends('layout.admin')


@section('content')


<div class="content">
    <div class="animated fadeIn">
        <div class="row">
@extends('layout.sidebar')
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data pribadi</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <div class="add_button ms-2 mb-3">
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
                                    <th>Kota</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>dibuat</th>
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
                                    <td>{{ $row->kota}}</td>
                                    <td>{{ $row->alamat}}</td>
                                    <td>{{ $row->no}}</td>
                                    <td>{{ $row->email}}</td>
                                    <td>{{ $row->created_at->format('D M Y') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            edit
                                          </button>
                                    </td>
                                    
                                      <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="px-4" action="/updata" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">kota</label>
                <input type="text" name="kota" value="{{$row->kota }}" class="form-control @error('kota')
                    is-invalid
                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('kota')
                {{$message}}
              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">alamat</label>
                <input type="text" name="alamat" value="{{$row->alamat}}" class="form-control @error('alamat')
                    is-invalid
                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('alamat')
                {{$message}}
              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">no hp</label>
                <input type="number" name="no" value="{{$row->no}}" class="form-control @error('no')
                    is-invalid
                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('no')
                {{$message}}
              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email</label>
                <input type="email" name="email" value="{{$row->email}}" class="form-control @error('email')
                    is-invalid
                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                {{$message}}
              @enderror
            </div>

        <button type="submit" class="btn btn-primary">kirim</button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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
@push('scripts')
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    -->
</body>
<Script>
    $('.delete').click(function() {
        var nama = $(this).attr('data-id');
        swal({
                title: "Yakin Mau Hapus Data ?"
                , text: "kamu akan menghapus data Ulasan dengan " + nama + ""
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletedata/" + nama + ""
                    swal("Data Berhasil dihapus", {
                        icon: "success"
                    , });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    })

</script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")

    @endif

</script>
