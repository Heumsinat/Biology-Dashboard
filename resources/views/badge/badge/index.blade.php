@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.admin') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Badge</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/badge/create') }}" class="btn btn-success btn-sm" title="Add New Badge">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/badge', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        {{--<th>ID</th>--}}
                                        <th>Badge Number</th><th>Badge Level</th><th>Short Name</th><th>Long Name</th><th>Level Name</th><th>Level Type</th><th>Need Point</th><th>Max Point</th><th>Incorrect</th><th>Image</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($badge as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->badge_number }}</td><td>{{ $item->badge_level }}</td><td>{{ $item->badge_short_name }}</td><td>{{ $item->badge_long_name }}</td><td>{{ $item->badge_level_name }}</td><td>{{ $item->badge_level_type }}</td><td>{{ $item->start_need_point }}</td><td>{{ $item->max_need_point }}</td><td>{{ $item->incorrect_answer_to_lose }}</td><td>{{ $item->badge_image }}</td>
                                        <td>
                                            <a href="{{ url('/admin/badge/' . $item->id) }}" title="View Badge"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/badge/' . $item->id . '/edit') }}" title="Edit Badge"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/badge', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Badge',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $badge->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
