 @if (!$cUser->isFollowing($user) )
    <a href="{{ route('user.follow', $user ) }}" class="btn btn-secondary btn-sm float-right mr-1"> Seguir </a>
@else
    <a href="{{ route('user.unfollow', $user ) }}" class="btn btn-primary btn-sm float-right mr-1"> Siguiendo </a>
@endif
