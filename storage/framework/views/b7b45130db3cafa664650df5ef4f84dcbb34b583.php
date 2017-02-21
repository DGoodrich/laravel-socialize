<div class="btn-group">
    <?php echo e(Form::open(['route' => [$route, $user, $id], 'method' => 'PATCH'])); ?>


    <?php echo e(Form::button(
        '<i class="fa fa-fw s fa-check"></i>Accept',
        [
            'type' => 'submit',
            'class' => 'btn btn-default'
        ]
    )); ?>


    <?php echo e(Form::button(
        '<i class="fa fa-fw s fa-remove"></i>Reject',
        [
            'class' => 'btn btn-default remove',
            'data-toggle' => 'modal',
            'data-target' => '#removeModal',
            'data-url' => route('user.{user}.requests.destroy', ['user' => $user, 'id' => $id])
        ]
     )); ?>


    <?php echo e(Form::close()); ?>


</div>