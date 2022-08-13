@extends('frontend.master')
@section('title')- Services @endsection

@section('body')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Services</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Services</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-md-6">
                        <div class="icon-box">
                            <img src="{{ $service->image }}" class="img-fluid float-left" alt="" width="55">
                            <h4>
                                <a href="#" data-toggle="modal" data-target="#exampleModalLong{{$service->id}}">{{ $service->name }}</a>
                            </h4>
                            <p>{{ $service->title }}</p>

                            <div class="modal fade" id="exampleModalLong{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="background-color: #F8F9FA">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{ $service->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            {!! $service->details !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Services Section -->

    </main><!-- End #main -->
@endsection
