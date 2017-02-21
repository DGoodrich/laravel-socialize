<!-- Modal -->
<div class="modal fade" id="taskModal" role="dialog">
    <div class="modal-dialog modal-md">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New User Task</h4>
            </div>
            <div class="modal-body">
                <p>Create a new task for user.</p>

                <!-- New Task Form -->
                <form action="<?php echo e(url('tasks')); ?>" method="POST" class="form-horizontal">
                    <?php echo e(Form::hidden('user', encrypt($user->id))); ?>

                    <?php echo e(csrf_field()); ?>


                    <!-- Task Name -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <?php echo e(Form::label('task', 'Task:')); ?>


                            <?php echo e(Form::text('task', old('task'), [
                                'id' => 'task-name',
                                'placeholder' => 'New Task',
                                'class' => 'form-control'])); ?>

                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <?php echo e(Form::button(
                                '<i class="fa fa-btn fa-plus"></i> Add Task',
                                [
                                    'type' => 'submit',
                                    'class' => 'btn btn-default'
                                ]
                            )); ?>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>