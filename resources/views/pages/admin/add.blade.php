@extends('layouts.base')
@section('content')
@extends('layouts.base')
@section('content')
<form  method="post" action="{{route('admin.store')}}" enctype='multipart/form-data' >
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

            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Ajouter un gestionnaire</h2>
                    <div>
                        <button type="submit" class="btn btn-md rounded font-sm hover-up">AJOUTER</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-body">

                        <div class="mb-4">
                            <label  class="form-label">Nom</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
            </div>


    </div>
</form>


@endsection
