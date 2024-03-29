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
                                    <strong class="card-title">Pesan</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered">
                                        <div class="add_button ms-2 mb-3">
                                            <div class="my-3">
                                                <form action="" method="get">
                                                    <div class="input-group mb-3 col-12 col-sm-8 col-md-6">
                                                        <input type="text" class="form-control" name="keyword" placeholder="Cari Data">
                                                        <button class="input-group-text btn btn-primary">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- <section class="archive-area section_padding_80">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach ($data as $index=>$row )
                                                <div class="card" style="width: 18rem;">
                                                    <div class="card-body">
                                                    <!-- Single Post -->
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                       
                                                            <!-- Post Thumb -->
                                                            <!-- Post Content -->
                                                            <div class="post-content">
                                                                <div class="post-meta d-flex">
                                                                    <div class="post-author-date-area d-flex">
                                                                        <!-- Post Author -->
                                                                        <h5 class="card-title"> {{ $row->nama}}</h5>
                                                                        <!-- Post Date -->
                                                                        <h6 class="card-subtitle mb-2 text-muted">{{ $row->email}}</h6>
                                                                        <p class="card-text">{{ $row->laporan }}</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <a href = "/deletedata/{{$row->id}}"  class="btn btn-danger delete">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section> --}}
                                        <section class="archive-area section_padding_80">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach ($data as $index=>$row )
                                                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">{{ $row->nama}}</h4>
                                                                    <h6 class="card-subtitle mb-2 text-muted">{{ $row->email}}</h6>
                                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                                        <a href="#" class="data-link" data-toggle="modal" data-target="#exampleModal" data-id="{{ $row->id }}"> {{Str::limit($row->laporan,10) }} </a>
                                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                                                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <p id="data-detail"></p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                          

                                                                        <a href = "/deletedata/{{$row->id}}"  class="btn btn-danger delete">Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        
                                        

                                        <tbody>
                                            {{--                                             
                                            @php
                                            $no = 1;
                                            @endphp --}}
                                            
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
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")

    @endif

</script>
<
<script>
    $(document).on("click", "[data-toggle='modal']", function () {
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/laporan/" + id,
            success: function (response) {
                $("#data-detail").html(response);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>



@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
@endpush
