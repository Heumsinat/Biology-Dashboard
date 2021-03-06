@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.admin') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Question</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/question/create') }}" class="btn btn-success btn-sm" title="Add New Question">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/question', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Question Number</th>
                                        <th>Question Topic</th>
                                        <th>Question Difficulty</th>
                                        <th>Number Answer</th>
                                        <th>Correct</th>
                                        <th>Answer</th>
                                        <th>Sound Path</th>
                                        <th>Correct Path</th>
                                        <th>Incorrect Path</th>
                                        <th>Message Path</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($question as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->question_number }}</td>
                                        <td>{{ $item->question_topic }}</td>
                                        <td>{{ $item->question_difficulty }}</td>
                                        <td>{{ $item->number_of_answer }}</td>
                                        <td>{{ $item->correct_answer_number }}</td>
                                        <td>{{ $item->answer }}</td>
                                        <td>{{ $item->question_sound_path }}</td>
                                        <td>{{ $item->question_correct_answer_sound_path }}</td>
                                        <td>{{ $item->question_incorrect_answer_sound_path }}</td>
                                        <td>{{ $item->question_message_sound_path }}</td>
                                        <td>
                                            <a href="{{ url('/admin/question/' . $item->id) }}" title="View Question"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/question/' . $item->id . '/edit') }}" title="Edit Question"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/question', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Question',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $question->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
