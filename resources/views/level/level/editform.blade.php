<div class="form-group {{ $errors->has('level_number') ? 'has-error' : ''}}">
    {!! Form::label('level_number', 'Level Number', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('level_number', null, ['class' => 'form-control']) !!}
        {!! $errors->first('level_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('level_name') ? 'has-error' : ''}}">
    {!! Form::label('level_name', 'Level Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('level_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('level_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('level_short_name') ? 'has-error' : ''}}">
    {!! Form::label('level_short_name', 'Level Short Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('level_short_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('level_short_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('level_need_point') ? 'has-error' : ''}}">
    {!! Form::label('level_need_point', 'Level Need Point', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('level_need_point', null, ['class' => 'form-control']) !!}
        {!! $errors->first('level_need_point', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('level_image') ? 'has-error' : ''}}">
    {!! Form::label('level_image', 'Level Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('level_image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('level_image', '<p class="help-block">:message</p>') !!}
        <input name="old_image" type="hidden" value="{{$level->level_image}}">
        @if($level->level_image != "")
            <img src="{{url('/level_img')}}/{{$level->level_image}}" class="edit_level_img">
        @endif
    </div>
</div><div class="form-group {{ $errors->has('max_version') ? 'has-error' : ''}}">
    {!! Form::label('max_version', 'Max Version', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('max_version', null, ['class' => 'form-control']) !!}
        {!! $errors->first('max_version', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
