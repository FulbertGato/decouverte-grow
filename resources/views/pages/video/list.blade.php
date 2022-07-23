@extends('layouts.base')
@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Liste vidéos témoignage</h2>
    </div>
    <div>
        <a href="{{route('videos.create')}}" class="btn btn-primary btn-sm rounded"><i class="icon material-icons md-add"></i> AJOUTER UNE NOUVELLE VIDEO</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-4 row-cols-xxl-5">
           @foreach ($videos as $video )
           <div class="col">
            <div class="card card-product-grid">
                <a href="#" class="img-wrap">
                    <video
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    width="270"
                    height="270"
                    poster="{{asset($video->image)}}"
                    data-setup="{}"
                  >
                    <source src="{{asset($video->video)}}" type="video/mp4" />

                  </video>
                   {{-- <img src="{{asset($video->image)}}" alt="Product"> </a> --}}
                <div class="info-wrap">
                    <a href="#" class="title text-truncate">Titre: {{$video->title}}</a>
                    <div class="price mb-2">Auteur : {{$video->author}}</div> <!-- price.// -->
                    <a href="{{url('/videos/edit/'.$video->id)}}" class="btn btn-sm font-sm rounded btn-warning">
                        <i class="material-icons md-edit"></i> Modifier
                    </a>
                    <a href="{{url('/videos/delete/'.$video->id)}}" class="btn btn-sm font-sm btn-danger rounded">
                        <i class="material-icons md-delete_forever"></i> Supprimer
                    </a>

                </div>
            </div> <!-- card-product  end// -->
        </div> <!-- col.// -->
           @endforeach

        </div> <!-- row.// -->
    </div> <!-- card-body end// -->
</div> <!-- card end// -->

@endsection
