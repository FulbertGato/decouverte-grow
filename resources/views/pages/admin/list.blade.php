@extends('layouts.base')
@section('content')
<div class="content-header">
    <h2 class="content-title">Gestionnaire listes</h2>
    <div>
        <a href="{{route('admin.create')}}" class="btn btn-primary"><i class="material-icons md-plus"></i> Ajauter un nouveau</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date d'ajout</th>
                        <th class="text-end"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gestionnaires as $admin)
                    <tr>
                        <td width="40%">
                            <a href="#" class="itemside">
                                <div class="info pl-3">
                                    <h6 class="mb-0 title">{{$admin->name}}</h6>

                                </div>
                            </a>
                        </td>
                        <td>{{$admin->email}}</td>

                        <td>{{$admin->created_at->diffForHumans();}}</td>
                        <td class="text-end">
                            <a href="{{url('/gestionnaires/delete/'.$admin->id)}}" class="btn btn-sm btn-danger rounded font-sm mt-15">Supprimer</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table> <!-- table-responsive.// -->
        </div>
    </div> <!-- card-body end// -->
</div> <!-- card end// -->


@endsection
