

<?php $__env->startSection('content'); ?>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <?php echo $__env->make('partials.breadcrumbs', ['title' => 'Create New User',
                    'icon' => 'user', 'breadcrumb' => link_to('user', 'Users', ['style' => 'color:#4f9fcf']) . ' / ' . 'Create User'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="panel panel-default">
                    <div class="panel-heading">Add A New User</div>
                    <div class="panel-body">
                        <?php echo e(Form::open(['route' => 'user.store', 'name' => 'user_form', 'id' => 'user_form'])); ?>


                            <?php echo $__env->make('users.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <footer class="text-right">
                                <?php echo e(Form::button(
                                    '<span class="glyphicon glyphicon-user"></span> Create User',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default']
                                 )); ?>

                            </footer>

                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>