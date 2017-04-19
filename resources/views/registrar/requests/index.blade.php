@extends('layouts.app')

@section('htmlheader_title')
    Requests
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            All Requests
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
                    <registrar-requests-list :schools="{{ json_encode($schools) }}"></registrar-requests-list>
                </div>
            </div>
        </div>
    </section>
@endsection