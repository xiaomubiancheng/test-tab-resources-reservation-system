<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="padding:5px 25px;">
                <div class="dropdown profile-element">
{{--                    <span><img alt="image" class="{{asset('static')}}/admin/img-circle" src="{{asset('static')}}/admin/img/profile_small.jpg" /></span>--}}
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
{{--                           <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>--}}
                            <span class="text-muted text-xs block"><h2>{{Auth::guard('user')->user()->username}}</h2><b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li class="divider"></li>
                        <li><a href="{{url('admin/logout')}}">安全退出</a>
                        </li>
                    </ul>
                </div>
            </li>

{{--            <li>--}}
{{--                <a href="{{url('admin/index/index')}}"><i class="fa fa-edit"></i>--}}
{{--                    <span class="nav-label" >人力资源预览</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            @foreach($menuTreeData[0] as $first_menu)
            <li>
                <a href="#">
                    <i class="fa fa fa-bar-chart-o"></i>
                    <span class="nav-label">{{$menus[$first_menu]['name']}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    @if(isset($menuTreeData[$first_menu]))
                        @foreach($menuTreeData[$first_menu] as $second_menu)
                            <li>
                                <a class="J_menuItem" href="{{route($menus[$second_menu]['route_name'])}}">{{$menus[$second_menu]['name']}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
            @endforeach

        </ul>
    </div>
</nav>
