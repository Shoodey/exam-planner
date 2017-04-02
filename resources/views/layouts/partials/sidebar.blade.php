<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="{{ $menu == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class='fa fa-home'></i> <span>Dashboard</span>
                </a>
            </li>

            {{--@if(Auth::user()->role->slug == 'admin')--}}
                <li class="header">Administration</li>

                <li class="{{ $menu == 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class='fa fa-users'></i> <span>Users</span>
                    </a>
                </li>
            {{--@endif--}}

        </ul>
    </section>

</aside>
