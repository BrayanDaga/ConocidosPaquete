<div class="card m-3">
    <div class="card-header">
        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-10">
                {{ $post->body }}

            </div>
            <div class="col-2">
            <a href="{{ route('posts.upvote', $post ) }}">
                <svg aria-hidden="true" class="m0 svg-icon iconArrowUpLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 26h32L18 10 2 26z"></path></svg>
            </a>
                <p class="text"> {{ $post->upvotersCount }}</p>

            <a href="{{ route('posts.downvote', $post ) }}">
            <svg aria-hidden="true" class="m0 svg-icon iconArrowDownLg" width="36" height="36" viewBox="0 0 36 36"><path d="M2 10h32L18 26 2 10z"></path></svg>
            </a>

            </div>
        </div>


    </div>

    <div class="card-footer">

        @if (!$post->isLikedBy($user) )
            <a href="{{ route('posts.like', $post ) }}" class="btn btn-secondary btn-sm">({{ $post->likersCountReadable }}) Me gusta</a>
            @else
            <a href="{{ route('posts.unlike', $post) }}" class="btn btn-primary btn-sm">({{ $post->likersCountReadable }}) Te gusta</a>
        @endif

   </div>

</div>
