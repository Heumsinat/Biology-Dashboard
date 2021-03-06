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
                    <div class="panel-heading">Level</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/level/create') }}" class="btn btn-success btn-sm" title="Add New Level">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/level', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                            <table class="table table-borderless level">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Level Number</th>
                                        <th>Level Name</th>
                                        <th>Level Short Name</th>
                                        <th>Need Point</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($level as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->level_number }}</td>
                                        <td>{{ $item->level_name }}</td>
                                        <td>{{ $item->level_short_name }}</td>
                                        <td>{{ $item->level_need_point }}</td>
                                        <td><img src="{{url('/level_img')}}/{{ $item->level_image }}" alt="{{ $item->level_image }}" class="level_img"></td>
                                        <td>
                                            <a href="{{ url('/admin/level/' . $item->id) }}" title="View Level"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/level/' . $item->id . '/edit') }}" title="Edit Level"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/level', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Level',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $level->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
