@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-8">
        <img class="w-100" src="/storage/{{$post->image}}" alt="{{ $post->caption}}">
      </div>
      <div class="col-2">
         <a href="/profile/{{$post->user->id}}">
            <div class="d-flex align-items-center">
               <img class="w-50 rounded-circle me-3" src="/storage/{{ $post->user->profile->image }}" alt="{{ $post->user->username }}">
               <h6> {{ $post->user->username }}</h6>
            </div>
         </a>
         
          <p class="mt-5">{{ $post->caption}}</p>
      </div>
   </div>
</div>
    
@endsection 