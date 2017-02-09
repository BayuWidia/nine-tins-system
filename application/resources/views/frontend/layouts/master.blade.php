<!DOCTYPE html>
<html lang="id">
  <head>
    @yield('title')
    @include('frontend.includes.head')
  </head>

  <body>

    <div class="wrapper">
      @include('frontend.includes.topbarnav')

      <div class="main-content">
        @yield('content')
      </div>
    </div>

    <footer id="kp-page-footer">
      @include('frontend.includes.footer')
    </footer>

  @include('frontend.includes.script')

  </body>
</html>
