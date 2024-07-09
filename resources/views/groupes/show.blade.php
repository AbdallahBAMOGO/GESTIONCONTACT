@extends('template.app')

@section('content')
<div class="container">
    <h2>{{ $pageTitle }}</h2>
    <p>
        <a href="{{ route('groupes.index') }}" class="btn btn-primary"> Retour</a>
    </p>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Details du groupe : {{ $group->libelle }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $group->libelle }}</h5>
                    <p class="card-text">Creer le : {{ $group->created_at }}</p>
                    <p class="card-text">Nombre de contact: {{ $group->contacts->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
