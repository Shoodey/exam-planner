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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <admin-users-list :users="users"></admin-users-list>
                </div>
            </div>

            <div class="col-xs-12">
                <a class="btn btn-primary btn-flat">Add a new user</a>
            </div>
        </div>
    </section>
@endsection