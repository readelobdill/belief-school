<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p>{{Auth::user()->username}}</p>

            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @foreach(Config::get('admin.menu') as $menu)
                <li class="{{(isset($menu['children']) ? 'treeview' : '')}}">
                    <a href="{{(isset($menu['url']) ? route($menu['url']) : '#')}}">
                        <i class="fa fa-{{$menu['icon']}}"></i>
                        <span>{{$menu['name']}}</span>
                        @if(isset($menu['children']))
                            <i class="fa fa-angle-left pull-right"></i>
                        @endif
                    </a>
                    @if(isset($menu['children']))
                        <ul class="treeview-menu">
                            @foreach($menu['children'] as $subMenu)
                                <li>
                                    <a href="{{route($subMenu['url'])}}">
                                        <i class="fa fa-circle-o"></i>
                                        {{$subMenu['name']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>

            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>