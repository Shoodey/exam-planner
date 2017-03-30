@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>A general overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid spark-screen">
            <example></example>
        </div>
    </section>
@endsection
