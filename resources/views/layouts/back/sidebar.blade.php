<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/assets/back/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Oyunlarım.com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/back/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Games
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('list_games')}}" class="nav-link">
                                <i style="color: #d3d3d3" class="far fa-circle nav-icon"></i>
                                <p>List Games</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('approve_games')}}" class="nav-link">
                                <i style="color: greenyellow" class="far fa-circle nav-icon"></i>
                                <p>Approve Games</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add_cat')}}" class="nav-link">
                                <i style="color: greenyellow" class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Cashouts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cashout_setting')}}" class="nav-link">
                                <i style="color: #d3d3d3" class="far fa-circle nav-icon"></i>
                                <p>Cashout Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('waiting')}}" class="nav-link">
                                <i style="color: yellow" class="far fa-circle nav-icon"></i>
                                <p>Waiting Cashouts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('accepted')}}" class="nav-link">
                                <i style="color: greenyellow" class="far fa-circle nav-icon"></i>
                                <p>Accepted Cashouts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('rejected')}}" class="nav-link">
                                <i style="color: red" class="far fa-circle nav-icon"></i>
                                <p>Rejected Cashouts</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
