<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" />

    <title>@yield('title')</title>

    @include('layouts.css')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/') }}" class="site_title"><i class="fa fa-plane"></i> <span>Perjalanan Dinas</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/images/img.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{auth()->user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              @include('layouts.sidebar')
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          @include('layouts.top-sidebar')
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          @include('layouts.footer')
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('layouts.script')

    @yield('extra-scripts')
	
  </body>
</html>
