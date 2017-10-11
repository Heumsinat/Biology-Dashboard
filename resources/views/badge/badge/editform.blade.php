<div class="form-group {{ $errors->has('badge_number') ? 'has-error' : ''}}">
    {!! Form::label('badge_number', 'Badge Number', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('badge_number', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('badge_level') ? 'has-error' : ''}}">
    {!! Form::label('badge_level', 'Badge Level', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('badge_level', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_level', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('badge_short_name') ? 'has-error' : ''}}">
    {!! Form::label('badge_short_name', 'Badge Short Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('badge_short_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_short_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('badge_long_name') ? 'has-error' : ''}}">
    {!! Form::label('badge_long_name', 'Badge Long Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('badge_long_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_long_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('badge_level_name') ? 'has-error' : ''}}">
    {!! Form::label('badge_level_name', 'Badge Level Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('badge_level_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_level_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('badge_level_type') ? 'has-error' : ''}}">
    {!! Form::label('badge_level_type', 'Badge Level Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('badge_level_type', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_level_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start_need_point') ? 'has-error' : ''}}">
    {!! Form::label('start_need_point', 'Start Need Point', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('start_need_point', null, ['class' => 'form-control']) !!}
        {!! $errors->first('start_need_point', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('max_need_point') ? 'has-error' : ''}}">
    {!! Form::label('max_need_point', 'Max Need Point', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('max_need_point', null, ['class' => 'form-control']) !!}
        {!! $errors->first('max_need_point', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('incorrect_answer_to_lose') ? 'has-error' : ''}}">
    {!! Form::label('incorrect_answer_to_lose', 'Incorrect Answer To Lose', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('incorrect_answer_to_lose', null, ['class' => 'form-control']) !!}
        {!! $errors->first('incorrect_answer_to_lose', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('badge_image') ? 'has-error' : ''}}">
    {!! Form::label('badge_image', 'Badge Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('badge_image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('badge_image', '<p class="help-block">:message</p>') !!}
        <input name="old_image" type="hidden" value="{{$badge->badge_image}}">
        @if($badge->badge_image != "")
            <img src="{{url('/badge_img')}}/{{$badge->badge_image}}" class="edit_badge_img">
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('max_version') ? 'has-error' : ''}}">
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
