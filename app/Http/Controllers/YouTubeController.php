<?php

namespace App\Http\Controllers;

//use Illuminate\Http\File;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    //
    public function index(){
        $videoList = $this->_videoList('Turning talks Bangladesh');
        return view('frontend.video.index', compact('videoList'));
    }

    public function watch($id){
        $singleVideo = $this-> _singleVideo($id);
        return view('frontend.video.watch', compact('singleVideo','id'));
    }


    protected function _videoList($keywords){
        $part = 'snippet';
        $country = 'BD';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 27;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video';
        $url = "$youTubeEndPoint?part=$part&maxResults=$maxResults&regionCode=$country&type=$type&key=$apiKey&q=$keywords";
        $response = Http::get($url);
        $results = json_decode($response);
        File::put(storage_path() . '/app/public/results.json', $response->body());

        return $results;
    }

    protected function _singleVideo($id){
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);
        File::put(storage_path() . '/app/public/single.json', $response->body());
        return $results;
    }
}
