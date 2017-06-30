@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.admin') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Level {{ $level->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/level') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/level/' . $level->id . '/edit') }}" title="Edit Level"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/level', $level->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Level',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $level->id }}</td>
                                    </tr>
                                    <tr><th> Level Number </th><td> {{ $level->level_number }} </td></tr><tr><th> Level Name </th><td> {{ $level->level_name }} </td></tr><tr><th> Level Short Name </th><td> {{ $level->level_short_name }} </td></tr> <tr><th> Level Need Point </th><td> {{ $level->level_need_point }} </td></tr> <tr><th> Level Image </th><td> {{ $level->level_image }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
