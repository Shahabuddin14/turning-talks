@extends('frontend.master')
@section('title')- Photo Gallery @endsection

@section('body')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Photo Gallery</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Photo Gallery</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row portfolio-container">
                    @foreach($photos as $photo)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{$photo->name}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{$photo->name}}" data-gall="portfolioGallery" class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
