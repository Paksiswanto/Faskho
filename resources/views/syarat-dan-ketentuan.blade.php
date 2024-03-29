@extends('layout.admin')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

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
                                        <strong class="card-title">Syarat Dan Ketentuan:</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered">
                                            <tbody>

                                                <form action="{{ route('syarat-dan-ketentuan.update') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="isi">Isi Syarat dan Ketentuan: </label>
                                                        <textarea name="isi" class="form-control" id="summernote" rows="10">{!! $termsAndConditions->isi !!}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>



                                    </div>
                                </div>
                            </div>
                            </tr>

                            </tbody>
                            </table>

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
                                @foreach ($data as $index => $row)
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('user/demo.dashboardpack.com/sales-html/vendors/text_editor/summernote-bs4.js') }}"></script>


        </body>
        <Script>
            $('.delete').click(function() {
                var nama = $(this).attr('data-id');
                swal({
                        title: "Yakin Mau Hapus Data ?",
                        text: "kamu akan menghapus data Ulasan dengan " + nama + "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/deletedata/" + nama + ""
                            swal("Data Berhasil dihapus", {
                                icon: "success",
                            });
                        } else {
                            swal("Data tidak jadi dihapus");
                        }
                    });
            })
        </script>
        <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
        </script>

        <script>
            $('#summernote').summernote({
                placeholder: 'Tulis komentar anda',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview', 'help']]
                ]
            });
        </script>
