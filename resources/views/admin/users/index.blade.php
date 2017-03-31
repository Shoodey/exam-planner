@extends('layouts.app')

@section('htmlheader_title')
    Users
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Users
            <small>Manage users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Users</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid spark-screen">

        </div>
    </section>
@endsection