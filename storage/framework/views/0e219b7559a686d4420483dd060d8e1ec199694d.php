<div class="form-group <?php echo e($errors->has($name) ? 'has-error' : ''); ?>">
    <?php echo e(Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes))); ?>

    <?php echo $errors->first($name, '<span class="help-block">:message</span>'); ?>

</div>