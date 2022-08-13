@extends('frontend.master')
@section('title')- Home @endsection

@section('body')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                @foreach($slides as $slide)
                    <!-- Slide  -->
                    <div class="carousel-item {{ $slide->class }}" style="background-image: url({{ $slide->image }})">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">{{ $slide->title }}</h2>
                                <p class="animate__animated animate__fadeInUp">{{ $slide->details }}</p>
                                <a href="{{url('/about')}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                            </div>
                        </div>
                    </div>
                 @endforeach
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="section-title">
                    <h2>Learn from great people</h2>
                </div>
                <div class="row content pt-3 pb-5">
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ql3sEU8pbCs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="h3">Mohit Kamal</h3>
                        <h5 class="h5">Mohit Kamal is a famous psychotherapist and fiction writer of Bangladesh. His books and works are different from others. He has been following a unique way to reach to the people. People loves him for his different approach. </h5>
                    </div>
                </div>
                <div class="row content pb-5">
                    <div class="col-lg-6">
                        <h3 class="h3">Monjur H</h3>
                        <h5 class="h5">Monjur H. is an award winning Motivational writer and DGM, International Marketing, Hameem Denim, Hameem Group. Listen the story from himself. </h5>
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/r5_Q9Mvo6FU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="row content pt-3">
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BKz95fzjgXw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                   </div>

                    <div class="col-lg-6">
                        <h3 class="h3">Farin Daulah</h3>
                        <h5 class="h5">Farin Daulah is the founder and president at One Circle. She formed One Circle with a vision to provide life skills education focusing on social and emotional aspects of learning all across Bangladesh.</h5>
                    </div>
                </div>

                <div class="row content pt-5">
                    <div class="col-lg-6">
                        <h3 class="h3">Rasheq Rahman</h3>
                        <h5 class="h5">Rasheq Rahman is an independent businessman, working in the field of Information Technology. He is also the Assistant Secretary of Central Sub-Committee of Bangladesh Awami League. </h5>
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/06XGQ4F1orE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <h2>Portfolio</h2>
                    <p>Recent Photos</p>
                </div>
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
