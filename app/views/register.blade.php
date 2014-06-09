@extends('layouts.main')

@section('navigation')
    @parent

@stop

@section('content')
    <div class="wrap">
        <div class="panel-body">
        	<div class="panel-body">
	            {{ Form::open(array('url' => 'register')) }}
	            <h2 class="sansserif">Create an account</h2>
	            @if($errors->any())
	                <div class="alert alert-danger">
	                    <a href="#" class="close" data-dismiss="alert">&times;</a>
	                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
	                </div>
	            @endif
	            <table>
				    <tbody>
				    	<tr>
						    <td>First Name:</td>
						    <td>{{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}</td>
					    </tr>

					    <tr>
						    <td>Last Name:</td>
						    <td>{{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}</td>
					    </tr>
					    <tr>
					    	<td>Email:</td>
					    	<td>{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}</td>
					    </tr>
					    <tr>
						    <td>Username:</td>
						    <td>{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}</td>
					    </tr>

					    <tr>
						    <td>Password:</td>
						    <td>{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}</td>
					    </tr>
					</tbody>
				</table>
	            <div class="form-group">
	                {{ Form::submit('Sign Up', array('class' => 'btn btn-success')) }}
	            </div>
	            {{ Form::close() }}
        	</div>
    	</div>
    </div>
@stop