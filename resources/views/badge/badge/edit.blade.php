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
                    <div class="panel-heading">Edit Badge #{{ $badge->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/badge') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($badge, [
                            'method' => 'PATCH',
                            'url' => ['/admin/badge', $badge->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('badge.badge.editform', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
