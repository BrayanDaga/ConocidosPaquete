@extends('layouts.app')

@section('content')

<div class="container">
    <h2>FOLLOWS</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Friends  ({{ $friends->count() }})</h5>
                        <p class="card-text">
                            <ul>
                                @foreach ($friends as $item)
                                    @if ($cUser->name != $item->recipient->name )
                                        <li>{{ $item->recipient->name }}</li>
                                    @endif
                                    @if ($cUser->name != $item->sender->name )
                                        <li>{{ $item->sender->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Send Pending ({{ $pendings->count() }} )</h5>
                        <p class="card-text">
                            <ul>
                                @foreach ($pendings as $item)
                                <li>{{ $item->recipient->name }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">REquests ( {{ $requests->count() }})</h5>
                        <p class="card-text">
                            <ul>
                                @foreach ($requests as $item)
                                <li>
                                     {{ $item->sender->name }}
                                    <a href="{{ route('user.denyfriend', $item->sender->id) }}" class="link ml-1">Denegar</a>
                                    <a href="{{ route('user.acceptfriend', $item->sender->id) }}" class="link ml-1">Aceptar</a>
                                </li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
