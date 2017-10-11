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
                    <div class="panel-heading">Badge {{ $badge->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/badge') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/badge/' . $badge->id . '/edit') }}" title="Edit Badge"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/badge', $badge->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Badge',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    {{--<tr><th>ID</th><td>{{ $badge->id }}</td></tr>--}}
                                    <tr><th> Badge Number </th><td> {{ $badge->badge_number }} </td></tr>
                                    <tr><th> Badge Level </th><td> {{ $badge->badge_level }} </td></tr>
                                    <tr><th> Badge Short Name </th><td> {{ $badge->badge_short_name }} </td></tr>
                                    <tr><th>Long Name</th><td>  {{ $badge->badge_long_name }}</td></tr>
                                    <tr><th>Level Name</th> <td>   {{ $badge->badge_level_name }}</td></tr>
                                    <tr><th>Level Type</th><td> {{ $badge->badge_level_type }}</td></tr>
                                    <tr><th>Need Point</th><td> {{ $badge->start_need_point }}</td></tr>
                                    <tr><th>Max Point</th><td>  {{ $badge->max_need_point }}</td></tr>
                                    <tr><th>Incorrect</th><td>  {{ $badge->incorrect_answer_to_lose }}</td></tr>
                                    <tr><th>Image</th><td><img src="{{url('/badge_img')}}/{{ $badge->badge_image }}" alt="{{ $badge->badge_image }}" class="badge_img"></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
