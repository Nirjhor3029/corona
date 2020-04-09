<aside class="main-sidebar nav_left_bar_background" id="sidebar-wrapper" >

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/images/user.jpg')}}" class="img-circle"
                        alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>{{config('app.dev_com')}}</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <a href="#">
                    <i class="fa fa-circle text-success"></i> 
                    {{ (Auth::user()->role != "admin")? "Supplier" : "Admin"}}
                    {{-- {{Auth::user()->role}} --}}
                </a>
            </div>
        </div>

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </form> --}}
        <!-- Sidebar Menu -->

        <hr>
        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>