@extends('frontend.master')
@section('title')- Blogs @endsection

@section('body')

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry">

                            <div class="entry-img">
                                <img src="{{ $blog->image }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ url('/single-blog/'.$blog->id) }}">{{ Illuminate\Support\Str::limit($blog->title, 50) }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="{{ url('/single-blog/'.$blog->id) }}">{{ $blog->created_at->diffForHumans() }}</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!! Illuminate\Support\Str::limit($blog->details, 120) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ url('/single-blog/'.$blog->id) }}">Read More</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>
                    @endforeach
                </div>

{{--                <div class="blog-pagination" data-aos="fade-up">--}}
{{--                    <ul class="justify-content-center">--}}
{{--                        <li class="disabled"><i class="icofont-rounded-left"></i></li>--}}
{{--                        <li><a href="#">1</a></li>--}}
{{--                        <li class="active"><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li><a href="#"><i class="icofont-rounded-right"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
