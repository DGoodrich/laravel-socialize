<?php $__env->startSection('content'); ?>

    <link href="<?php echo e(URL::asset('css/style1.css')); ?>" rel="stylesheet" type="text/css" media="all" />

    <h1>Fine, fine, I’ll indulge in this ‘socializing’ thing you always rave about.</h1>

    <div class="container spark-screen">
        <div class="row">

            <?php /*Signup Form */ ?>
            <div class="sign-up-agileinfo">
                <div class="alert-close"> </div>
                <h3>Sign Up</h3>
                <?php echo e(Form::open(['url' => '/register', 'role' => 'form'])); ?>


                    <?php echo e(Form::text('name', null, ['placeholder' => 'Name', 'required' => ''])); ?>


                    <?php echo e(Form::text('username', null, ['placeholder' => 'Username', 'required' => ''])); ?>


                    <?php echo e(Form::email('email', null, ['placeholder' => 'Email', 'required' => ''])); ?>


                    <?php echo e(Form::password('password', ['placeholder' => 'Password', 'required' => ''])); ?>


                    <?php echo e(Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'required' => ''])); ?>


                    <?php echo e(Form::input('text', 'dob', null, ['class' => 'hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'dob', 'readonly'])); ?>


                    <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                        <div class="col-md-12">
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

                    <?php echo e(Form::submit('Sign Up')); ?>


                <?php echo e(Form::close()); ?>

            </div>

            <?php /*Signin Form */ ?>
            <div class="sign-in-w3ls">
                <div class="alert-close1"> </div>
                <h3>Sign In</h3>

                <?php echo e(Form::open(['url' => '/login', 'name' => 'user_form', 'role' => 'form'])); ?>


                    <?php echo e(Form::text('email', old('email'), ['placeholder' => 'Email', 'required' => ''])); ?>


                    <?php echo e(Form::password('password', ['placeholder' => 'Password', 'required' => ''])); ?>


                    <?php echo $errors->first('email', '<div class="has-error"><span class="help-block">:message</span></div>'); ?>


                    <ul class="check">
                        <li>
                            <?php echo e(Form::checkbox('remember', null, false, ['id' => 'brand1'])); ?>

                            <label for="brand1"><span></span>Remember me</label>
                        </li>
                    </ul>

                    <?php echo e(link_to('/password/reset', 'Forgot Your Password?')); ?>


                    <div class="clear"></div>

                    <?php echo e(Form::submit('Sign In')); ?>


                <?php echo e(Form::close()); ?>

            </div>

            <div class="clear"></div>

            <div class="footer-agilew3">
                <p> &copy; 2016 All Rights Reserved</p>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>