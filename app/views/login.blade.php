@extends('layouts.main')

@section('navigation')
    @parent

@stop

@section('content')
    <div class="wrap">
        <div class="panel-body">
        	<h2 class="form-signin-heading text-center">Gamer Login</h2>
            {{ Form::open(array('url' => 'login')) }}
            @if($errors->has('login'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ $errors->first('login', ':message') }}
                </div>
            @endif
            <div class="form-group">
                {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}
            </div>
            <div class="form-group">
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Login', array('class' => 'btn btn-success')) }}
            </div>

        	<p class="text-center"><a href="/register" class="text-center">Sign Up</a> </p>  
            {{ Form::close() }}
        </div>
    </div>
@stop