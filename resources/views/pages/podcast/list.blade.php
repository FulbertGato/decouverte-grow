@extends('layouts.base')
@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Podcasts listes</h2>
        <p>Lorem ipsum dolor sit amet.</p>
    </div>
    <div>
        <a href="{{route('podcasts.create')}}" class="btn btn-primary btn-sm rounded">Ajouter un podcast</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <div id="liste-audio-container" class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
            @foreach ($podcasts as $podcast)
            <div class="col">
                <div class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src='{{asset("$podcast->image")}}' alt="Podcast"> </a>
                    <div class="info-wrap">
                        <a href="#" class="title text-truncate">{{$podcast->title}}</a>
                        <div class="price mb-2">{{$podcast->auteur}}</div> <!-- price.// -->
                        <a href="{{url('/podcasts/edit/'. $podcast->id)}}" class="btn btn-sm font-sm rounded btn-warning">
                            <i class="material-icons md-edit"></i> Modifier
                        </a>
                        <a href="{{url('/podcasts/delete/'. $podcast->id)}}" class="btn btn-sm font-sm btn-danger rounded">
                            <i class="material-icons md-delete_forever"></i> Supp
                        </a>
                        <button  src="{{asset($podcast->audio)}}" class="audio btn btn-sm font-sm btn-success rounded">
                            <i class="material-icons md-settings"></i> Ecouter
                        </button>
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
<!-- get audio and play where on click -->
<script>
    // Get the element, add a click listener...
        document.getElementById("liste-audio-container").addEventListener("click", function(e) {
        // e.target is the clicked element!
        // If it was a list item
        if(e.target && e.target.classList.contains('audio')) {
            var btn=e.target;
            //get btn attributes src
            var src=btn.getAttribute('src');
            var audio = new Audio(src);
            console.log(audio);
            //si il y a un audio en cours de lecture, on le stop


            audio.play();
            //create pause element btn
            var pause = document.createElement('button');
            pause.innerHTML = '<i class="material-icons md-pause"></i>Pause';
            pause.classList.add('btn', 'btn-sm', 'font-sm', 'rounded', 'btn-info');
             //replace btn with pause btn
            btn.parentNode.replaceChild(pause, btn);
            //add event listener to pause btn
            pause.addEventListener('click', function(e) {
                audio.pause();
                //replace pause btn with btn
                pause.parentNode.replaceChild(btn, pause);
            });
            //when audio finish, replace pause btn with btn
            audio.onended = function() {
                pause.parentNode.replaceChild(btn, pause);
            };



        }
        });
</script>



@endsection
