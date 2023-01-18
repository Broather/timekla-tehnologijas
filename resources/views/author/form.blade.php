@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
<!-- where does $errors come from? -->
@if ($errors->any())
<div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
@endif
<!-- if author exists (aka we got here through update(), then send form data to /authors/patch/<id>) -->
<form method="post" action="{{ $author->exists ? '/authors/patch/' . $author->id : '/authors/put' }}">
    <!-- maģiskais csfr novērš hakerus :) -->
    @csrf
    <div class="mb-3">
        <label for="author-name" class="form-label">Autora vārds</label>
        <!-- how does old() work -->
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="author-name" name="name"
            value="{{ old('name', $author->name) }}">
        @error('name')
        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Pievienot</button>
</form>
@endsection