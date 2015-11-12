<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.home')}}" class="logo" title="Belief School"><b>Belief</b>School</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title="Menu">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <div class="pull-right">
                        <a href="{{route('auth.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>