@extends('layouts.base')
@section('content')
<form  method="post" action="{{url('podcasts/'.$podcast->id)}}" enctype='multipart/form-data' >
    @csrf
    <!-- error message -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">

            <div class="col-9" id="liste-audio-container">
                <div class="content-header">
                    <h2 class="content-title">Ajouter un podcast</h2>
                    <div>

                        <button type="button" src="{{asset($podcast->audio)}}" class="audio btn btn-light rounded font-sm mr-5 text-body hover-up">Ecouter</button>
                        <button type="submit" class="btn btn-md rounded font-sm hover-up">Publier</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">

                        <div class="mb-4">
                            <label  class="form-label">Titre</label>
                            <input type="text" name="title" class="form-control" value="{{$podcast->title}}">
                            <input type="text" name="id" value="{{$podcast->id}}" class="form-control" hidden readonly>
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Auteur</label>
                            <input type="text" name="auteur" class="form-control" value="{{$podcast->author}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4">{{$podcast->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Cover photo</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="{{asset($podcast->image)}}" alt="" id="upload">
                            <input class="form-control" type="file" name="new_image" id="image">
                        </div>
                    </div>
                </div> <!-- card end// -->

                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Audio</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="{{asset('assets/imgs/theme/upload.svg')}}" alt="">
                            <input class="form-control" type="file" name="new_audio">
                        </div>
                    </div>
                </div> <!-- card end// -->

            </div>


    </div>
</form>
<script>
    if (document.getElementById('image')) {
        document.getElementById('image').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('upload').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    }
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
            pause.innerHTML = 'Pause';
            pause.classList.add('btn', 'btn-info', 'rounded' ,'font-sm', 'mr-5', 'text-body', 'hover-up');
             //replace btn with pause btn
            btn.parentNode.replaceChild(pause, btn);
            //add event listener to pause btn
            pause.addEventListener('click', function(e) {
                audio.pause();
                //replace pause btn with btn
                pause.parentNode.replaceChild(btn, pause);
            });


        }
        });

</script>
@endsection
