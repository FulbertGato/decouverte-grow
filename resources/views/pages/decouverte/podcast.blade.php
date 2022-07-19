@extends('layouts.decouverte')
@section('content')
<section class="all-videos-area main-width">
    <div class="main-video-top-area">
        <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
      </div>
    <div class="main-videos">
        <div class="videos-btns" onclick="">
          <img src="{{asset($podcast->image)}}">
        </div>
      </div>
    <div class="total-videos">
        <div class="video-top-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis felis ex. Aenean id convallis
                elit, eu auctor risus. </p>
                <a href="#" id="description"><i class="fa-solid fa-volume-high"></i></a>
        </div>
        <div class=" total-audio" id="liste-audio-container" >
            <h2>Podcast</h2>
            <div class="audio-items">
                @foreach ($podcasts as $podcast)
                <div class="audio-single-item">
                    <div class="single-audio">
                    <img src="decouverte/assets/images/audio1.png" alt="audio">
                    </div>
                    <div class="single-audio-text">

                        <h2>{{$podcast->title}}</h2>
                        <h4><span>{{$podcast->author}}</span><span>{{$podcast->duration}}</span></h4>
                        <div class="audio-main-area dzsap-sticktobottom dzsap-sticktobottom-for-skin-wave">
                            <div class="stickyplayer audioplayer-tobe" style="width:100%;" data-type="normal"
                            data-source="{{asset($podcast->audio)}}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        </div>
    </div>
</section>
@endsection
