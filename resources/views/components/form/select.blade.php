<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    {{ Form::label($name, ucfirst($name).':', ['class' => 'control-label']) }}
    <div class="controls">
        {{ Form::select($name, $model->lists($field, $value), NULL, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
    {!! $errors->first($name, '<span class="help-block">:message</span>') !!}
</div>