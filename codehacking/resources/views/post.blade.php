@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->category->name}}</h1>
    <h2>{{$post->title}}</h2>



    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Created: <span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img height="100" src="{{$post->photo ? $post->photo->file : '/images/seahorse.png'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>
    <hr>

    @if(Session::has('comment_message'))
       <p class="alert alert-danger">{{session('comment_message')}}</p>
    @endif
    <!-- Blog Comments -->

    @if(Auth::check())



        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                {!! Form::hidden('post_id', $post->id) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Body: ') !!}<br>
                    {!! Form::textarea('body', null, ['class'=>'form->control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit Comment', ['class'=>"btn btn-primary"]) !!}
                </div>

             {!! Form::close() !!}

        </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    @if(count($comments) > 0)

        @foreach($comments as $comment)

            <!-- Comment -->
            <div class="media">
                <span class="pull-left">
                    <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                </span>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>
                   </div>
            </div>



        @endforeach



    @endif



    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>

@stop