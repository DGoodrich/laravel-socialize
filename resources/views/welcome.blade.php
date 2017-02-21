@extends('layouts.app')

@section('content')

    <link href="{{ URL::asset('css/style1.css') }}" rel="stylesheet" type="text/css" media="all" />

    <h1>Fine, fine, I’ll indulge in this ‘socializing’ thing you always rave about.</h1>

    <div class="container spark-screen">
        <div class="row">

            {{--Signup Form --}}
            <div class="sign-up-agileinfo">
                <div class="alert-close"> </div>
                <h3>Sign Up</h3>
                {{ Form::open(['url' => '/register', 'role' => 'form']) }}

                    {{ Form::text('name', null, ['placeholder' => 'Name', 'required' => '']) }}

                    {{ Form::text('username', null, ['placeholder' => 'Username', 'required' => '']) }}

                    {{ Form::email('email', null, ['placeholder' => 'Email', 'required' => '']) }}

                    {{ Form::password('password', ['placeholder' => 'Password', 'required' => '']) }}

                    {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'required' => '']) }}

                    {{ Form::input('text', 'dob', null, ['class' => 'hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'dob', 'readonly']) }}

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    {{ Form::radio('gender', 'male') }}
                                </span>
                                {{ Form::label('gender', 'Male', ['class' => 'form-control', 'style' => 'padding-bottom: 33px']) }}

                                <span class="input-group-addon">
                                    {{ Form::radio('gender', 'female') }}
                                </span>
                                {{ Form::label('gender', 'Female', ['class' => 'form-control', 'style' => 'padding-bottom: 33px']) }}
                            </div>
                        </div>
                    </div>

                    {{ Form::submit('Sign Up') }}

                {{ Form::close() }}
            </div>

            {{--Signin Form --}}
            <div class="sign-in-w3ls">
                <div class="alert-close1"> </div>
                <h3>Sign In</h3>

                {{ Form::open(['url' => '/login', 'name' => 'user_form', 'role' => 'form']) }}

                    {{ Form::text('email', old('email'), ['placeholder' => 'Email', 'required' => '']) }}

                    {{ Form::password('password', ['placeholder' => 'Password', 'required' => '']) }}

                    {!! $errors->first('email', '<div class="has-error"><span class="help-block">:message</span></div>') !!}

                    <ul class="check">
                        <li>
                            {{ Form::checkbox('remember', null, false, ['id' => 'brand1']) }}
                            <label for="brand1"><span></span>Remember me</label>
                        </li>
                    </ul>

                    {{ link_to('/password/reset', 'Forgot Your Password?') }}

                    <div class="clear"></div>

                    {{ Form::submit('Sign In') }}

                {{ Form::close() }}
            </div>

            <div class="clear"></div>

            <div class="footer-agilew3">
                <p> &copy; 2016 All Rights Reserved</p>
            </div>

        </div>
    </div>

@endsection
