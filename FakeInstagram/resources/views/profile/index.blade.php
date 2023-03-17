@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row" >
        <div class="col-3 p-5">
            <img class="rounded-circle w-100" src="{{ $user->profile->getProfileImg() }}" alt="{{$user->username}}">
        </div> 
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">   
                <div class="d-flex align-items-center mb-3">
                    <h2 >{{ $user->username }}</h2>
                    @if (!$isSameProfile)
                    <button class="btn btn-primary ms-5" 
                            id="followBtn" 
                            data-userId="{{ $user->id }}" 
                            data-isFollowing="{{ $follows == 'true' ? 'true' : 'false' }}" >

                    {{ $follows ? 'UnFollow' : 'Follow'   }}
                    </button>    
                    @endif
                    
                </div>
                @can('update', $user->profile )
                    <a href="{{ route('post.create'); }}">Add new Post</a>
                @endcan
            </div>

            <div>
                @can('update', $user->profile )
                 <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex pt-3">

                <div class="pe-5"><strong>{{ $user->posts->count(); }}</strong> Posts</div>
                <div class="pe-5"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                <div class="pe-5"><strong>{{ $user->following->count()}}</strong> Following</div>
            </div>
            <div class="div pt-3 pe-5">
                <h5>{{ $user->profile->title }}</h5>
                <p>
                    {{ $user->profile->description }}
                    <br><a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a>
                </p>

            </div>
        </div>
    </div>


    <div class="row mt-5">
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

