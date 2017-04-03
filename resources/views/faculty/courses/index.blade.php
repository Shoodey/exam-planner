@extends('layouts.app')

@section('htmlheader_title')
    Courses
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            My Courses
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Courses</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                    </div>
                    <faculty-courses-list :sections="{{ $sections }}"></faculty-courses-list>
                </div>
            </div>
        </div>
    </section>
@endsection