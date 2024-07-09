@extends('template.app')

@section('content')
<div class="container">
    <h2>{{$pageTitle}}</h2>
    <p>
        <a href="{{ route('contacts.index') }}" class="btn btn-primary"> Retour</a>
    </p>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier un contact') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.update',$contact->id) }}">
                        @csrf
                        @method('Put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $contact->nom }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $contact->prenom }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $contact->telephone }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $contact->email }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Groupe') }}</label>

                            <div class="col-md-6">
                                <select name="groupe" class="form-control"  id="groupe">
                                    @if(!empty($groupes))
                                        @foreach ($groupes as $group)
                                            <option value="{{$group->id}}" <?php if($contact->contact_id == $group->id) { echo 'selected'; } else {echo '';} ?>>{{$group->libelle}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
