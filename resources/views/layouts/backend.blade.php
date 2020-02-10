<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes-backend.head')
  <body>
    <div class="container-scroller">
      @include('includes-backend.header')
      <div class="container-fluid page-body-wrapper">
        @include('includes-backend.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          @include('includes-backend.scripts')
          @include('includes-backend.footer')
          @yield('scripts')
        </div>
      </div>
    </div>
  </body>
</html>
