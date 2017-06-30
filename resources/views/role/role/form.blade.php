<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('role', null, ['class' => 'form-control']) !!}
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('permission') ? 'has-error' : ''}}">
    {!! Form::label('permission', 'Permission', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('permission', ['Admin', ' Moderator', ' User'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('permission', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
