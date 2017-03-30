<aside class="main-sidebar">

    <section class="sidebar">

        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Student
                    </a>
                </div>
            </div>
        @endif

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active"><a href="{{ route('dashboard') }}"><i class='fa fa-home'></i>
                    <span>Dashboard</span></a></li>
        </ul>
    </section>

</aside>
