@extends('layouts.app')

@section('content')

    <h1>Sample Blade Template Engine Page</h1>

    @if (count($people))

        <ul>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>

    @endif

@stop

@section('footer')

    {{--<script>alert('hello visitor')</script>--}}

@stop