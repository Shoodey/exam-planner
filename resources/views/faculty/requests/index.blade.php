@extends('layouts.app')

@section('htmlheader_title')
    Requests
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            My Requests
            <small>Manage requests</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Requests</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                    </div>
                    <faculty-requests-list :courses="{{ json_encode($courses) }}" :current_user="{{ Auth::user() }}"></faculty-requests-list>
                </div>
            </div>
            <div class="col-xs-12">
                <a class="btn btn-primary btn-flat" href="{{ route('faculty.requests.create') }}">Make a request</a>
            </div>
        </div>
    </section>
@endsection