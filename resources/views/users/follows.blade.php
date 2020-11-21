@extends('layouts.app')

@section('content')

<div class="container">
    <h2>FOLLOWS</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Followigns  ({{ $followings->count() }})</h5>
                        <p class="card-text">
                            <ul>
                                @foreach ($followings as $item)
                                    <li>{{ $item->name }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Followers ({{ $cUser->followersCount() }} )</h5>
                        <p class="card-text">
                            <ul>
                                @foreach ($followers as $item)
                                <li>{{ $item->name }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
