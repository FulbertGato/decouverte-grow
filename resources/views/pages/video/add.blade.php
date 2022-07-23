@extends('layouts.base')
@section('content')
<form action="{{route('videos.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <a href="{{route('videos.list')}}" class="btn btn-info btn-sm rounded"><i class="icon material-icons md-add"></i>Listes</a>
        </div>
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">AJOUTER UNE VIDEO</h2>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">

                <div class="card-body">

                    <div class="mb-4">
                        <label for="product_name" class="form-label">Titre</label>
                        <input type="text" placeholder="Type here" class="form-control" name="title">
                    </div>
                    <div class="mb-4">
                        <label for="product_name" class="form-label">Auteur</label>
                        <input type="text" placeholder="Type here" class="form-control" name="auteur">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Description</label>
                        <textarea placeholder="Type here" class="form-control" rows="4" name="description"></textarea>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-md rounded font-sm hover-up">AJOUTER UNE VIDEO</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Photo couverture</h4>
                </div>
                <div class="card-body">
                    <div class="input-upload">
                        <img src="{{asset('assets/imgs/theme/upload.svg')}}" alt="" id="upload">
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                </div>
            </div> <!-- card end// -->

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Vidéos</h4>
                </div>
                <div class="card-body">
                    <div class="input-upload">
                        <img src="{{asset('assets/imgs/theme/upload.svg')}}" alt="">
                        <input class="form-control" type="file" name="video">
                    </div>
                </div>
            </div> <!-- card end// -->

        </div>


    </div>
</form>
<script>
    //si image est upload dans le formulaire, on affiche l'image
    if (document.getElementById('image')) {
        document.getElementById('image').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('upload').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    }


</script>
@endsection
