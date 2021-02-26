<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="{{asset('static')}}/admin/img-circle" src="{{asset('static')}}/admin/img/profile_small.jpg" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                           <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
                            <span class="text-muted text-xs block">{{Auth::guard('user')->user()->username}}<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li class="divider"></li>
                        <li><a href="{{url('admin/logout')}}">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">H+
                </div>
            </li>

            <li>
                <a href="{{url('admin/index/index')}}"><i class="fa fa-edit"></i>
                    <span class="nav-label" >首页</span>
                </a>
            </li>
            @foreach($menuTreeData[0] as $first_menu)
            <li>
                <a href="#">
                    <i class="fa fa fa-bar-chart-o"></i>
                    <span class="nav-label">{{$menus[$first_menu]['name']}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    @foreach($menuTreeData[$first_menu] as $second_menu)
                    <li>
                        <a class="J_menuItem" href="{{route($menus[$second_menu]['route_name'])}}">{{$menus[$second_menu]['name']}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>

            @endforeach
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa fa-bar-chart-o"></i>--}}
{{--                    <span class="nav-label">角色管理</span>--}}
{{--                    <span class="fa arrow"></span>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li>--}}
{{--                        <a class="J_menuItem" href="{{route('admin.role.index')}}">角色列表</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa fa-bar-chart-o"></i>--}}
{{--                    <span class="nav-label">节点管理</span>--}}
{{--                    <span class="fa arrow"></span>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li>--}}
{{--                        <a class="J_menuItem" href="{{route('admin.node.index')}}">节点列表</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}


{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-edit"></i>--}}
{{--                    <span class="nav-label">管理员管理</span>--}}
{{--                    <span class="fa arrow"></span>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li>--}}
{{--                        <a href="#">人员管理<span class="fa arrow"></span></a>--}}
{{--                        <ul class="nav nav-third-level">--}}
{{--                            <li class="menu_li">--}}
{{--                                <a class="J_menuItem" href="{{url('admin/User/lst')}}">人员列表</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">角色管理<span class="fa arrow"></span></a>--}}
{{--                        <ul class="nav nav-third-level">--}}
{{--                            <li class="menu_li">--}}
{{--                                <a class="J_menuItem" href="{{url('admin/User/lst')}}">角色列表</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">权限管理<span class="fa arrow"></span></a>--}}
{{--                        <ul class="nav nav-third-level">--}}
{{--                            <li class="menu_li">--}}
{{--                                <a class="J_menuItem" href="{{url('admin/User/lst')}}">权限列表</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </div>
</nav>
