<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/timeline.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{asset('assets/css/startmin.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/morris.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/cms.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>-->
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        @yield('styles')
        <style>
    
        </style>
</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Strt Theme') }} -->
                        {{ bloginfo('blogname') }}
                    </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                       <a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                         Logout
                        </a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                        </form>
                    
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->

        </ul>

        <ul class="nav navbar-nav navbar-right">
        @if(auth()->guest())
        @if(!Request::is('auth/login'))
        <li><a href="{{ url('/auth/login') }}">Login</a></li>
        @endif
        @if(!Request::is('auth/register'))
       <li><a href="{{ url('/auth/register') }}">Register</a></li>
        @endif
        @else
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li>
           <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                     Logout
           </a> 
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
           </form>
        </li>

        <li><a href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit">Profile</a></li>
        </ul>
        </li>
          @endif
    </ul>



       @include('admin.partials.admin-nav-menu')

        <!-- /.navbar-static-side -->
    </nav>



<!-- Page Content -->
<div id="page-wrapper" style="background:#f1f1f1;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->

<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('assets/js/startmin.js')}}"></script>

 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>

@yield('footer')

@yield('scripts')





</body>

</html>
