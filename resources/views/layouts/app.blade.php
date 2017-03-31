<!DOCTYPE html>

<html lang="en">

    @section('htmlheader')
        @include('layouts.partials.htmlheader')
    @show

    <body class="skin-green sidebar-mini fixed">
        <div id="app">
            <div class="wrapper">

                @include('layouts.partials.mainheader')

                @include('layouts.partials.sidebar')

                <div class="content-wrapper">
                        @yield('main-content')
                </div>

                @include('layouts.partials.controlsidebar')

                @include('layouts.partials.footer')

            </div>
        </div>
        @section('scripts')
            @include('layouts.partials.scripts')
        @show

    </body>
</html>
