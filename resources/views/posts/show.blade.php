<div class="card m-3">
    <div class="card-header">{{ $post->title }}</div>

    <div class="card-body">
        {{ $post->body }}
    </div>

    <div class="card-footer">
        @if (! $post->liked)
            <a href="{{ route('posts.like', $post, auth()->user() ) }}" class="btn btn-primary btn-sm">({{ $post->likersCount }}) Me gusta</a>
            @else
        @endif

        {{-- @if (! $post->disliked)
            <a href="{{ route('posts.dislike', $post) }}" class="btn btn-secondary btn-sm">({{ $post->dislikesCount }}) No me gusta</a>
        @else --}}
            <a href="{{ route('posts.unlike', $post) }}" class="btn btn-secondary btn-sm"> No me gusta</a>
        {{-- @endif --}}


    </div>
</div>
