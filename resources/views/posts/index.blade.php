@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Posts</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">

                        @foreach ($posts as $post)

                        @include('posts.post')

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
