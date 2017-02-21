<?php $__env->startSection('content'); ?>
    <div class="container spark-screen">
        <div class="row panel">
            <div class="col-md-4 bg_blur "></div>
            <div class="col-md-8  col-xs-12">

                <img src="<?php echo (URL::asset('images/avatar.png')); ?>" class="avatar img-circle img-thumbnail picture hidden-xs"/>

                <div class="header">
                    <h1>Test Test</h1>
                    <h4>Web Developer</h4>

                    <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                          "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
                    </span>

                </div>

            </div>
        </div>

        <div class="row nav">
            <div class="col-md-4"></div>

            <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
                <div class="col-md-4 col-xs-4 well1"><i class="fa fa-weixin fa-lg"></i> 16</div>
                <div class="col-md-4 col-xs-4 well2"><i class="fa fa-heart-o fa-lg"></i> 14</div>
                <div class="col-md-4 col-xs-4 well3"><i class="fa fa-thumbs-o-up fa-lg"></i> 26</div>
            </div>

        </div>

        <hr class="invisible">

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">User Tasks</div>

                <div class="panel-body">
                <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- Current Tasks -->
                    <div class="pull-right">
                        <a data-toggle='modal' data-target = '#taskModal' class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i> New Task
                        </a>
                    </div>
                    <?php if(count($tasks) > 0): ?>

                        <table class="table table-striped task-table">
                            <thead>
                                <th colspan="2">Task</th>
                            </thead>

                            <tbody>
                            <?php foreach($tasks as $task): ?>
                                <tr>
                                    <td class="table-text"><div><?php echo e($task->task); ?></div></td>

                                    <!-- Task Delete Button -->
                                    <td class="pull-right">
                                        <?php echo delete_form(['tasks.destroy', $task->id]); ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="form-group">

            <?php echo e(Form::button(
                '<span class="glyphicon glyphicon-user"></span> Update User',
                [
                    'type' => 'submit',
                    'class' => 'btn btn-default'
                ]
            )); ?>


        </div>
    </div>

    <?php echo $__env->make('modal-box.task-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(".delete").on("submit", function(){
            return confirm("Do you want to delete this item?");
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>