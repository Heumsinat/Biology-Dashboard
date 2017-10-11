<div class="form-group {{ $errors->has('question_number') ? 'has-error' : ''}}">
    {!! Form::label('question_number', 'Question Number', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('question_number', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_topic') ? 'has-error' : ''}}">
    {!! Form::label('question_topic', 'Question Topic', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('question_topic', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_topic', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_difficulty') ? 'has-error' : ''}}">
    {!! Form::label('question_difficulty', 'Question Difficulty', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('question_difficulty', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_difficulty', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('number_of_answer') ? 'has-error' : ''}}">
    {!! Form::label('number_of_answer', 'Number Of Answer', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('number_of_answer', null, ['class' => 'form-control']) !!}
        {!! $errors->first('number_of_answer', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('correct_answer_number') ? 'has-error' : ''}}">
    {!! Form::label('correct_answer_number', 'Correct Answer Number', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('correct_answer_number', null, ['class' => 'form-control']) !!}
        {!! $errors->first('correct_answer_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    {!! Form::label('answer', 'Answer', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('answer', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_sound_path') ? 'has-error' : ''}}">
    {!! Form::label('question_sound_path', 'Question Sound Path', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('question_sound_path', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_sound_path', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_correct_answer_sound_path') ? 'has-error' : ''}}">
    {!! Form::label('question_correct_answer_sound_path', 'Question Correct Answer Sound Path', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('question_correct_answer_sound_path', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_correct_answer_sound_path', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_incorrect_answer_sound_path') ? 'has-error' : ''}}">
    {!! Form::label('question_incorrect_answer_sound_path', 'Question Incorrect Answer Sound Path', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('question_incorrect_answer_sound_path', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_incorrect_answer_sound_path', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_message_sound_path') ? 'has-error' : ''}}">
    {!! Form::label('question_message_sound_path', 'Question Message Sound Path', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('question_message_sound_path', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_message_sound_path', '<p class="help-block">:message</p>') !!}
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
