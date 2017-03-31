@extends('layouts.errors')

@section('htmlheader_title')
    Service unavailable
@endsection

@section('main-content')

    <div class="error-page" style="padding: 30px; height: 200px;">
        <h2 class="headline text-yellow"> 500</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Something went wrong.</h3>
            <p>
                We could not find the page you were looking for. <br>
                Meanwhile, you may return to the <a href='{{ route('dashboard') }}'>dashboard</a>.
            </p>

        </div>
    </div>

@endsection
