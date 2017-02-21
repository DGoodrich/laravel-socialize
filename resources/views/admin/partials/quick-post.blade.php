<div class="panel panel-default" id="quick-post">
    <div class="panel-heading">
        <div class="panel-title">
            <i class="glyphicon glyphicon-wrench pull-right"></i>
            <h4>Quick Post</h4>
        </div>
    </div>

    <div class="panel-body">

        {{ Form::open(['route' => ['user.{user}.post.store', $user->username, $user], 'name' => 'user_form', 'id' => 'user_form']) }}

            {{ Form::bsSelect('user', $user, 'name', 'id', ['placeholder' => 'Select a user...']) }}

            {{ Form::bsTextArea('post', null, ['maxlength' => '255', 'rows' => '2', 'placeholder' => 'Leave a comment...']) }}

            {{ Form::bsButtonRight('<span class="glyphicon glyphicon-send"></span> Post', ['type' => 'submit', 'class' => 'btn btn-default']) }}

        {{ Form::close() }}

    </div>
</div>