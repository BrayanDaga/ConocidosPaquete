@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Posts</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">

                        @foreach ($users as $user)

                        <div class="card m-3">
                            <div class="card-body">
                                {{ $user->name }}
                            @if (auth()->user() == $user)
                                @elseif (!$cUser->isFollowing($user) )
                                <a href="{{ route('user.follow', $user ) }}" class="btn btn-secondary btn-sm float-right"> Seguir </a>
                                @else
                                <a href="{{ route('user.unfollow', $user ) }}" class="btn btn-primary btn-sm float-right"> Siguiendo </a>
                            @endif
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
