@extends('layouts.app')

@section('content')

    <ul>
        @foreach($posts as $post)


            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
            <div class="image-container">
                <img height="50" src="{{$post->path}}" alt="">

            </div>

        @endforeach
    </ul>

@endsection