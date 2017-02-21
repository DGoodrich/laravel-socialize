<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    {!! $errors->first($name, '<span class="help-block">:message</span>') !!}
</div>