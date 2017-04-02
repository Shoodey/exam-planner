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
                    <admin-sections-list :sections="sections" :instructors="instructors" :courses="courses" :current_user="{{ Auth::user()->load('role') }}"></admin-sections-list>
                </div>
            </div>

            <div class="col-xs-12">
                <a class="btn btn-primary btn-flat" data-toggle="modal"
                   data-target="#createSectionModal">Add a new section</a>
            </div>
        </div>
    </section>
@endsection