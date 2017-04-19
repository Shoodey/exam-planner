@extends('layouts.app')

@section('htmlheader_title')
    Settings
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Settings</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <registrar-settings></registrar-settings>
            </div>
        </div>
    </section>
@endsection