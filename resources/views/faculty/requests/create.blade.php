@extends('layouts.app')

@section('htmlheader_title')
    Requests
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Requests
            <small>Schedule a common exam</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('faculty.requests.index') }}">Requests</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <faculty-requests-create :courses="{{ json_encode($courses) }}" :current_user="{{ Auth::user() }}"></faculty-requests-create>
            </div>
        </div>
    </section>
@endsection