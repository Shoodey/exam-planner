<!DOCTYPE html>

<html lang="en">

    @section('htmlheader')
        @include('adminlte::layouts.partials.htmlheader')
    @show

    <body class="skin-green sidebar-mini fixed">
        <div id="app">
            <div class="wrapper">

                @include('adminlte::layouts.partials.mainheader')

                @include('adminlte::layouts.partials.sidebar')

                <div class="content-wrapper">
                        @yield('main-content')
                </div>

                @include('adminlte::layouts.partials.controlsidebar')

                @include('adminlte::layouts.partials.footer')

            </div>
        </div>
        @section('scripts')
            @include('adminlte::layouts.partials.scripts')
        @show

    </body>
</html>
