<header class="main-header">


    <a href="{{ url('/home') }}" class="logo">

        <span class="logo-mini"><b>E</b>P</span>

        <span class="logo-lg"><b>Exam</b>Planner</span>
    </a>


    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown messages-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-warning">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 1 message</li>
                        <li>

                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <div class="pull-left">

                                            <img src="{{ Gravatar::get($user->email) }}" class="img-circle"
                                                 alt="User Image"/>
                                        </div>

                                        <h4>
                                            B. Falah
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>

                                        <p>Most unusual, final spaces rudely infiltrate a chemical, mysterious
                                            proton.</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="javascript:void(0)">View all</a></li>
                    </ul>
                </li>

                <li class="dropdown notifications-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 1 notification</li>
                        <li>

                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-calendar text-danger"></i> The real klingon never infiltrates
                                        the transformator.
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="javascript:void(0)">View all</a></li>
                    </ul>
                </li>

                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else

                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image"/>

                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Student</small>
                                </p>
                            </li>

                            <li class="user-footer">
                                    <a href="{{ url('/logout') }}" class="btn btn-danger btn-flat btn-block"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                            </li>
                        </ul>
                    </li>
                @endif


                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>
