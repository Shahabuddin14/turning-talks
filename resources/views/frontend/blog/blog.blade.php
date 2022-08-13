@extends('frontend.master')
@section('title')- Single blog @endsection

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=264537095196506&autoLogAppEvents=1" nonce="DLJBgB6c"></script>
@section('body')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ Illuminate\Support\Str::limit($blog->title, 50) }}</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-10 entries offset-1">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                {{ $blog->title }}
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> {{ $blog->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                   {!! $blog->details !!}
                                </p>
                            </div>
                        </article><!-- End blog entry -->

                        <div class="blog-comments">
                            <div id="comment-1" class="comment clearfix">
                                <div class="fb-comments" data-href="https://turningtalksbd.com/single-blog/" data-width="" data-numposts="10"></div>
                            </div><!-- End comment #1 -->
                        </div><!-- End blog comments -->
                    </div><!-- End blog entries list -->
                </div>
            </div>
        </section><!-- End Blog Section -->
    </main><!-- End #main -->
@endsection

