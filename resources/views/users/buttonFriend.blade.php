@if (!$cUser->hasSentFriendRequestTo($user))
<a href="{{ route('user.befriend', $user ) }}" class="btn btn-primary btn-sm float-right mr-1"> Agregar </a>
@else
<a href="{{ route('user.unfriend', $user ) }}" class="btn btn-secondary btn-sm float-right mr-1"> Enviado </a>
@endif
