<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
        <?php echo e(Form::label('name', 'Name:')); ?>

        <?php echo e(Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control'])); ?>

        <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
        <?php echo e(Form::label('username', 'Username:')); ?>

        <?php echo e(Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control'])); ?>

        <?php echo $errors->first('username', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>" id="email">
        <?php echo e(Form::label('email', 'Email:')); ?>

        <?php echo e(Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control'])); ?>

        <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('dob') ? 'has-error' : ''); ?>">
        <?php echo e(Form::label('dob', 'Date of Birth:')); ?>

        <div class="input-group">
            <?php echo e(Form::input('text', 'dob', null, ['class' => 'form-control hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'date'])); ?>

            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <?php echo $errors->first('dob', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group">
        <?php echo e(Form::label('gender', 'Gender:')); ?>

        <div class="input-group <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>" id="gender">
            <span class="input-group-addon">
            <?php echo e(Form::radio('gender', 'male')); ?>

            </span>
            <?php echo e(Form::input('text', 'gender_male', 'Male', ['class' => 'form-control', 'readonly', 'style' => 'height:47px'])); ?>


            <span class="input-group-addon">
            <?php echo e(Form::radio('gender', 'female')); ?>

            </span>
            <?php echo e(Form::input('text', 'gender_female', 'Female', ['class' => 'form-control', 'readonly', 'style' => 'height:47px'])); ?>

        </div>
    </div>

    <div class="form-group <?php echo e($errors->has('bio') ? 'has-error' : ''); ?>">
        <?php echo e(Form::label('bio', 'Bio:')); ?>

        <?php echo e(Form::textarea('bio', null, ['class' => 'form-control'])); ?>

        <?php echo $errors->first('bio', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
        <?php echo e(Form::label('password', 'Password:')); ?>

        <?php echo e(Form::password('password', ['placeholder' => 'password', 'class' => 'form-control'])); ?>

        <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
        <?php echo e(Form::label('password_confirmation', 'Confirm Password:')); ?>

        <?php echo e(Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control'])); ?>

        <?php echo $errors->first('password_confirmation', '<span class="help-block">:message</span>'); ?>

    </div>

    <?php if(auth()->check() && auth()->user()->hasRole(('Superuser'))): ?>
        <?php echo e(Form::bsSelect('role', Role::all(), 'name', 'name',[])); ?>

    <?php endif; ?>


</div>

