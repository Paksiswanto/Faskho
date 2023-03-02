@extends('layout.artikel')


@section('content')


 @extends('layout.sidepost')
 
  <div class="main_content_iner ">
      <div class="container-fluid p-0 ">
        <div class="row ">
          <div class="col-12">
            <div class="dashboard_header mb_50">
              <div class="row">
                <div class="col-lg-6">
                  <div class="dashboard_header_title">
                    <h3></h3>
                  </div>
                </div>
                @foreach ($data as $index=>$row )   
              
                   
                <div class="card shadow-sm mb-5 bg-white rounded ">
                    <div class="row">
                      <div class="col-5" style="width: 340px;">
                        <div>
                        <img src="{{ asset('thumbnail/'.$row->foto) }}" class="img-fluid rounded-start" style="width: 100%; margin-left: -12px;" alt="..."> 
                      </div>
                      </div>
                      <div class="col-5 my-auto">
                        <div class="card-body">
                          <h5 class="card-title">{{ $row->judul }}</h5>
                          
                          
                          <p class="card-text">
                          {{ $row->deskripsi }}
                          </p>
                          <p class="card-text"><small class="text-muted">{{ $row->created_at->format('d F Y') }}</small></p>
                          <br>
                            <a href="{{ route('show', $row->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                     <div class="card-footer">
                    <a href="/tampilkandatapostingan/{{ $row->id }}" class="btn btn-warning">Edit</a>

                    <a href="/deletepostingan/{{ $row->id }}" class="btn btn-danger delete">Hapus</a>
                    </div>
                    </div>

                    
                   
                 @endforeach

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
</div>
@endsection


