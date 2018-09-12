
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    
                    <li>
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

               
                    <li>
                        <a href="#"><i class="fa fa-pencil-square fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/posts">All Posts</a>
                            </li>

                            <li>
                                <a href="/admin/posts/create">Create Post</a>
                            </li>
                            <li>
                                <a href="/admin/categories">Categories</a>
                            </li>
                            

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-camera"></i> Media<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/media') }}">All Media</a>
                            </li>

                            <li>
                                <a href="{{ url('admin/media/create') }}">Upload Media</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i>Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/users">All Users</a>
                            </li>

                            <li>
                                <a href="/admin/users/create">Create User</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-paint-brush fa-fw"></i> Appearance<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('admin/themes') }}">Themes</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                     <li>
                        <a href="{{ url('admin/options-general') }}"><i class="fa fa-sliders fa-fw"></i> Settings <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('admin/options-general') }}">General</a>
                            </li>
                           
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>