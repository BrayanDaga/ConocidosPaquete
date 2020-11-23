@extends('layouts.app')

@section('content')
<div class="container">

<div class="card m-3">
    <div class="card-header">{{ $post->title }}</div>

    <div class="card-body">
        {{ $post->body }}
    </div>

    <div class="card-footer">

        @if (!$post->isLikedBy($user) )
            <a href="{{ route('posts.like', $post ) }}" class="btn btn-secondary btn-sm">({{ $post->likersCountReadable }}) Me gusta</a>
            @else
            <a href="{{ route('posts.unlike', $post) }}" class="btn btn-primary btn-sm">({{ $post->likersCountReadable }}) Te gusta</a>
        @endif

        <p class="card-text mt-5">Comments</p>
        @foreach ($post->comments as $comment)
        @include('posts.comments')

        @endforeach

    </div>

</div>
</div>
@endsection
