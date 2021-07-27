<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" />

    <title>@yield('title', 'Sistem Informasi Perjalanan Dinas')</title>

    @include('layouts.css')
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="{{ route('authenticate') }}">
            {{ csrf_field() }}
              <h1>Login Form</h1>
              <h2><i class="fa fa-plane" ></i> Sistem Informasi Perjalanan Dinas</h2>
              @if(Session::has('errors'))
              <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                  Username atau password salah
              </div>
              @endif
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="form-control btn btn-primary" style="float: left;">Log in</button>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2021</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

  @include('layouts.script')

</html>
