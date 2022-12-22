<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App Card</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- jQuery library -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <link rel="stylesheet" type="text/css"
              href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body class="antialiased">
          <div class="container">
              @if(Session::get('username') )
              <div class="header">
                  Xin chào {{ Session::get('username') }}
                  <a href="/logout">Logout</a>
              </div>
              @endif
              <div class="main">
                  @yield('content')
              </div>
              <div class="clearfix"></div>
                  @if(Session::get('username') )
              <div class="footer">
                  <div class="menu">
                      <ul>
                          <li><a href="/">Thẻ của tôi</a></li>
                          <li><a href="/card">Mẫu thẻ</a></li>
                          <li>Logo</li>
                          <li><a href="/qrcode">Mã QR</a></li>
                          <li><a href="/account">Tài khoản</a></li>
                      </ul>
                  </div>
              </div>
                  @endif
          </div>
          <script>
              @if(Session::has('message'))
                  toastr.options =
                  {
                      "closeButton" : true,
                      "progressBar" : true,
                      "positionClass" : 'toast-center-center'
                  }
              toastr.success("{{ session('message') }}");
              @endif

                  @if(Session::has('error'))
                  toastr.options =
                  {
                      "closeButton" : true,
                      "progressBar" : true
                  }
              toastr.error("{{ session('error') }}");
              @endif

                  @if(Session::has('info'))
                  toastr.options =
                  {
                      "closeButton" : true,
                      "progressBar" : true
                  }
              toastr.info("{{ session('info') }}");
              @endif

                  @if(Session::has('warning'))
                  toastr.options =
                  {
                      "closeButton" : true,
                      "progressBar" : true
                  }
              toastr.warning("{{ session('warning') }}");
              @endif
          </script>
    </body>
</html>
