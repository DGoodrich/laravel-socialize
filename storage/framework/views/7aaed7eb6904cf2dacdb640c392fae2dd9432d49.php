<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <?php echo e(Form::open(['url' => '/register', 'role' => 'form', 'class' => 'form-horizontal' ])); ?>

                            <?php echo csrf_field(); ?>


                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('name', 'Name:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <?php echo e(Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control'])); ?>

                                    <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('username', 'Username:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <?php echo e(Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control'])); ?>

                                    <?php echo $errors->first('username', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('email', 'E-Mail Address:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <?php echo e(Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control'])); ?>

                                    <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('password', 'Password:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <?php echo e(Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control'])); ?>

                                    <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('password_confirmation', 'Confirm Password:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <?php echo e(Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control'])); ?>

                                    <?php echo $errors->first('password_confirmation', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('dob', 'Date Of Birth:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <div class="input-group">
                                        <?php echo e(Form::input('text', 'dob', null, ['class' => 'form-control hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'dob', 'readonly'])); ?>

                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                    <?php echo $errors->first('dob', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('gender', 'Gender:', ['class' => 'col-md-4 control-label'])); ?>


                                <div class="col-md-6">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php echo e(Form::radio('gender', 'male')); ?>

                                            </span>
                                        <?php echo e(Form::label('gender', 'Male', ['class' => 'form-control', 'style' => 'padding-bottom: 33px'])); ?>


                                        <span class="input-group-addon">
                                                <?php echo e(Form::radio('gender', 'female')); ?>

                                            </span>
                                        <?php echo e(Form::label('gender', 'Female', ['class' => 'form-control', 'style' => 'padding-bottom: 33px'])); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <?php echo e(Form::button(
                                        '<i class="fa fa-btn fa-user"></i> Register',
                                        [
                                            'type' => 'submit',
                                            'class' => 'btn-submit btn btn-primary',
                                            'href' => '#address',
                                            'name' => 'home_form']
                                     )); ?>


                                    <?php echo e(Form::button(
                                        '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back',
                                        [
                                            'class' => 'btn btn-warning',
                                            'onclick' => "window.history.back()"]
                                     )); ?>

                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $( function() {
            $( ".hasDatePicker" ).datepicker();
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>