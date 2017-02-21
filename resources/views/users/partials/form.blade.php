<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
        {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
        {{ Form::label('dob', 'Date of Birth:') }}
        <div class="input-group">
            {{ Form::input('text', 'dob', null, ['class' => 'form-control hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'date']) }}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        {{ Form::label('gender', 'Gender:') }}
        <div class="input-group {{ $errors->has('gender') ? 'has-error' : '' }}" id="gender">
            <span class="input-group-addon">
            {{ Form::radio('gender', 'male') }}
            </span>
            {{ Form::input('text', 'gender_male', 'Male', ['class' => 'form-control', 'readonly', 'style' => 'height:47px']) }}

            <span class="input-group-addon">
            {{ Form::radio('gender', 'female') }}
            </span>
            {{ Form::input('text', 'gender_female', 'Female', ['class' => 'form-control', 'readonly', 'style' => 'height:47px']) }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
        {{ Form::label('bio', 'Bio:') }}
        {{ Form::textarea('bio', null, ['class' => 'form-control']) }}
        {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control']) }}
        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        {{ Form::label('password_confirmation', 'Confirm Password:') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
    </div>

    @hasrole('Superuser')
        {{ Form::bsSelect('role', Role::all(), 'name', 'name',[]) }}
    @endhasrole


</div>

