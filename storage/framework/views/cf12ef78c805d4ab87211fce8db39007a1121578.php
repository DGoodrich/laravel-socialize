<div class="form-group <?php echo e($errors->has($name) ? 'has-error' : ''); ?>">
    <?php echo e(Form::label($name, ucfirst($name).':', ['class' => 'control-label'])); ?>

    <div class="controls">
        <?php echo e(Form::select($name, $model->lists($field, $value), NULL, array_merge(['class' => 'form-control'], $attributes))); ?>

    </div>
    <?php echo $errors->first($name, '<span class="help-block">:message</span>'); ?>

</div>