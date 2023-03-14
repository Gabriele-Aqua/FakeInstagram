@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    <div class="col-8 offset-2">

      <div class="row mb-5">
        <h1 class="text-center" >Add new Post</h1>
      </div>

      <form action="/p" enctype="multipart/form-data" method="POST" >

        @csrf
        <div class="row mb-3">
          <label for="caption"class="col-md-4 col-form-label text-md-end">{{ __('Post Caption') }}</label>
  
          <div class="col-md-6">
              <input id="caption" name="caption"  type="text" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption') }}"  autocomplete="caption" autofocus>
   
              @error('caption')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>


        <div class="row mb-3">
          <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Post Image') }}</label>
  
          <div class="col-md-6">
              <input name="image" id="image" type="file" >
   
              @error('image')
                      <strong>{{ $message }}</strong>
              @enderror
          </div>
        </div>

        <div class="row mb-5">
          <div class="col-6 offset-4">
            <button class="btn btn-primary" type="sumbit">Send Post</button>
          </div>
        </div>
 
      </form>

    </div>
   </div>
</div>
    
@endsection