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

        <div class="container">
            <?php

                //Get videos from channel by YouTube Data API
                $API_key    = 'AIzaSyCQdp0kAYjVXD8o1SmvIliw6pM1vtLt_SM';
                $channelID  = 'UCFKtA3RtFz2kiizaiNZ-z-g';
                $maxResults = 1000;

                $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));

                echo '<div class="row no-gutters">';
                foreach($videoList->items as $item){
                    if(isset($item->id->videoId)){
                        echo '<div class="col-md-4 col-sm-12">
                             <div class="card m-1">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                                <div class="card-body">
                                    <p>'. $item->snippet->title .'</p>
                                </div>
                            </div>
                        </div>';
                        }
                    }
                echo '</div>';
            ?>
        </div>
    </main><!-- End #main -->
@endsection


