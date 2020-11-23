@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Users</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">

                        @foreach ($users as $user)

                        <div class="card m-3">
                            <div class="card-body">
                                {{ $user->name }}
                            @if ( auth()->user() != $user)
                                @include('users.buttonFollow')
                                @include('users.buttonFriend')
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
