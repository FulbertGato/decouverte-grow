@extends('layouts.base')
@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Vidéos listes</h2>
        <p>Lorem ipsum dolor sit amet.</p>
    </div>
    <div>
        <a href="{{route('videos.create')}}" class="btn btn-primary btn-sm rounded">Create new</a>
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
                    <a href="#" class="title text-truncate">{{$video->title}}</a>
                    <div class="price mb-2">{{$video->author}}</div> <!-- price.// -->
                    <a href="{{url('/videos/edit/'.$video->id)}}" class="btn btn-sm font-sm rounded btn-warning">
                        <i class="material-icons md-edit"></i> Modifier
                    </a>
                    <a href="{{url('/videos/delete/'.$video->id)}}" class="btn btn-sm font-sm btn-danger rounded">
                        <i class="material-icons md-delete_forever"></i> Supp
                    </a>
                    <a href="#" class="btn btn-sm font-sm btn-success rounded">
                        <i class="material-icons md-settings"></i> Voirs
                    </a>
                </div>
            </div> <!-- card-product  end// -->
        </div> <!-- col.// -->
           @endforeach

        </div> <!-- row.// -->
    </div> <!-- card-body end// -->
</div> <!-- card end// -->
<div class="pagination-area mt-30 mb-50">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            <li class="page-item active"><a class="page-link" href="#">01</a></li>
            <li class="page-item"><a class="page-link" href="#">02</a></li>
            <li class="page-item"><a class="page-link" href="#">03</a></li>
            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">16</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
        </ul>
    </nav>
</div>
@endsection
