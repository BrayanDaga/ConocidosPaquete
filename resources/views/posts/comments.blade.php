<div class="card">
    <div class="card-body">
        <p class="card-text d-inline">{{ $comment->content }}
            @if (!$comment->isLikedBy($user) )
            <a href="{{ route('comments.like', $comment ) }}" class="btn btn-secondary btn-sm">({{ $comment->likersCountReadable }}) Me gusta</a>
            @else
            <a href="{{ route('comments.unlike', $comment) }}" class="btn btn-primary btn-sm">({{ $comment->likersCountReadable }}) Te gusta</a>
        @endif

        </p>
    </div>
</div>
