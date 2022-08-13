@extends('frontend.master')
@section('title')- About @endsection

@section('body')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>About</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>About</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row content">
                    @foreach($details as $detail)
                    <div class="col-lg-12 pt-4 pt-lg-0 aboutImage">
                        <img src="{{$detail->photo}}" alt="" class="rounded shadow img-fluid">
                    </div>

                    <div class="col-lg-12">
                        <h3 class="pt-4">{!! $detail->details !!}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Team</h2>
                    <p>Our Hardowrking Team</p>
                </div>

                <div class="row">
                    @foreach($teams as $team)
                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{$team->photo}}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{$team->name}}</h4>
                                <span>{{$team->designation}}</span>
                                <div class="social">
                                    <a href="{{$team->facebook}}" target="_blank"><i class="ri-facebook-fill"></i></a>
                                    <a href="{{$team->youtube}}" target="_blank"> <i class="ri-youtube-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Team Section -->

@endsection
