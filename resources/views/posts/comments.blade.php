<div class="card">
    <div class="card-body">
        <p class="card-text d-inline">{{ $comment->content }}
            @if (!$comment->isLikedBy($user) )
            <a href="{{ route('comments.like', $comment ) }}" class="btn btn-secondary btn-sm float-right">({{ $comment->likersCountReadable }}) Me gusta</a>
            @else
            <a href="{{ route('comments.unlike', $comment) }}" class="btn btn-primary btn-sm float-right">({{ $comment->likersCountReadable }}) Te gusta</a>
        @endif
        </p>
        <p class="card-text d-inline">
            <ul>
                <li>sad</li>
                <li>sad</li>
            </ul>
        </p>
    </div>
</div>
