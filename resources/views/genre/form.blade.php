@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
<!-- where does $errors come from? -->
@if ($errors->any())
<div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas! {{ $errors }}</div>
@endif
<!-- if genre exists (aka we got here through update(), then send form data to /genres/patch/<id>) -->
<form method="post" action="{{ $genre->exists ? '/genres/patch/'.$genre->id : '/genres/put' }}">
    <!-- maģiskais csfr novērš hakerus :) -->
    @csrf
    <div class="mb-3">
        <label for="genre-name" class="form-label">Žanra nosaukums</label>
        <!-- how does old() work -->
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="genre-name" name="name"
            value="{{ old('name', $genre->name) }}" autofocus>
        @error('name')
        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Pievienot</button>
</form>
@endsection