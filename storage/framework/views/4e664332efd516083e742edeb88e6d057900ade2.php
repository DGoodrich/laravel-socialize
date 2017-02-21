<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
        <?php echo Form::label('name', 'Name:'); ?>

        <?php echo Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']); ?>

        <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
        <?php echo Form::label('username', 'Username:'); ?>

        <?php echo Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']); ?>

        <?php echo $errors->first('username', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>" id="email">
        <?php echo Form::label('email', 'Email:'); ?>

        <?php echo Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']); ?>

        <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('dob') ? 'has-error' : ''); ?>">
        <?php echo Form::label('dob', 'Date of Birth:'); ?>

        <div class="input-group">
            <?php echo Form::input('text', 'dob', null, ['class' => 'form-control hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'date']); ?>

            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <?php echo $errors->first('dob', '<span class="help-block">:message</span>'); ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('gender', 'Gender:'); ?>

        <div class="input-group <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>" id="gender">
            <span class="input-group-addon">
            <?php echo Form::radio('gender', 'male'); ?>

            </span>
            <?php echo Form::input('text', 'gender_male', 'Male', ['class' => 'form-control', 'readonly', 'style' => 'height:47px']); ?>


            <span class="input-group-addon">
            <?php echo Form::radio('gender', 'female'); ?>

            </span>
            <?php echo Form::input('text', 'gender_female', 'Female', ['class' => 'form-control', 'readonly', 'style' => 'height:47px']); ?>

        </div>
    </div>



    <div class="form-group pull-right">
        <?php echo e(Form::button(
            '<span class="glyphicon glyphicon-user"></span> Update User',
            [
                'type' => 'submit',
                'class' => 'btn btn-default']
         )); ?>


        <?php echo e(Form::button(
            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Account',
            [
                'class' => 'btn btn-danger',
                'data-toggle' => 'modal',
                'data-target' => '#myModal'
            ]
         )); ?>

    </div>

</div>

