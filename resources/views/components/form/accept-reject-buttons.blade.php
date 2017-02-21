<div class="btn-group">
    {{ Form::open(['route' => [$route, $user, $id], 'method' => 'PATCH']) }}

    {{Form::button(
        '<i class="fa fa-fw s fa-check"></i>Accept',
        [
            'type' => 'submit',
            'class' => 'btn btn-default'
        ]
    )}}

    {{ Form::button(
        '<i class="fa fa-fw s fa-remove"></i>Reject',
        [
            'class' => 'btn btn-default remove',
            'data-toggle' => 'modal',
            'data-target' => '#removeModal',
            'data-url' => route('user.{user}.requests.destroy', ['user' => $user, 'id' => $id])
        ]
     )}}

    {{ Form::close() }}

</div>