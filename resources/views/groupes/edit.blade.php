@extends('template.app')

@section('content')
    <div class="container">
        <p>
            <a href="{{ route('groupes.index') }}" class="btn btn-primary"> Retour</a>
        </p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier un groupe') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('groupes.update',$groupe->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom du groupe') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ $groupe->libelle }}" required autocomplete="name" autofocus>
    
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