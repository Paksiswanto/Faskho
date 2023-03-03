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


                        <div class="white_card card_height_100mb_20">
                            <div class="white_card_header">
                                <div class="single-post">
                                    @php
                                    // increment article views count
                                    DB::table('postingans')->where('id', $data->id)->increment('views');
                                    @endphp
                                    <h1>{{ $data->judul}}</h1>
                                    <p>Posted on: {{ $data->created_at->format('d F Y') }}</p>
                                    <p>Author: {{ Auth::user()->name}}</p>
                                    <p>Author: {{ $data->kategori->kategori}}</p>

                                    <hr>
                                    <div>{!! $data->konten !!}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
