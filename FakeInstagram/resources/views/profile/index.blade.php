@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row" >
        <div class="col-3 p-5">
            <img class="rounded-circle" src="https://media.licdn.com/dms/image/C4E0BAQHyCqekdvCl7g/company-logo_200_200/0/1600951301236?e=1686182400&v=beta&t=ZwESgc1Lm-CoZ3WkqKPp5L8LlJjOp7kVx0ZIpqGqhAc" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">   
                <h1>{{ $user->username }}</h1>
                <a href="{{ route('post.create'); }}">Add new Post</a>
            </div>

            <div>
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>

            </div>
            <div class="d-flex pt-3">

                <div class="pe-5"><strong>{{ $user->posts()->count(); }}</strong> Posts</div>
                <div class="pe-5"><strong>20k</strong> Followers</div>
                <div class="pe-5"><strong>222</strong> Following</div>
            </div>
            <div class="div pt-3 pe-5">
                <h5>{{ $user->profile->title }}</h5>
                <p>
                    {{ $user->profile->description }}
                </p>
                <a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a>

            </div>
        </div>
    </div>


    <div class="row">
        @foreach ($user->posts as $post )
            <div class="col-4 pb-3" >
                <a href="/p/{{ $post->id }}">
                    <img class="w-100 " src="/storage/{{ $post->image }}" alt="{{$post->caption}}">

                </a>
            </div> 
        @endforeach

    </div>
</div>
@endsection
