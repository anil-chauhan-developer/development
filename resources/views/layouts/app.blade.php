<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
  <body>
    <div class="clearfix">
        <div class="overflow-hidden">
            <div class="overflow-visible">
            @include('includes.header')
            <!-- includes -->
            <div class="landing-page">
                @yield('content')
                @include('includes.scripts')
                @include('includes.footer')
                @yield('scripts')
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
