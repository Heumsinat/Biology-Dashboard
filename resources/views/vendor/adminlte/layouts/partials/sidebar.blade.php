<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            {{--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>--}}
            <!-- Optionally, you can add icons to the links -->

                    {{--<a href="{{ url('home') }}"><span>Adminstrator</span><i class="fa fa-angle-left pull-right"></i></a>--}}
                @if(Auth::user()->admin == 1)
                    <li class="treeview">
                        <a href="{{ url('home') }}"> <span>Adminstrator</span> <i class="fa fa-angle-left pull-right"></i></a>
                         <ul class="treeview-menu">
                             <li><a href="{{ url('admin/admin')}}"><span>Admin</span></a></li>
                            <li><a href="{{ url('admin/role')}}"><span>Role</span></a></li>
                        </ul>
                     </li>
                @endif
                <li class="active"><a href="{{ url('admin') }}"><span>User</span></a></li>
                <li class="active"><a href="#"><span>User Badge</span></a></li>
                <li class="active"><a href="#"><span>user Question</span></a></li>
                <li class="active"><a href="{{ url('admin/level') }}"><span>Level</span></a></li>
                <li class="active"><a href="{{ url('admin/question') }}"><span>Question</span></a></li>
                <li class="active"><a href="{{ url('admin/badge') }}"><span>Badge</span></a></li>
            {{--<li><a href="#"><span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
