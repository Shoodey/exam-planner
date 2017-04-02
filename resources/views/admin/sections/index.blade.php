@extends('layouts.app')

@section('htmlheader_title')
    Courses
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Sections
            <small>Manage sections</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Sections</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    {{--<admin-courses-list :courses="courses" :current_user="{{ Auth::user()->load('role') }}"></admin-courses-list>--}}
                    <div class="box-body">
                        <h1><i class="fa fa-spinner fa-spin fa-fw"></i> Working on it...</h1>
                        <br>
                        <br>
                    </div>
                </div>
            </div>

            {{--<div class="col-xs-12">--}}
                {{--<a class="btn btn-primary btn-flat" data-toggle="modal"--}}
                   {{--data-target="#createCourseModal">Add a new course</a>--}}
            {{--</div>--}}
        </div>
    </section>
@endsection