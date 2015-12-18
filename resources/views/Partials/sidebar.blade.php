<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <a href="/donner">
                    <p>
                        @if(Auth::check())
                            {{(Auth::user()->name)}}
                        @endif
                    </p>
                </a>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        @if(Auth::check())

            {{--user is donor--}}
            @if(Auth::user()->donor == 1)
                @include('Partials.Sidebars.donor')

            {{--user is needy--}}
            @else
                <a href="/problems"><button class="btn btn-danger" style="width:100%; margin-top: 50px; border-radius: 0px;">My Submitted Problems</button></a>
                <a href="/needy"><button class="btn btn-success" style="width:100%; margin-top: 10px; border-radius: 0px;">Post a Problem</button></a>

                @include('Partials.Sidebars.needy')

            @endif

        @endif

    </section>
    <!-- /.sidebar -->
</aside>