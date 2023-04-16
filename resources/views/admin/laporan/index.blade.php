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
                                        <strong class="card-title">Data Laporan</strong>
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
                                            
                                            <section class="archive-area section_padding_80">
                                                <div class="container">
                                                    <div class="row">
                                                        @foreach ($data as $index => $row)
                                                        <div class="col-12 col-md-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                                            <h4 class="card-title">{{ $row->nama }}</h4>
                                                                            <p class="card-text">{{ $row->created_at->format('D M Y') }}</p>
                                                                        </div>
                                                                        <h6 class="card-subtitle mb-2 text-muted">{{ $row->email }}</h6>
                                                                        <p class="card-text">{{ $row->judul }}</p>
                                                                        <p class="card-text">{{ $row->laporan }}</p>
                                                                        <div class="d-flex justify-content-end mt-3">
                                                                            <a href="/deletedp/{{ $row->id }}" class="btn btn-danger delete">Hapus</a>
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                                Balas
                                                                              </button>
                                                                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                  <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                      <h5 class="modal-title" id="exampleModalLabel">Kirim Balasan Ke User</h5>
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                      </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                      <form action="/laporan/{{$row->id}}" method="post">
                                                                                        @csrf
                                                                                        <textarea name="pesan" id="" cols="50" rows="5"></textarea>
                                                                                        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                                                                                    </form>
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                           
                                                                                </td>
                                                                            </tr>
                                                                        
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </section>
                                            
                                            
                                            
    
                                            
                                        
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
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
        -->
    </body>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
    @push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

@endpush
