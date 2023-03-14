@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >

      <div class="row mb-5">
        <h1 class="text-center">Edit Profile</h1>
      </div>
        
      <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post" >
      <!-- DEFINE we use PATCH METHOD   -->
      @method('patch')
      @csrf 


      <div class="row mb-3">
        <label for="title"class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" name="title"  type="text" class="form-control @error('title') is-invalid @enderror" 
                  value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>
 
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="description"class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

        <div class="col-md-6">
            <input id="description" name="description"  type="text" class="form-control @error('description') is-invalid @enderror" 
            value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description" autofocus>
 
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="link"class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>

        <div class="col-md-6">
            <input id="link" name="link"  type="text" class="form-control @error('link') is-invalid @enderror" 
            value="{{ old('link') ?? $user->profile->link }}"  autocomplete="link" autofocus>
 
            @error('link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>


      <div class="row mb-3">
        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Porfile Image') }}</label>
        <div class="col-md-6">
            <input name="image" id="image" type="file" >
            @error('image')<strong>{{ $message }}</strong>@enderror
        </div>
      </div>

      <div class="row mb-5"> 
        <div class="col-6 offset-4">
          <button class="btn btn-primary" type="sumbit">Save Profile</button>
        </div>
      </div>

    </form>

    </div>
</div>
@endsection
