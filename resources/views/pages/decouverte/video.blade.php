@extends('layouts.decouverte')
@section('content')
<section class="all-videos-area main-width other-videos-area">
    <div class="main-video-top-area">
      <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
      <p>Témoignage de Fatou premiere apprenante de grow</p>
    </div>


    <div class="main-videos">

      <div class="videos-btns">
        <video
            id="my-video"
            autoplay="autoplay"
            class="video-js"
            controls
            preload="auto"
            width="490"
            height="270"
            poster="{{asset($video->image)}}"
            data-setup="{}"
            >
                <source src="{{asset($video->video)}}" type="video/mp4">
            </video>
      </div>
    </div>
    <div class="total-videos">

        <h2>Vidéos</h2>
        <div class="videos-items owl-carousel owl-theme ">
            @foreach ($videosL as $vid)
            <div class="single-videos">
                <a href="{{url('video/'.$vid->id)}}"><img src="{{asset($vid->image)}}" alt=""></a>
                <a href="{{url('video/'.$vid->id)}}">{{$vid->author}}</a>
            </div>
            @endforeach
        </div>
        <div class="videos-items owl-carousel owl-theme ">
            @foreach ($videosR as $vid)
            <div class="single-videos">
                <a href="{{url('video/'.$vid->id)}}"><img src="{{asset($vid->image)}}" alt=""></a>
                <a href="{{url('video/'.$vid->id)}}">{{$vid->author}}</a>
            </div>
            @endforeach
        </div>
        <div class="videos-items owl-carousel owl-theme ">
            @foreach ($videosL as $vid)
            <div class="single-videos">
                <a href="{{url('video/'.$vid->id)}}"><img src="{{asset($vid->image)}}" alt=""></a>
                <a href="{{url('video/'.$vid->id)}}">{{$vid->author}}</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
