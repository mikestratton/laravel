@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}<br>
            {!! Form::text('name', null, ['class'=>'form->control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}<br>
            {!! Form::email('email', null, ['class'=>'form->control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}<br>
            {!! Form::select('role_id', [''=>"Choose Options"] + $roles, null, ['class'=>'form->control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}<br>
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form->control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}<br>
            {!! Form::password('password',  ['class'=>'form->control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create User', ['class'=>"btn btn-primary"]) !!}
        </div>

     {!! Form::close() !!}

@stop