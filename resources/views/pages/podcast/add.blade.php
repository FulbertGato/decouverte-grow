@extends('layouts.base')
@section('content')
<form  method="post" action="{{route('podcasts.store')}}" enctype='multipart/form-data' >
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
        <div>
            <a href="{{route('podcasts.list')}}" class="btn btn-info btn-sm rounded"><i class="icon material-icons md-add"></i>Listes</a>
        </div>

            <div class="col-9 mt-3">
                <div class="content-header">
                    <h2 class="content-title">Ajouter un podcast</h2>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">

                        <div class="mb-4">
                            <label  class="form-label">Titre</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Auteur</label>
                            <input type="text" name="auteur" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-4" >
                            <button type="submit" class="btn btn-md rounded font-sm hover-up"><i class="icon material-icons md-add"></i>AJOUTER LE PODCAST</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Photo de couverture</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="{{asset('assets/imgs/theme/upload.svg')}}" id="upload">
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                    </div>
                </div> <!-- card end// -->

                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Podcast </h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="{{asset('assets/imgs/theme/upload.svg')}}" alt="">
                            <input class="form-control" type="file" name="audio">
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
