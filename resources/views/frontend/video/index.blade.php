@extends('frontend.master')

@section('title') - Video Gallery @endsection

@section('body')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Video Gallery</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Video Gallery</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section>
            <div class="container">
                <div class="row">
                    @foreach($videoList->items as $key => $item)
                    <div class="col-md-4 col-sm-12">
                        <a href="{{url('/watch-video',$item->id->videoId)}}">
                            <div class="card mb-4">
                                <img src="{{ $item->snippet->thumbnails->medium->url }}" class="img-fluid" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Illuminate\Support\Str::limit($item->snippet->title, $limit=70, $end =' ...') }}</h5>
                                </div>
                                <div class="card-footer text-muted">
                                    Published at {{ date('d M Y', strtotime($item->snippet->publishTime)) }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
